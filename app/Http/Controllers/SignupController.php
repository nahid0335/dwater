<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'streetName' => 'required',
            'streetNo' => 'required|numeric',
            'houseNo' => 'required|numeric',
        ]);
        $today = date("Y-m-d H:i:s");
        DB::insert('insert into customers (name, email,cus_password, phone,created_at) values (?, ?, ?, ?, ?)', [$request->name,$request->email,$request->password,$request->phone,$today]);
        $cusId = DB::selectOne('select * from customers where email=?',[$request->email]);
        DB::insert('insert into areas (street_name, street_no,house_no, customer_id,created_at) values (?, ?, ?, ?, ?)', [$request->streetName,$request->streetNo,$request->houseNo,$cusId->customer_id,$today]);
        return redirect()->route('signin.get')->with('successMsg','Registration Complete !!!');



    }
    public function index()
    {
        return view('signup');
    }
}
