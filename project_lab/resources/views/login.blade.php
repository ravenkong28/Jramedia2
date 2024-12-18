@extends('layouts.main')

@section('header')
    @include('partials.navbar')
@endsection

<style>
    #box1{
        width:80%;
        height:500;
        margin-left:10%;
        padding:10px;
        border-radius : 25px;
        background-color:rgb(255, 255, 255);
        position;
    }

    .container {
        display: table;
        height: 80%;
        width: 80%;
    }

    #body{
        background-color: #ececec;
    }
</style>

@section('content')  
    <body id="body">
        <div id="box1" class = "mt-3 mb-2">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type = "button" class="btn-close" data-bs-dismiss="alert" arta-label="Close"></button>
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col-md-6 contents mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-4 text-center">
                                    <h3>Log In</h3>
                                </div>
                                <form action="/login" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group first">
                                        <label for="email">Your Email</label>
                                        <input name = "email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder ="name@example.com" autofocus required value ="{{ old("email") }}">
                                        @error('email')
                                            <div class = "invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group last mb-4">
                                        <label for="password">Password</label>
                                        <input name = "password" type="password" class="form-control" id="password" required>
                                    </div>
                                    
                                    <div class="d-flex mb-4 align-items-center">
                                        <label class="control control--checkbox mb-0">
                                            <input type="checkbox" checked="checked" name="rememberMe" />
                                            <span class="rememberMe">Remember me</span>
                                        </label>
                                        <span class="ml-auto"> New here? 
                                            <a href="/register" class="forgot-pass "><u>Sign Up Here!</u></a>
                                        </span>
                                    </div>

                                    <div class = "d-flex justify-content-center mb-3">
                                        <input type="submit" value="Log In" class="btn text-white btn-primary">
                                    </div>
                                    
                                    @if(session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('loginError') }}
                                            <button type = "button" class="btn-close" data-bs-dismiss="alert" arta-label="Close"></button>
                                        </div>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-2 mt-5 d-none d-lg-block">
                        <img src="Image/Login.png" alt="Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>    
    </body>
@endsection