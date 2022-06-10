<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
//use mysql_xdevapi\Session;

class SignoutController extends Controller
{
    public function index()
    {
        Session::forget('email');
        return redirect()->route('signin.send');
    }
}
