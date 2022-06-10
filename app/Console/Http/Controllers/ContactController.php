<?php

namespace App\Http\Controllers;

use Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        if(Session::has('email'))
        {
            $this->validate($request,[
                'subject' => 'required',
                'message' => 'required',
            ]);
            $email = Session::get('email');
            $customer = DB::selectOne('select * from customers where customers.email=?',[$email]);

            $today = date("Y-m-d H:i:s");
            DB::insert('insert into contacts (subject, message, customer_id, created_at) values (?, ?, ?, ?)', [$request->subject,$request->message,$customer->customers_id,$today]);

            Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        else
        {
            Toastr::success('Please Sign In First In order to Contact Us.','Success',["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

    }
}
