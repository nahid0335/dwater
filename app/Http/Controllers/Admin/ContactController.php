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
        $contacts = DB::select('select customers.name,contacts.subject,contacts.contacts_id,contacts.created_at from contacts INNER JOIN customers ON contacts.customer_id=customers.customers_id');
        return view('admin.contact.index',compact('contacts'));
    }
    public function show($id)
    {
        $contact = DB::selectOne('select *from contacts INNER JOIN customers ON contacts.customer_id=customers.customers_id where contacts.contacts_id=?',[$id]);
        return view('admin.contact.show',compact('contact'));
    }

    public function destroy($id)
    {
        DB::delete('delete from contacts where contacts_id = ?',[$id]);
        Toastr::success('Contact Message successfully deleted','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
