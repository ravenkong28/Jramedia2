@extends('layouts.main')

@section('header')
    @include('partials.navbar')
@endsection

<style>
    .container {
        display: table;
        height: 75%;
        width: 100%;
        padding
    }

    .centerh{
        padding: 70px 0;
    }
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    #body{
        background-color: #ffffff;
    }
</style>

@section('content')
    <body id ='body'>
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-5 px-5 mx-auto"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/img-2_vdgqgn.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                <div class="col-lg-6">
                    <h2 class="display-5 text-muted">Nothings matter except the satisfaction of our customer</h2>
                    <p class="lead text-muted mb-0">Providing you with the best stationary you'll ever met</p>                    
                </div>
            </div>
        </div>
    </body>
    
@endsection

@section('footer')
    @include('partials.footer')
@endsection