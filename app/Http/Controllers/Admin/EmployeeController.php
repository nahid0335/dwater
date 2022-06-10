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
        $employees = DB::select('select *from employees INNER JOIN areas ON employees.area_id=areas.areas_id');
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
            'streetName' => 'required',
            'streetNo' => 'required|numeric',
            'houseNo' => 'required|numeric',
        ]);
        $today = date("Y-m-d H:i:s");
        DB::insert('insert into areas (street_name,street_no,house_no,created_at) values (?, ?, ?, ?)',[$request->streetName,$request->streetNo,$request->houseNo,$today]);
        $areaId = DB::selectOne('select *from areas where street_name=? AND street_no = ? AND house_no= ?',[$request->streetName,$request->streetNo,$request->houseNo]);
        DB::insert('insert into employees (name, email, phone, salary, area_id,created_at) values (?, ?, ?, ?, ?,?)', [$request->name,$request->email,$request->phone,$request->salary,$areaId->areas_id,$today]);
        return redirect()->route('employee.index')->with('successMsg','Slider Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emlpoyees = DB::select('select name,email,phone from employees where area_id IN (select areas_id from areas where street_name=?)',["teligati"]);
        $unionAll = DB::select('select * from customers UNION ALL select * from contacts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = DB::selectOne('select * from employees INNER JOIN areas ON employees.area_id=areas.areas_id where employees_id = ?',[$id]);
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
            'streetName' => 'required',
            'streetNo' => 'required|numeric',
            'houseNo' => 'required|numeric',
        ]);
        $today = date("Y-m-d H:i:s");
        $areaId = DB::selectOne('select * from employees where employees_id=?',[$id]);
        DB::update('update employees set name= ? where employees_id = ?', [$request->name,$id]);
        DB::update('update employees set email= ? where employees_id = ?', [$request->email,$id]);
        DB::update('update employees set phone= ? where employees_id = ?', [$request->phone,$id]);
        DB::update('update employees set salary= ? where employees_id = ?', [$request->salary,$id]);
        DB::update('update employees set updated_at= ? where employees_id = ?', [$today,$id]);
        DB::update('update areas set street_name= ? where areas_id = ?', [$request->streetName,$areaId->area_id]);
        DB::update('update areas set street_no= ? where areas_id = ?', [$request->streetNo,$areaId->area_id]);
        DB::update('update areas set house_no= ? where areas_id = ?', [$request->houseNo,$areaId->area_id]);
        DB::update('update areas set updated_at= ? where areas_id = ?', [$today,$areaId->area_id]);
        return redirect()->route('employee.index')->with('successMsg','Slider Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from employees where employees_id = ?',[$id]);
        return redirect()->back()->with('successMsg','Slider Successfully Deleted');
    }
}