@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu">
    <li><a href="personalInfoCompany">PERSONAL INFORMATION</a></li>
    <li><a href="listOfTraineesRequests">TRAINEES REQUESTS</a></li>
     <li><a href="opportunityPageCompany">OPPORTUNITIES</a></li>
     <li><a href="listOfTrainees">TRAINEES</a></li>
     <li><a href="#">CONTACT US</a></li>
      <li><a href="DocumentPageCompany"> DOCUMENTS TEMPLATE</a></li>
    
  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
