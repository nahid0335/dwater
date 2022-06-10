<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = DB::select('select *from reservations INNER JOIN customers ON customers.customers_id=reservations.customer_id INNER JOIN areas ON areas.customer_id=customers.customers_id');
        return view('admin.reservation.index',compact('reservations'));
    }
    public function status($id){
        $reservation = DB::selectOne('select *from reservations INNER JOIN customers ON reservations.customer_id=customers.customers_id where reservations.reservations_id=?',[$id]);
        DB::update('update reservations set status= ? where reservations_id = ?', [true,$id]);
        Notification::route('mail',$reservation->email )
            ->notify(new ReservationConfirmed());
        Toastr::success('Order successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function destory($id){
        DB::delete('delete from reservations where reservations_id = ?',[$id]);
        Toastr::success('Order successfully deleted.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
