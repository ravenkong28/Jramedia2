@extends('layouts.main')

@section('header')
    @include('partials.navbar')
@endsection

<style>
    #body{
        background-color: #ffffff;
        width:100%
    }
    
    .gray1{
        background-color: #ececec;
    }

    .container {
        height: 100%;
        width: 100%;
        position: relative;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td{
        padding: 8px;
        text-align: left;
    }

    th{ 
        border-top: 1px solid #ddd;
        border-top: 1px solid #ddd;
    }

    .vertical-center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(0%);
    }
</style>

@section('content')  
    <body id="body">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role = "alert">
                {{ session('success') }}
                <button type = "button" class="btn-close" data-bs-dismiss="alert" arta-label="Close">
                </button>
            </div>
        @endif    
        @if($carts->count()>0)
            <div class="container">
                <h1 class="text-center mb-4 text-info">My Cart</h1>   
                <table class = "mb-4 table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>
                                <form action="/home/my-cart/{{ $cart->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $cart->item->name }}</td>
                            <td>{{ $cart->item->price }}</td>
                            <td>{{ $cart->item->desc}}</td>
                            <td>
                                <form method="post" action="/home/my-cart/{{ $cart->id }}" class="mb-5"  enctype="multipart/form-data">
                                    @method('put')
                                    @csrf    
                                    <div class="input-group mb-3" style="width: 100px">
                                        <div class="input-group-prepend">
                                            <input class ="form-control" name = "qty" id = "qty" type="number" min = 1 value = {{ old('qty',$cart->qty) }}>
                                            <button class = "btn btn-success rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>{{ $cart->total}}</td>
                        </tr>
                    @endforeach
                </table>
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role = "alert">
                        {{ session('error') }}
                        <button type = "button" class="btn-close" data-bs-dismiss="alert" arta-label="Close">
                        </button>
                    </div>
                @endif
            
                <div class="text-center">
                    <form action="{{ route('checkOut',['id'=>$cart->id]) }}" method="POST">
                        @csrf    
                        <button class="btn btn-success text-white">Checkout</button>
                    </form>
                </div>
            </div>
        @else
            <div class="container">
                <div class = "vertical-center text-center">
                    <h1 class="mb-4 text-info">Your Cart is Empty</h1>   
                    
                    <a href = "/home/view-products" class="btn btn-success text-white">Buy Product</a>
                </div>
            </div>
        @endif
    </body>
@endsection

@section('footer')
    @include('partials.footer')
@endsection