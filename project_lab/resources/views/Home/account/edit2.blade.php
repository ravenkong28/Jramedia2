@extends('layouts.main')

@section('header')
    @include('partials.navbar')
@endsection

<style>
    .gray1{
        background-color: #ececec;
    }

    .card{
        padding: 30px 40px;
        margin-top: 60px;
        margin-bottom: 60px;
        border: none !important;
        box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2);
        
    }

    .form-control-label{
        margin-bottom: 0
    }
    
    input, textarea, button{
        padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300
    }
    
    input:focus, textarea:focus{
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400;
    }
    
    .btn-block{
        text-transform: uppercase;
        font-size: 15px !important;
        font-weight: 400;
        height: 43px;
        cursor: pointer
    }
    
    .btn-block:hover{
        color: #fff !important
    }
    
    button:focus{
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    select.input-group-text{
        background-color: white;
    }

    input{
        background-color: white;
    } */
</style>

@section('content')  
    <body id="body">
        <div id="box1" class = "mt-3 mb-2">
            <div class="container">
                <div class="card gray1">
                    <h1 class="text-center mb-4 text-info">Update Account</h1>
                    <form method="post" action="/home/view-products/{{ $user->id }}" class="mb-5" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label for="name">Account Name</label> 
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" 
                                placeholder="Enter Product Name..." required autofocus value ="{{ old('name', $user->name) }}"> 
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label for="email">Account Email</label> 
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                placeholder="Enter Product Price..." required value ="{{ old('email', $user->email) }}"> 
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <div class="form-group">
                                    <label for="is_admin">Account Role</label> <br>
                                    <div class="form-check form-check-inline">
                                        <label for="is_admin">
                                            <input type="radio" name="is_admin" value="1" id="is_admin" {{$user->is_admin == 1? 'checked' : ''}} >Admin
                                            <input type="radio" name="is_admin" value="0" id="is_admin" {{$user->is_admin == 0? 'checked' : ''}} >Customer
                                        </label>
                                    </div>
                                </div>
                                @error('is_admin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="form-group col-12"> <button type="submit" class="btn-block btn-success">Update Account</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </body>
@endsection

@section('footer')
    @include('partials.footer')
@endsection