<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Models\item;
use App\Models\Section;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = item::where('price_sell','!=','null')->get();
        return view('admin.item.index',compact('items'));
    }

    // add price to item
    public function addPrice(Request $request)
    {
        try {
            $item = item::findOrFail($request->id);
            $item->price_sell = $request->priceSell;
            $item->save();
            flash()->success('Operation completed successfully.');
            return to_route('item.index');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }
    // update price item from admin
    public function updatePrice(Request $request){
        try {
            $item = item::findOrFail($request->id);
            $item->price_sell = $request->priceSell;
            $item->save();
            flash()->success('Operation completed successfully.');
            return to_route('item.index');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }
    // get items for price
    public function itemForPrice()
    {
        $items = item::whereNull('price_sell')->where('activate','active')->get();
        return view('admin.item.indexForSell',compact('items'));
    }
    // edit old item from admin
    public function edit($id)
    {
        $sections = Section::all();
        $item = item::findOrFail($id)->where('activate','active')->get();
        return view('admin.item.edit',compact('item','sections'));
    }
    // update old item
    public function update(ItemStoreRequest $request)
    {
        try {
            $item = item::findOrFail($request->id)->where('activate','active')->get();
            // add new item
            $item->update([
               'name'        => $request->name,
               'number_code' => $request->number_code,
               'section_id'  => $request->section,
               'number_place'=> $request->site,
               'date'        => $request->date,
               'price_pay'   => $request->price_pay,
               'price_sell'  => $request->price_sell,
               'quantity'    => $request->quantity,
               'unit'        => $request->unit,
            ]);

            flash()->success('Operation completed successfully.');
            return to_route('item.index');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

    // delete item
    public function destroy(Request $request)
    {
        try {
            $item = item::findOrFail($request->id)->delete();
            flash()->success('Operation completed successfully.');
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }
}
