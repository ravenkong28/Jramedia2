@extends('layouts.main')

@section('header')
    @include('partials.navbar1')
@endsection

<style>
    #box1{
        width:80%;
        height:15%;
        margin:10%;
        padding:10px;
        border-radius : 25px;
        background-color:rgb(255, 255, 255);
    }

    .container {
        display: table;
        height: 100%;
        width: 100%;
    }

    #body{
        background-color: #ffffff;
    }

    #button{
        height: 50px;
        width: 95px;
    }
</style>

@section('content')  
    <body id="body">
        <h1 class = "text-primary text-center">Account</h1>

        <div id="box1" class = "mt-3 mb-2">
            <div class="container shadow">
                <div class="row">
                    <div class="col-6 contents mt-3">
                        <h3>Name</h3>
                        <h4>Email</h4>
                        <h5 class = "text-warning">position</h5>
                    </div>
                    <div class="col-6 order-md-2 mt-3">
                        <form>
                            <div class = "d-flex flex-row-reverse ">
                                <a id="button" href="/update_account" class="text-left btn btn-primary btn-lg" role="button" aria-disabled="true">Update</a>
                            </div>
                            <div class = "d-flex flex-row-reverse">
                                <a id="button" href="/delete_account" class="text-left btn btn-danger btn-lg" role="button" aria-disabled="true">Delete</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </body>
@endsection