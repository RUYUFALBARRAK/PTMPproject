@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu">
    <li><a href="listOfStudents">Students (Trainee) </a></li>
    <li><a href="opportunityRequestCommittee">Training opportunitie requests</a></li>
    <li><a href="opportunityPageCommittee">opportunities</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="Announcements">Announcement</a></li>
    
  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
