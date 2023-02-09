@extends('layouts.layout')

@section('content')

    <img src="{{asset('img/background_ksu2.png')}}" alt="ksu" class="back">

    <div class="container-sm">
        <img src="{{asset('img/learning.png')}}" alt="ksu" class="learning" width="30%" hight="30%">
        <h3>Change Password</h3>
        <hr>
        @if(session('status'))
            <div class="my-2 alert alert-{{ session('theme') }}">{{ session('status') }}</div>
        @endif
    </div>

@endsection
