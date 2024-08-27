<?php

namespace App\Http\Controllers\Watcher;

use App\Http\Controllers\Controller;
use App\Models\item;
use Illuminate\Http\Request;

class WatcherController extends Controller
{
    public function index(){
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

        return view('watcher.dashboard',compact('items'));
    }
}
