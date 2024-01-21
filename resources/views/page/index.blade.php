@extends('welcome')
@section('content')
    <div class="container">
        <h1>Hello Word</h1>
        <p>{{ Auth::user()->name }}</p>
    <a href="{{route('logout')}}">Logout</a>
    </div>
@endsection
