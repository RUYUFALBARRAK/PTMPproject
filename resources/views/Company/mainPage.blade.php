@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu">
    <li><a href="{{ url('/personalInfoCompany') }}">PERSONAL INFORMATION</a></li>
    <li><a href="{{ url('/listOfTraineesRequests') }}">TRAINEES REQUESTS</a></li>
     <li><a href="{{ url('/opportunityPageCompany') }}">OPPORTUNITIES</a></li>
     <li><a href="{{ url('/listOfTrainees') }}">TRAINEES</a></li>
     <li><a href="#">CONTACT US</a></li>
      <li><a href="{{ url('/DocumentPageCompany') }}"> DOCUMENTS TEMPLATE</a></li>
    
  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
