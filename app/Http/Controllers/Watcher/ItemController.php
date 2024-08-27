<?php

namespace App\Http\Controllers\Watcher;

use App\Http\Controllers\Controller;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    // get items for watcher
    public function index()
    {
        $items = item::where('price_sell','!=','null')
        ->where('activate','active')
        ->get();
        $list = [];
        foreach ($items as $item)
        {
            $year = date("Y",strtotime($item->date)) - date('Y');
            $month = date("m",strtotime($item->date)) - date('m');
            $day = date("d",strtotime($item->date)) - date('d');
            $list = $list + [ $year , $day , $month];
            if ($year >= 0 && $month > 0) {
                $item->status = 'vaild';
                $item->save();
            }elseif($year >= 0 && $month == 0 && $day > 0 ){
                $item->status = 'vaild';
                $item->save();
            }else{
                $item->status = 'not vaild';
                $item->save();
            }
        }
        return view('watcher.item.index',compact('items'));
    }

    // change place of item
    public function update(Request $request)
    {
        try {
            $item = item::findOrFail($request->id);
            $item->number_place = $request->place;
            $item->save();
            flash()->success('Operation completed successfully.');
            return to_route('item.index');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

}
