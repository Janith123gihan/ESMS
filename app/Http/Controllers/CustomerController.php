<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer');
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
        $customer = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'role' => ('2'),
            'mobile' => $request->get('mobile'),
            'password' =>Hash::make($request->get('password'))
        ]);
        $customer->save();
        
        $user = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );
        if(Auth::attempt($user))
        {
             return redirect()->route('customers.index'); 
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }
    // $2y$10$zNLzzQTiOZmxhAphFa/YbexCa.x1DvIc4ad/BpFDRX1uo81mZnCjK
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!(Hash::check($request->get('password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        $this->validate($request, [
            'password' => 'required|min:6',
            'newpassword' => 'min:6|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'min:6'
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->gender = $request->get('gender');
        $user->address = $request->get('address');
        $user->role = ('1');
        $user->mobile = $request->get('mobile');
        $user->password= Hash::make($request->get('newpassword'));
        $user->save();

        return back()->with('success','Password changed Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
