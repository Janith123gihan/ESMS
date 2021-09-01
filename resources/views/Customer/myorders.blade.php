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
                padding:2%;
                margin-top:25px;
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
            .tble{
                margin-top:0px;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="head">
                <label>E-Store</label>
            </div>
            <div class="navbar">
                <a href="{{route('customers.index')}}">{{Auth::user()->name}}</a> 
                <a href="{{url('place')}}">Place Orders</a>  
                <a href="{{url('orders')}}">My Orders</a>
                <a href="{{url('logout')}}">Logout</a>
            </div>
            <div class="admin">
                <div class="">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Price</th>
                            <th>Delivery Person</th>
                            <th>Status</th>
                        </tr>
                        @php
                        $i=0;
                        @endphp
    
                        @foreach($orders as $order)
                        @if($order->customer_id==Auth::user()->id)
                        <form action="{{url('orderupdate',$order->id)}}" method="post">    
                            
                            @csrf
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$order->pname}}</td>
                                <td>{{$order->detail}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->name}}</td>
                                <td>
                                @if($order->status=="pending")
                                    <button type="submit" class="btn btn-danger" >Cancel order</button>
                                @endif
                                @if($order->status=="Cancelled")
                                    {{$order->status}}
                                @endif
                                @if($order->status=="Delivered")
                                    {{$order->status}}
                                @endif
                                </td>
                            </tr>
                             @endif
                        </form> 
                        @endforeach                              
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection