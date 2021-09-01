<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[LoginController::class,'index']);
Route::post('/checklogin',[LoginController::class,'checklogin']);
Route::get('success',[LoginController::class,'successlogin']);
Route::get('emp-success',[LoginController::class,'successEmployee']);


Route::get('customer-order',[LoginController::class,'customerorders']);

Route::get('logout',[LoginController::class,'logout']);

Route::resource('products',ProductController::class);
Route::resource('employees',EmployeeController::class);
Route::resource('customers',CustomerController::class);

Route::get('place',[OrderController::class,'place']);
Route::get('view/{product}',[OrderController::class,'view']);
Route::post('done/{product}',[OrderController::class,'done']);
Route::get('myorders',[OrderController::class,'myorders']);
Route::get('reset',[OrderController::class,'reset']);
Route::get('orders',[OrderController::class,'orders']);
Route::post('orderupdate/{id}',[OrderController::class,'orderupdate']);
Route::post('delivered/{id}',[OrderController::class,'delivered']);