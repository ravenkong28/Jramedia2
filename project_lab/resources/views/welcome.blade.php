@extends('layouts.main')

@section('header')
    @include('partials.navbar')
@endsection

<style>
    #box1{
        width:80%;
        height:500;
        margin-top:30px;
        margin-left:10%;
        padding:10px;
        border-radius : 25px;
        background-color:rgb(255, 255, 255);
        position;
    }
    
    img{
        padding : 10px;
        padding-top: 20px;
        padding-bottom: 20px;
        border-radius: 3ch; 
    }

    .centered {
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    
    #body{
        background-color: #ececec;
        height:80%;
    }
</style>

@section('content')  
    <body id="body">
        <div id="box1" class = "mb-4">
            <img src="Image/Banner.jpg" alt="" width = "100%" height  = "100%">
            <div class = "centered">
                <h3 class = "text-white bold text-center">We provide all of your book and stationary needs</h3>
            </div>
        </div>    
    </body>
@endsection

@section('footer')
    @include('partials.footer')
@endsection