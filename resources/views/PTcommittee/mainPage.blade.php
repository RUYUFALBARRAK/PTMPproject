@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu">
    <li><a href="listOfStudents">STUDENT (TRAINEE) </a></li>
    <li><a href="#">TRAINING OPPORTUNITIES REQUESTS</a></li>
    <li><a href="#">OPPORTUNITIES</a></li>
    <li><a href="#">CONTACT US</a></li>
    <li><a href="Announcements">ANNOUNCEMENTS</a></li>
    
  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
