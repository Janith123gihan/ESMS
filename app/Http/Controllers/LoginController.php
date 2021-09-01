<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function index(){
        return view('login');
    }
    function checklogin(Request $request){
        //validation
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:5'
        ]);

        //Authentication
        $user_data = array(
             'email' => $request->get('email'),
             'password' => $request->get('password'),
             'role'=>('0')
         );

        $employee_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role'=>('1')
        );

        $customer_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role'=>('2')
        );

        if(Auth::attempt($user_data))
         {
              return redirect('success'); 
         }
        if(Auth::attempt($employee_data))
        {
             return redirect('emp-success'); 
        }
        if(Auth::attempt($customer_data))
        {
             return redirect()->route('customers.index'); 
        }
         else{
            return back()->with('error','Wrong Login Details');
        }   
        
    }
    public function successlogin(){
        return view('Admin.name');
    }
    public function successEmployee(){
        return view('Dashboard.index');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
