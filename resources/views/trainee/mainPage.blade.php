@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu">
    <li><a href="#">TRAINING</a></li>
    <li><a href="#">INSTRUCTION</a></li>
    <li><a href="#">CV</a></li>
    <li><a href="#">OPPORTUNITIES</a></li>
    <li><a href="#">DOCUMENTS TEMPLATE</a></li>
    <li><a href="#">IDENTIFICATION LETTER</a></li>
    <li> <a onclick="displaymenu()" class="accordion-toggle collapsed toggle-switch toggle-icon glyphicon glyphicon-chevron-down" id="submenu2" data-toggle="collapse" href="#submenu-2"> CONTACT US </a></span>
                        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="#" class="abc"><i class="fa fa-caret-right"></i>Users</a></li>
                            <li><a href="#" class="abc"><i class="fa fa-caret-right"></i>Roles</a></li>
                        </ul>
                    </li>
  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>
       
@endsection
