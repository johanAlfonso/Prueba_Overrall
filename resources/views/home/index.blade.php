@extends('layaouts.master')
@section('content')
    <h1>Home</h1>
    <p>Welcome {{auth()->user()->name}}.</p>
@endsection

    
