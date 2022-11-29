@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper">
  <ul class="vertical-menu">
    <li>TRAINING</li>
    <li>INSTRUCTION</li>
    <li>OPPORTUNITIES</li>
    <li>CV</li>
    <li>DOCUMENTS TEMPLATE</li>
    <li>CIDENTIFICATION LETTERV</li>
    <li> <a  onclick="displaymenu()" class="accordion-toggle collapsed toggle-switch toggle-icon" id="submenu2" data-toggle="collapse" href="#submenu-2">contact </a>
                        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="#" class="abc"><i class="fa fa-caret-right"></i>Users</a></li>
                            <li><a href="#" class="abc"><i class="fa fa-caret-right"></i>Roles</a></li>
                        </ul>
                    </li>
  </ul>
</nav>
<div class="content-wrapper">
  <div class="content">
  </div>
</div>
        <!-- /#sidebar-wrapper -->
@endsection
