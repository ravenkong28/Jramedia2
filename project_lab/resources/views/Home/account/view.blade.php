@extends('layouts.main')

@section('header')
    @include('partials.navbar')
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
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role = "alert">
                {{ session('success') }}
                <button type = "button" class="btn-close" data-bs-dismiss="alert" arta-label="Close">
                </button>
            </div>
        @endif
        <h1 class = "text-primary text-center">Account</h1>

        <div id="box1" class = "mt-3">
            @foreach ($users as $user)
                <div class="container shadow mb-3">
                    <div class="row">
                        <div class="col-6 contents mt-3">
                            <h3>{{ $user->name }}</h3>
                            <h4>{{ $user->email }}</h4>
                            @if ($user->is_admin == 1)
                                <h5 class = "text-warning">Admin</h5>
                            @elseif($user->is_admin == 0)
                                <h5 class = "text-warning">Customer</h5>
                            @endif
                        </div>
                        <div class="col-6 order-md-2 mt-3">
                            <form>
                                <div class = "d-flex flex-row-reverse ">
                                    <a id="button" href="/home/view-accounts/{{ $user->id }}/edit" class="text-left btn btn-primary btn-lg" role="button" aria-disabled="true">Update</a>
                                </div>
                                {{-- <div class = "d-flex flex-row-reverse ">`
                                    {{-- <form action="{{ route('account.destroy', $user) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="text-left btn btn-danger btn-lg" type ="submit">
                                            Delete
                                        </button>
                                    </form>
                                    
                                </div> --}}
                            </form>
                            <div class ="d-flex flex-row-reverse">
                                <form action="/home/view-accounts/{{ $user->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-left btn btn-lg btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>    
    </body>
@endsection