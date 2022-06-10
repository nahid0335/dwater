<?php

namespace App\Http\Controllers\Viewer;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use mysql_xdevapi\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if(Session::has('email'))
        {
            return view('viewer.dashboard');
        }
        else
        {
            return redirect('signin');
        }
    }
    public function point()
    {
        return redirect()->route('signin.send');
    }
}
