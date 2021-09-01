@extends('main')
@section('content')
<html>
    <head>
        <style type="text/css">
            .main{
                outline-color:#2197b8;
                outline-style: solid;
                height:700px;
            }
            * {box-sizing: border-box}
            body{
                margin-top:50px;
                font-family: Arial, Helvetica, sans-serif;
            }
            .head{
                background-color:#2197b8;
                color:white;
                text-align:center; 
                font-size:25px;
            }
            .admin{
                text-align:center;
                font-size:25px;  
                margin-top:200px;
                font-size:40px;
            }
            .navbar {
                width: 100%;
                background-color: #1cb0a1;
                overflow: auto;
                padding:0;
            }

            .navbar a {
                float: left;
                padding: 12px;
                color: white;
                text-decoration: underlined;
                font-size: 17px;
                width: 25%; /* Four links of equal widths */
                text-align: center;
            }

            .navbar a:hover {
                background-color: #000;
            }
            @media screen and (max-width: 500px) {
            .navbar a {
                    float: none;
                    display: block;
                    width: 100%;
                    text-align: left;
                }
            }
            .table{
                padding:10px;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="head">
                <label>E-Store</label>
            </div>
            <div class="navbar">
                <a href="{{url('emp-success')}}">{{Auth::user()->name}}</a> 
                <a href="{{url('reset')}}">Reset Password</a>
                <a href="{{url('myorders')}}">My Orders</a>  
                <a href="{{url('logout')}}">Logout</a>
            </div>
            <div class="table">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Detail</th>
                        <th>Price</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Customer mobile no</th>
                        <th>Date</th>
                        <th>Delivered</th>
                    </tr>
                    @php
                    $i=0;
                    @endphp
                    @foreach($orders as $order)
                    @if($order->employee_id==Auth::user()->id)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$order->pname}}</td>
                            <td>{{$order->detail}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->mobile}}</td>
                            <td>{{$order->date}}</td>
                            <td>
                                <form method="post" action="{{url('delivered',$order->id)}}">
                                    @csrf
                                    @if($order->status=="pending")
                                            <button type="submit" class="btn btn-success">Yes</button>
                                    @endif
                                    @if($order->status=="Cancelled")
                                            {{$order->status}}
                                    @endif
                                    @if($order->status=="Delivered")
                                            {{$order->status}}
                                    @endif
                                </form>
                           </td>
                        </tr>
                        @endif
                    @endforeach
                   
                </table>
            <div>
        </div>
    </body>
</html>
@endsection