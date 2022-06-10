<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = DB::select('select *from contacts');
        return view('admin.contact.index',compact('contacts'));
    }
    public function show($id)
    {
        $contact = DB::selectOne('select *from contacts where id=?',[$id]);
        return view('admin.contact.show',compact('contact'));
    }

    public function destroy($id)
    {
        DB::delete('delete from contacts where id = ?',[$id]);
        Toastr::success('Contact Message successfully deleted','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
