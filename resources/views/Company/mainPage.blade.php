@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu">
    <a href="personalInfoCompany"><li>PERSONAL INFORMATION</li></a>
    <a href="listOfTraineesRequests"><li>TRAINEES REQUESTS</li></a>
    <a href="opportunityPageCompany"><li>OPPORTUNITIES</li></a>
    <a href="listOfTrainees"> <li>TRAINEES</li></a>
    <a href="#"> <li>CONTACT US</li></a>
    <a href="DocumentPageCompany"> <li>DOCUMENTS TEMPLATE</li></a>
    
  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
