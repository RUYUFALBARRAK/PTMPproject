@extends('layouts.layout')

@section('content')


<div class="container">
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
  <figure></figure>
    <button type="button" onclick="window.location='{{ route("login") }}'" class=" welcome-btn">KSU users Login (student &  staff)</button>
    <div>
    <button type="button" onclick="window.location='{{ route("logincompany") }}'" class=" welcome-btn">   External users Login (Companies) </button>
    </div>
  </div>
@endsection
