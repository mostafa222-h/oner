@extends('layout')
@section('title')
    users
@endsection

@section('content')
    @foreach($users as $user)
    <li>{{$user->name}}</li>
    @endforeach
@endsection



