<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::select('select *from employees');
        return view('admin.employee.index',compact('employees'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|E-Mail',
            'phone' => 'required|numeric',
            'salary' => 'required|numeric',
            'area' => 'required',
        ]);

        DB::insert('insert into employees (name, email, phone, salary, area) values (?, ?, ?, ?, ?)', [$request->name,$request->email,$request->phone,$request->salary,$request->area]);
        return redirect()->route('employee.index')->with('successMsg','Employee Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = DB::selectOne('select * from employees where id = ?',[$id]);
        return view('admin.employee.edit',compact('employee'));
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
            'phone' => 'required|numeric',
            'salary' => 'required|numeric',
            'area' => 'required',
        ]);

        DB::update('update employees set name= ? where id = ?', [$request->name,$id]);
        DB::update('update employees set email= ? where id = ?', [$request->email,$id]);
        DB::update('update employees set phone= ? where id = ?', [$request->phone,$id]);
        DB::update('update employees set salary= ? where id = ?', [$request->salary,$id]);
        DB::update('update employees set area= ? where id = ?', [$request->area,$id]);
        return redirect()->route('employee.index')->with('successMsg','Employee Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from employees where id = ?',[$id]);
        return redirect()->back()->with('successMsg','Employee Successfully Deleted');
    }
}
