@extends('layouts.layout')

@section('content')

        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper" style="overflow: auto !important;">
 <a href="javascript:void(0)" style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu" style="overflow: auto !important;">
   <a href="traineeMainPage"><li>TRAINING</li></a>
  <a href="instruction"><li>INSTRUCTION</li></a>
   <a href="CVPage"> <li>CV</li></a>
    <a href="opportunityPageTrainee"><li>OPPORTUNITIES</li></a>
    <a href="DocumentPage"><li>DOCUMENTS TEMPLATE</li></a>
    <a  href="ReuqstIdentfaction"><li>IDENTIFICATION LETTER</li></a>
    <a onclick="displaymenu()" class="accordion-toggle collapsed toggle-switch toggle-icon glyphicon glyphicon-chevron-down" id="submenu2" data-toggle="collapse" href="#submenu-2"><li>  CONTACT US</li> </a>
        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
            <a href="mailto:someone@example.com" class="abc"><li>Email</li></a>
            <a href="tel:+4733378901" class="abc"><li>Phone: </li></a>
        </ul>
      <a href="Announcements"><li>ANNOUNCEMENTS</li></a>
      <marquee direction="up" scrollamount="2" behavior="scroll" class="homeMarquee" onmouseover="this.stop()" onmouseout="this.start()" style="height: 150px;">
          <table>
              <tbody>
              @foreach(\App\Models\announcement::all() as $announcement)
                <tr>
                    <td><a href="javascript:void(0);" onclick="openAnnouncement('{{ $announcement->title }}', '{{ $announcement->content }}')">{{ $announcement->title }}</a></td>
                </tr>
              @endforeach
              </tbody>
          </table>
      </marquee>
  </ul>
</nav>
<span  href="javascript:void(0)"  style="cursor:pointer; color: #fff;" onclick="openNav()" id="nav" > &#9776; </span>
<div class="content-wrapper">
@yield('content-training')
</div>

@endsection
