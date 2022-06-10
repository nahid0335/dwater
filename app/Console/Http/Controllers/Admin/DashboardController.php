<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Item;
use App\Reservation;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = DB::table('employees')->count();
        $customerCount = DB::table('customers')->count();
        //dd($employeeCount);
        $reservations = DB::select('select *from reservations where status=?',[false]);
        //$reservations = Reservation::where('status',false)->get();
        $contactCount = DB::table('contacts')->count();
        return view('admin.dashboard',compact('customerCount','employeeCount','reservations','contactCount'));
    }
}
