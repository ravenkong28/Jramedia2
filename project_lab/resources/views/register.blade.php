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
        height: 100%;
        width: 100%;
    }

    #body{
        background-color: #ececec;
    }
</style>

@section('content')  
    <body id="body">
        <div id="box1" class = "mt-3 mb-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 contents mt-3">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-4 text-center">
                                    <h3>Register</h3>
                                </div>

                                <form action="/register" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input name ="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" required placeholder="Enter Name" value = {{ old('name') }}>
                                        @error('name')
                                            <div class = "invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email</label>
                                        <input name ="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" required placeholder="Enter Email" value = {{ old('email') }}>
                                        @error('email')
                                            <div class = "invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name ="password" type="password" class="form-control  @error('password') is-invalid @enderror" id="password" required placeholder="Enter Password">
                                        @error('password')
                                            <div class = "invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>  

                                    <div class="mb-4 text-center">
                                        <span class="text-center"> Already have an account? 
                                            <a href="/login" class="forgot-pass"><u>Log In Here!</u></a>
                                        </span>
                                    </div>

                                    <div class = "d-flex justify-content-center">
                                        <a href="/register"><input type="submit" value="Register" class="btn text-white btn-primary"></a>
                                    </div>

                                    {{-- @if(session()->has('registerError'))
                                        @error('name')
                                            <div class = "alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @error('email')
                                            <div class = "invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @error('password')
                                            <div class = "invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @endif --}}
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
        @error('name')
        <div class = "invalid-feedback">
            Name is not valid
        </div>
        @enderror  
    </body>
@endsection