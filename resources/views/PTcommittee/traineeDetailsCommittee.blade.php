@extends('PTcommittee.mainPage')

@section('content-training')

<div class="content" style="margin-bottom:-10%;">
<p class="hed-de">Trainee Information</p>
<hr>
<br>
    <div class="trainee-info" >
    <p> <b> Student Name:&nbsp; </b> {{$trainee->name}} </p> <br>
    <p> <b> Phone Number:&nbsp;</b> {{$trainee->phone}} </p><br>
    <p> <b> GPA :&nbsp; </b> {{$trainee->GPA}} <br></p>
    </div>

    <div class="info-sec" style="margin-left:25%;" >
    <p> <b> Email:&nbsp; </b> {{$trainee->email}} </p> <br>
    <p> <b> Major:&nbsp; </b> {{$trainee->major}} </p> <br>
    <p> <b> Number of completed hours :&nbsp; </b> {{$trainee->CompletedHours}} <br></p>
    </div>
</div>

<div class="content" style="margin-bottom:-10%;">

    <p class="hed-de">CV</p>
    <hr>
    <br>

    <div class="trainee-info" style="width:90%;" >
    <p> <b> Skills:&nbsp; </b> Fast learner</p><br>
    <p> <b> Languages:&nbsp; </b> Arabic, English </p><br>
    <p> <b> Interests :&nbsp; </b> Podcasting </p> <br>
    <p> <b> Experience:&nbsp; </b> </p> <br>
    <p> <b> Uploaded Files:&nbsp; </b> </p>
    </div>

</div>


<div class="content">

<div style="margin-left:4%;">
    <img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%">
    <h3 class="spashlist">Software Engineer</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4>
</div>


    <br><hr><br>

    <div class="prog-rep" style="margin-left:2%;">

    <h4 style="font-size:145%;"> Trainee's Progress report</h4><br>

<table style="width:130%" class="Progress-report">
  <tr>
    <td>Effective date notice</td>
    <th class="submited"> <a href="#">VIEW SUBMITTED <a> </th>
  </tr>
  <tr>
    <td>Report</td>
    <th class="submited"> <a href="#">VIEW SUBMITTED <a> </th>
  </tr>
  <tr>
    <td>Training Survey</td>
    <th class="submited" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
  </tr>
  <tr>
    <td>Presentation</td>
    <th class="submited" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
  </tr>
</table>

</div>



<div class="company-report" style="margin-left: 12em;">

<h3 style="font-size:145%;"> Company's Progress report</h3><br>

<table style="width:135%" class="Progress-report">
  <tr>
    <td>Training Plan</td>
    <th class="submited"> <a href="#">VIEW SUBMITTED <a> </th>
  </tr>
  <tr>
    <td>Follow Up</td>
    <th class="submited"> <a href="#">VIEW SUBMITTED <a> </th>
  <tr>
    <td>Attendance</td>
    <th class="submited"> <a href="#">VIEW SUBMITTED <a> </th>
  <tr>
    <td>Trainee Evaluation</td>
    <th class="submited"> <a href="#">VIEW SUBMITTED <a> </th>
  </tr>
  <tr>
    <td>Employee feedback</td>
    <th class="submited"> <a href="#">VIEW SUBMITTED <a> </th>
</table>
</div>


</div>


@endsection
