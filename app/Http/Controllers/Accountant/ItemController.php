<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Models\invoice;
use App\Models\item;
use App\Models\order;
use App\Models\purchase;
use App\Models\Section;
use App\Models\sells;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    // get all items for accountant
    public function index()
    {
        $items = item::where('price_sell','!=','null')->where('activate','active')->get();
        return view('accountant.item.index',compact('items'));
    }
    // create new item
    public function create()
    {
        $sections = Section::all();
        return view('accountant.item.create',compact('sections'));
    }
    // add new item
    public function store(ItemStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $Date = date("Y-m-d",strtotime($request->date));

            // add new item
            item::create([
               'name'        => $request->name,
               'number_code' => $request->number_code,
               'section_id'  => $request->section,
               'number_place'=> $request->site,
               'date'        => $Date,
               'price_pay'   => $request->price_pay,
               'quantity'    => $request->quantity,
               'unit'        => $request->unit,
            ]);

            if( $request->New == 'on' ){
                $invoice = invoice::create([
                    'total' => $request->price_pay,
                    'user_id' => auth()->user()->id,
                ]);

                $invoice_id = invoice::latest()->first()->id;
            }else{
                $invoice_id = invoice::latest()->first()->id;
                $invoice = invoice::findOrFail($invoice_id);
                $invoice->total = $invoice->total + $request->price_pay;
                $invoice->save();
            }

            $item_id = item::latest()->first()->id;
            // add purchase
            purchase::create([
                'amount'      => $request->quantity,
                'data'        => $Date,
                'supplier'    => $request->supplier,
                'invoice_id'  => $invoice_id,
                'item_id'     => $item_id,
            ]);

            DB::commit();
            flash()->success('Operation completed successfully.');
            return to_route('acc.item.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function addOrder()
    {
        $message= "";
        $items = item::where('price_sell','!=','null')->where('activate','active')->get();
        return view('accountant.item.addorder',compact('items','message'));
    }

    public function storeOrder(Request $request)
    {
        try{
            $request->validate([
                'quantity' => 'required|integer',
                'id'       => 'required|integer',
            ]);

            order::create([
                'quantity' => $request->quantity,
                'item_id'  => $request->id,
                'user_id'  => auth()->user()->id,
            ]);

            flash()->success('Operation completed successfully.');
            return to_route('order.add');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

    public function saveSell(Request $request)
    {
        try{
            $message = "";
            DB::beginTransaction();
            $items = item::where('price_sell','!=','null')->where('activate','active')->get();
            $orders = order::where('user_id',$request->id)->get();
            $list = order::where('user_id',$request->id)->delete();
            if (!isset($orders)){
                return view('accountant.item.addorder',compact('items'));
            }

            $date = date("Y-m-d h:i:sa");
            foreach ($orders as $order) {
                if ($order->quantity > $order->item->quantity){
                    $message = "the quantity is not enough";
                    return view('accountant.item.addorder',compact('message','items'));
                }
                // update quantity in items
                $item = item::where('id',$order->item_id)->first();
                $item->quantity = $item->quantity - $order->quantity;
                if ($item->quantity == 0) {
                    $item->status = 'inactive';
                }
                $item->save();

                sells::create([
                    'amount' => $order->quantity,
                    'payer'  => $request->name,
                    'date'   => $date,
                    'item_id'=> $order->item->id,
                ]);
            }

            DB::commit();
            flash()->success('Operation completed successfully.');
            return view('accountant.item.order',compact('orders'));
        } catch (\Throwable $th) {
            DB::rollBack();
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }

    }

    // show orders for all customer
    public function orderCustomer()
    {
        $orders = order::selectRaw('count(*) as number_of_orders, SUM(quantity) as Amount , user_id')
                         ->groupBy('user_id')->get();
        return view('accountant.item.orderCustomer',compact('orders'));
    }

    // show order for only one customer
    public function orderOneCustomer($id)
    {
        $data['orders'] = order::where('user_id',$id)->get();
        $data['user'] = User::findOrFail($id);
        return view('accountant.item.orderOneCustomer',$data);
    }

    // add items to store
    public function add(Request $request)
    {
        try {
            DB::beginTransaction();

            $item = item::findOrFail($request->id);
            $item->quantity = $item->quantity + $request->quantity;
            $item->save();

            if( $request->New == 'on' ){
                $invoice = invoice::create([
                    'total' => $request->price_pay,
                    'user_id' => auth()->user()->id,
                ]);

                $invoice_id = invoice::latest()->first()->id;
            }else{
                $invoice_id = invoice::latest()->first()->id;
                $invoice = invoice::findOrFail($invoice_id);
                $invoice->total = $invoice->total + $request->price_pay;
                $invoice->save();
            }

            $item_id = item::latest()->first()->id;
            // add purchase
            purchase::create([
                'amount'      => $request->quantity,
                'data'        => $request->date,
                'supplier'    => $request->supplier,
                'invoice_id'  => $invoice_id,
                'item_id'     => $item_id,
            ]);
            DB::commit();
            flash()->success('Operation completed successfully.');
            return to_route('acc.item.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

}
