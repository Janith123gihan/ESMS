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
            .Pro{
               padding:15px; 
            }
            .input-pro{
                margin-left:30px;
                border-radius:2px;
            }
            .button{
                margin-left:150px;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="head">
                <label>E-Store</label>
            </div>
            <div class="navbar">
                <a href="{{url('success')}}">{{Auth::user()->name}}</a> 
                <a href="{{route('products.index')}}">Products</a> 
                <a href="{{route('employees.index')}}">Employees</a> 
                <a href="{{url('logout')}}">Logout</a>
            </div>
            

            <div class="Pro">
                <h3>Edit an Employee</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('employees.update',$employee->id)}}" method="post">    
                @method('PUT')    
                @csrf
                    <label>Name:</label>
                    <input type="text" name="name" value="{{$employee->name}}" class="input-pro" placeholder=""><br/><br/>
                    <label>Email:</label>
                    <input type="email" class="input-pro" name="email" value="{{$employee->email}}"></input><br/><br/>   
                    <label>Gender:</label>
                    <select id="gender" class="input-pro" name="gender">
                        <option value="{{$employee->gender}}" selected></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select><br/><br/>     
                    <label>Address:</label>
                    <input type="text" name="address" class="input-pro" value="{{$employee->address}}"><br/><br/>
                    <label>MobileNo:</label>
                    <input type="tel" id="mobile" class="input-pro" name="mobile" value="{{$employee->mobile}}"><br/><br/>
                    <div class="button">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
@endsection