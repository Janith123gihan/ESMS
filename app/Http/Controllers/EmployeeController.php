<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::all();
        return view('Employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'password'=>'required|alphaNum|min:5'

        ]);
        $employee = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'role' => ('1'),
            'mobile' => $request->get('mobile'),
            'password' =>Hash::make($request->get('password'))
        ]);
        $employee->save();
        return redirect()->route('employees.index')->with('success','Employee enrolled!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        return view('Employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(User $employee)
    {
        return view('Employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
            'address'=>'required',
            'mobile'=>'required'
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success','Employee Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee is deleted successfully');
    }
}
