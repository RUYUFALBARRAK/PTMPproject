@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu">
   <a href="traineeMainPage"><li>TRAINING</li></a>
  <a href="instruction"><li>INSTRUCTION</li></a>
   <a href="CVPage"> <li>CV</li></a>
    <a href="#"><li>OPPORTUNITIES</li></a>
    <a href="DocumentPage"><li>DOCUMENTS TEMPLATE</li></a>
    <a  href="ReuqstIdentfaction"><li>IDENTIFICATION LETTER</li></a>
    <a onclick="displaymenu()" class="accordion-toggle collapsed toggle-switch toggle-icon glyphicon glyphicon-chevron-down" id="submenu2" data-toggle="collapse" href="#submenu-2"><li>  CONTACT US</li> </a></span>
                        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="mailto:someone@example.com" class="abc"></i>Email</a></li>
                            <li><a href="tel:+4733378901" class="abc"></i>Phone: </a></li>
                        </ul>
                    
  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
