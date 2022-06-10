<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = DB::table('employees')->count();
        $customerCount = DB::table('customers')->count();
        //dd($employeeCount);
        $reservations = DB::select('select *from reservations INNER JOIN customers ON reservations.customer_id=customers.customers_id where reservations.status=?',[false]);
        $reservationCount = count($reservations);
        //$reservations = Reservation::where('status',false)->get();
        $contactCount = DB::table('contacts')->count();
        return view('admin.dashboard',compact('customerCount','employeeCount','reservations','reservationCount','contactCount'));
    }
}
