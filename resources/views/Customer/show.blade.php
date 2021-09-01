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
            .pro{
                padding:20px;
            }
            .a{
                margin-left:200px;
                margin-top:50px;
            }
            input{
                border-width:0px;
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
            <form action="{{url('done',$product->id)}}" method="post">
                @csrf
                <div class="pro">
                Product Name:
                    <input type="text" name="pname" value="{{$product->name}}" readonly></input>
                    <input type="hidden" name="product_id" value="{{$product->id}}" readonly></input>
                </div>
                <div class="pro">
                Employee Name:
                    <select id="employee_id" class="input-pro" name="employee_id">
                        @foreach($users as $user)
                            @if($user->role==('1')) 
                                <option value="{{ $user->id }}" >{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select><br/>  
                </div >
                <div class="pro">
                    Price:
                    <input type="text" name="price" value="{{$product->price}}" readonly></input>
                    <input type="hidden" name="detail" value="{{$product->detail}}" readonly></input>
                    <input type="hidden" name="status" value="pending" readonly></input>
                </div>
                <div class="a">
                <button type="submit" class="btn btn-primary">Order</button>
                </div>
            </form>
        </div>
    </body>
</html>
@endsection