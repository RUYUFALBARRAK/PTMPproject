@extends('layouts.layout')

@section('content')
<script>



window.onload = () => {
    document.querySelectorAll('nav a').forEach(link => {
  if(link.href === window.location.href){
    link.setAttribute('class', 'active');
  }
});
}
</script>
        <!-- Sidebar -->
 <nav class="vertical-menu-wrapper" style="overflow: auto !important;">
 <a style="cursor:pointer; right: 2%; color: black; text-decoration: none; font-size: 150%;" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="vertical-menu" style="overflow: auto !important;">
   <li ><a href="{{ url('/traineeMainPage') }}">TRAINING</a></li>
   <li ><a  href="{{ url('/instruction') }}">INSTRUCTION</a></li>
    <li> <a  href="{{ url('/CVPage') }}">CV</a></li>
   <li> <a  href="{{ url('/opportunityPageTrainee') }}">OPPORTUNITIES</a></li>
   <li> <a  href="{{ url('/DocumentPage') }}">DOCUMENTS TEMPLATE</a></li>
   <li> <a  href="{{ url('/ReuqstIdentfaction') }}">IDENTIFICATION LETTER</a></li>
   <li> <a  href="{{ url('/AnnouncementsTrainee') }}">ANNOUNCEMENTS</a></li>
{{--  <marquee direction="up" scrollamount="2" behavior="scroll" class="homeMarquee" onmouseover="this.stop()" onmouseout="this.start()" style="height: 150px;">--}}
{{--      <table>--}}
{{--          <tbody>--}}
{{--          @foreach(\App\Models\announcement::all() as $announcement)--}}
{{--              <tr>--}}
{{--                  <td><a href="javascript:void(0);" onclick="openAnnouncement('{{ $announcement->title }}', '{{ $announcement->content }}')">{{ $announcement->title }}</a></td>--}}
{{--              </tr>--}}
{{--          @endforeach--}}
{{--          </tbody>--}}
{{--      </table>--}}
{{--  </marquee>--}}
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
