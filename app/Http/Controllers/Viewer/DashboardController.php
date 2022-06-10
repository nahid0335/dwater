<?php

namespace App\Http\Controllers\Viewer;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use mysql_xdevapi\Session;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
       if(Session::has('email'))
        {
            $email = Session::get('email');
            $customer = DB::selectOne('select * from customers INNER JOIN areas ON customers.customers_id=areas.customer_id where customers.email=?',[$email]);
            return view('viewer.dashboard',compact('customer'));
        }
        else
        {
            return redirect('signin');
        }
       //return view('viewer.dashboard');
    }
}
