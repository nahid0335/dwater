<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use mysql_xdevapi\Session;

class SigninController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = DB::selectone('select * from customers where email=?',[$request->email]);
        if($data->cus_password==$request->password)
        {
            Session::put('email',$request->email);
            return redirect()->route('viewer.dashboard');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {
        return view('signin');
    }
}
