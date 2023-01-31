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
    <li>  <a  onclick="displaymenu()" class="accordion-toggle collapsed toggle-switch toggle-icon glyphicon glyphicon-chevron-down" id="submenu2" data-toggle="collapse" href="#submenu-2" style=" font-family: 'Nunito', sans-serif !important; font-size:100%;"> CONTACT US</a>
    <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
       <li> <a  href="mailto:ccis_female_pt_committee@ksu.edu.sa" class="abc">Email</a></li>
       <li> <a href="tel:+4733378901" class="abc">Phone</a> </li>
    </ul></li>

  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
