@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu">
    <li><a href="{{ url('/listOfStudentsPTunit') }}">STUDENTS (TRAINEES)</a></li>
    <li><a href="{{ url('/TrainingDocument') }}">TRAINING DOCUMENT</a></li>
    <li><a href="{{ url('/listOfStudentsReqLetter') }}">IDENTIFICATION LETTER REQUESTS</a></li>
    <li><a href="{{ url('/listOfCompany') }}">COMPANIS</a></li>
    <li><a href="{{ url('/listOfCompanyRequest') }}">COMPANY REGISTERATION REQUEST</a></li>

  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
