@extends('main')
@section('content')
<html>
    <head>
        <style type="text/css">
            .main{
                outline-color:#2197b8;
                outline-style: solid;
                height:600px;
            }
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
            .Pro{
               padding:20px; 
            }
            .input-pro{
                margin-left:100px;
                border-radius:2px;
            }
            .button{
                margin-left:150px;
            }
            select{
                width:200px;
                height:30px;
                border-width:2px;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="head">
                <label>Customer Registration</label>
            </div>
            
            

            <div class="Pro">
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

                <form action="{{ route('customers.store') }}" method="post">    
                    @csrf
                    <label>Name:</label>
                    <input type="text" name="name" class="input-pro" placeholder=""><br/><br/>
                    <label>Email:</label>
                    <input type="email" class="input-pro" name="email" placeholder=""></input><br/><br/>   
                    <label>Gender:</label>
                    <select id="gender" class="input-pro" name="gender">
                        <option value="none" selected></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select><br/><br/>     
                    <label>Address:</label>
                    <input type="text" name="address" class="input-pro" placeholder=""><br/><br/>
                    <label>MobileNo:</label>
                    <input type="tel" id="mobile" class="input-pro" name="mobile" ><br/><br/>
                    <label >Password:</label>
                    <input type="password" class="input-pro" name="password"/><br/><br/>
                    <div class="button">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
@endsection