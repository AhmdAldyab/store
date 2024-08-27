<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\item;
use App\Models\order;
use App\Models\sells;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    // show orders for user
    public function index()
    {
        $data['orders'] = order::where('user_id',Auth::user()->id)->get();
        $data['sells'] = sells::where('payer',Auth::user()->id)->orderBy("create_at",'desc')->get();
        return view('customer.item.index',$data);
    }
    // show table and add order for customer
    public function create()
    {
        $message= "";
        $items = item::where('price_sell','!=','null')->where('activate','active')->get();
        return view('customer.item.addOrder',compact('items','message'));
    }

    // save order in DB
    public function store(Request $request)
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
            return to_route('orderCustomer.add');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

    // check order and print order
    public function send($id)
    {
        try{
            $items = item::where('price_sell','!=','null')->where('activate','active')->get();
            $orders = order::where('user_id',$id)->get();

            if (!isset($orders)){
                flash()->error('there is not order');
                return view('customer.item.addorder',compact('items'));
            }

            foreach ($orders as $order) {
                if ($order->quantity > $order->item->quantity){
                    $list = order::where('user_id',$id)->delete();
                    flash()->error('the quantity is not enough');
                    return view('customer.item.addorder',compact('items'));
                }
            }

            flash()->success('Operation completed successfully.');
            return view('customer.item.order',compact('orders'));
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }

    }

    // update order for customer
    public function update(Request $request)
    {
        try{
            $request->validate([
                'quantity' => 'required|integer',
                'id'       => 'required|integer',
            ]);

            $order = order::findOrFail($request->id);
            $order->update([
                'quantity' => $request->quantity,
            ]);

            flash()->success('Operation completed successfully.');
            return to_route('orderCustomer.list');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

    // delete order for customer
    public function destroy(Request $request)
    {
        try{
            $order = order::findOrFail($request->id)->delete();
            flash()->success('Operation completed successfully.');
            return to_route('orderCustomer.list');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }
}
