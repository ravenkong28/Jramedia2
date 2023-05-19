@extends('layouts.main')

@section('header')
    @include('partials.navbar')
@endsection

<style>
    .container {
        display: table;
        height: 75%;
        width: 75%;
    }

    .center {
        padding: 70px 0;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    
    #body{
        background-color: #ececec;
    }
</style>

@section('content')  
    <body id ='body'>
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6">
                    <h1 class="display-4">JRamedia</h1>
                    <p class="lead text-muted mb-0">We provide our customer with the best product quality</p>
                    
                </div>
                <div class="col-lg-6 d-none d-lg-block"><img src="Image/AboutUs.png" alt="" class="img-fluid"></div>
            </div>
        </div>
    </body>
@endsection

@section('footer')
    @include('partials.footer')
@endsection