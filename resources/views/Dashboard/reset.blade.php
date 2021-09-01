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
            .res{
                margin-left:40px;
                margin-top:15px;
                font-size:25px;
            }
            .pwd{
                margin-top:40px;
                margin-left:25px;
            }
            .input-pro1{
                margin-left:70px;
                text-align:center;
                border-radius:5px;
            }
            .input-pro2{
                margin-left:90px;
                text-align:center;
                border-radius:5px;
            }
            .input-pro3{
                margin-left:30px;
                text-align:center;
                border-radius:5px;
            }
            .button{
                margin-left:70px;
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
            <div class="res">
                <label>Reset Your Password</label>
            </div>
            @if($message = Session::get('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors ->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
            @endif
            <div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form action="{{route('customers.update',Auth::user()->id)}}" method="post">    
            @method('PUT')         
            @csrf
                    <div class="pwd">
                        <label > Current Password:</label>
                        <input type="password" class="input-pro1" name="password"/><br/><br/>
                        <label > New Password:</label>
                        <input type="password" class="input-pro2" name="newpassword"/><br/><br/>
                        <label >Confirm new Password:</label>
                        <input type="password" class="input-pro3" name="confirmpassword"/><br/><br/>
                        <div class="button">
                            <button type="submit" class="btn btn-secondary">Change</button>
                        </div>
                    <input type="hidden" name="name" value="{{Auth::user()->name}}"><br/><br/>
                    <input type="hidden" name="email" value="{{Auth::user()->email}}"></input><br/><br/>   
                    <input type="hidden" name="gender" value="{{Auth::user()->gender}}">
                    <input type="hidden" name="address" value="{{Auth::user()->address}}"><br/><br/>
                    <input type="hidden" id="mobile" name="mobile" value="{{Auth::user()->mobile}}" ><br/><br/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
@endsection