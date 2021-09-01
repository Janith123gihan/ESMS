@extends('main')
@section('content')
<html>
    <head>
        <style type="text/css">
            body{
                margin-top:100;
                font-family: Arial, Helvetica, sans-serif;
            }
            .main-1{
                outline-color:#2197b8;
                outline-style: solid;
                height:370px;
                width:400px;
                margin-left:400px;
            }
            .main-2{
                outline-color:#2197b8;
                outline-style: solid;
                height:100px;
                width:400px;
                margin-top:140px;
            }
            .head{
                background-color:#2197b8;
                color:white;
                text-align:center;
                width:400px;
                font-size:30px; 
            }
            label{
                text-align:left;
                margin-left:30px;
            }
            .input-1{
                margin-left:60px;
                border-radius:5px;
            }
            .input-2{
                margin-left:30px;
                border-radius:5px;
            }
            button{
                text-align:center;
                margin-left:130px;
                margin-top:30px;
                width:150px;
            }
            a{
                text-align:center;
                margin-left:130px;
                margin-top:30px;
                width:150px;
            }
        </style>
    </head>
<body>
    <div class="main-1">
        <h1 class="head">E-Store</h1><br/>
        @if(isset(Auth::user()->email))
        <script>window.location="success";</script>
        @endif
        @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
        @endif
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
        <div class="">
            <form method="post" action="{{ url('/checklogin') }}"> 
                {{ csrf_field() }}
                <div class="">    
                    <label for="email">Email:</label>  
                    <input type="email" class="input-1" name="email"/></br><br/>
                </div>
                <div class="">
                    <label for="password">Password:</label>
                    <input type="password" class="input-2" name="password"/><br/><br/>
                </div>
                <div class="">              
                    <button type="submit" class="btn btn-primary">Login</button>
                <div>
            </form>
        </div> 
    </div>
    <div class="main-2">
        <a href="{{ route('customers.create')}}" class="btn btn-primary">Register</a>
    </div>
</body>
</html>
@endsection