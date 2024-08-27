<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\sells;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(){
        $data['orders'] = order::where('user_id',Auth::user()->id)->get();
        $data['sells'] = sells::where('payer',Auth::user()->id)->orderBy("create_at",'desc')->get();

        return view('customer.dashboard',$data);
    }
}
