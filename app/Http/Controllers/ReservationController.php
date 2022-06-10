<?php

namespace App\Http\Controllers;

use Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservationController extends Controller
{
    public function reserve(Request $request){
        if(Session::has('email'))
        {
            $this->validate($request,[
                'dateandtime' => 'required',
                'amount' => 'required',
            ]);
            $today = date("Y-m-d H:i:s");
            $email = Session::get('email');
            $customer = DB::selectOne('select * from customers where customers.email=?',[$email]);
            DB::insert('insert into reservations (date_and_time,customer_id,amount,status,created_at) values (?, ?, ?, ?, ?)',[$request->dateandtime,$customer->customers_id,$request->amount,false,$today]);

            Toastr::success('Order request sent successfully. we will confirm to you shortly','Success',["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        else
        {
            Toastr::success('Please Sign In First In order to Order Product.','Success',["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

    }
}
