<?php

namespace App\Http\Controllers\Viewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class customerVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('email'))
        {
            $email = Session::get('email');
            $customer =DB::selectOne('select *from customers where email=?',[$email]);
            return redirect()->route('customerV.edit',$customer->customers_id);
        }
        else
        {
            return redirect('signin');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::selectOne('select * from customers INNER JOIN areas ON customers.customers_id=areas.customer_id where customers.customers_id=?',[$id]);
        return view('viewer.profileEdit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|E-Mail',
            'password' => 'required',
            'phone' => 'required|numeric',
            'streetName' => 'required',
            'streetNo' => 'required|numeric',
            'houseNo' => 'required|numeric',
        ]);
        DB::update('update customers set name= ? where customers_id = ?', [$request->name,$id]);
        DB::update('update customers set email= ? where customers_id = ?', [$request->email,$id]);
        DB::update('update customers set cus_password= ? where customers_id = ?', [$request->password,$id]);
        DB::update('update customers set phone= ? where customers_id = ?', [$request->phone,$id]);
        DB::update('update areas set street_name= ? where customer_id = ?', [$request->streetName,$id]);
        DB::update('update areas set street_no= ? where customer_id = ?', [$request->streetNo,$id]);
        DB::update('update areas set house_no= ? where customer_id = ?', [$request->houseNo,$id]);
        return redirect()->route('viewer.dashboard')->with('successMsg','Profile Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
