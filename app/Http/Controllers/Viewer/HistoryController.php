<?php

namespace App\Http\Controllers\Viewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class HistoryController extends Controller
{
    public function index()
    {
        if(Session::has('email'))
        {
            $email = Session::get('email');
            $reservations = DB::select('select *from customers INNER JOIN reservations ON customers.customers_id=reservations.customer_id where customers.email=?',[$email]);
            return view('viewer.history',compact('reservations'));
        }
        else
        {
            return redirect('signin');
        }
    }
}
