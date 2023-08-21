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
</style>

@section('content')  
    <body id="body">
        <div class="container">
        <h1 class="text-center mb-4 text-info">Transaction History</h1>   
        <table class = "mb-4 table table-hover">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Transaction Date</th>
                    <th>Username</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            @foreach ($transactions as $transaction)
                <tr>
                    <td><b>{{ $transaction->transaction_id }}</b></td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>{{ $transaction->user_name}}</td>
                    <td>{{ $transaction->item_name }}</td>
                    <td>{{ $transaction->item_price }}</td>
                    <td>{{ $transaction->qty }}</td>
                    <td>{{ $transaction->total }}</td>
                </tr>
            @endforeach
        </table>
        </div>
    </body>
@endsection

@section('footer')
    @include('partials.footer')
@endsection