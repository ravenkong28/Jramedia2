@extends('layouts.main')

@section('header')
    @include('partials.navbar1')
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
        border-bottom: 1px solid #ddd;
    }
</style>

@section('content')  
    <body id="body">
        <div class="container">
        <h1 class="text-center mb-4 text-info">Transaction History</h1>   
        <table class = "mb-4">
            <tr>
                <th>Transaction ID</th>
                <th>Transactaion Date</th>
                <th>Username</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Peterdfghbjnkmnbvcxcvbnmnbv</td>
                <td>Griffin</td>
                <td>$100</td>
            </tr>
            <tr>
                <td>Lois</td>
                <td>Griffin</td>
                <td>$150</td>
            </tr>
            <tr>
                <td>Joe</td>
                <td>Swanson</td>
                <td>$300</td>
            </tr>
            <tr>
                <td>Cleveland</td>
                <td>Brown</td>
                <td>$250</td>
            </tr>
        </table>
        </div>
    </body>
@endsection

@section('footer')
    @include('partials.footer')
@endsection