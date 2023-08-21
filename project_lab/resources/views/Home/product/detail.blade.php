@extends('layouts.main')

@section('header')
    @include('partials.navbar')
@endsection


@section('content')  
    <h1>Ini adalah {{ $item->name }}</h1>
@endsection

@section('footer')
    @include('partials.footer')
@endsection