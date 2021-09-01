<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function myorders(){

        $orders = DB::table('orders')
        ->join('users','orders.customer_id','=','users.id')
        ->join('products','products.id','=','orders.product_id')
        ->select('orders.id','orders.employee_id','users.name','users.address','users.mobile','products.name as pname','products.detail','products.price','orders.date','orders.status')
        ->get();
       
        return view('Dashboard.orders',compact('orders'));
    }
    public function place(){
        $products=Product::all();
        return view('Customer.placeorders',compact('products'));
    }
    public function view(Product $product)
    {
        $users = User::all();
        return view('Customer.show',compact('product','users'));
    }
    public function done(Request $request){
        
        $order = new Order([
            'product_id' => $request->get('product_id'),
            'employee_id' => $request->get('employee_id'),
            'customer_id' => Auth::user()->id,
            'status'=> $request->get('status'),
            'date' => date('Y-m-d H:i:s')
        ]);
        $order->save();
        return redirect('place');

    }
    public function reset()
    {
        return view('Dashboard.reset');
    }
    public function orders(){
        $orders = DB::table('orders')
        ->join('users','orders.employee_id','=','users.id')
        ->join('products','products.id','=','orders.product_id')
        ->select('orders.id','orders.customer_id','users.name','products.name as pname','products.detail','products.price','orders.status')
        ->get();
       
        return view('Customer.myorders',compact('orders'));
    }
    public function orderupdate(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = ('Cancelled');
        $order->save();
        return back();
    }
    public function delivered(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = ('Delivered');
        $order->save();
        return back();
    }
    
}
