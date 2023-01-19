@extends('trainee.mainPage')

@section('content-training')

<div class="content" style="margin-bottom:-10%;">
<p class="hed-de">Trainee Information</p>
<hr>
<br>
    <div class="trainee-info" >
    <p> <b> Student Name:&nbsp; </b>Razan Alsaif </p> <br>
    <p> <b> Phone Number:&nbsp;</b> 050999999 </p><br>
    <p> <b> GPA :&nbsp; </b> 4.05 <br></p>
    </div>

    <div class="info-sec" style="margin-left:25%;" >
    <p> <b> Email:&nbsp; </b> 439200624@ksu.edu.sa</p> <br>
    <p> <b> Major:&nbsp; </b> Software Engineering </p> <br>
    <p> <b> Number of completed hours :&nbsp; </b> 94 <br></p>
    </div>

</div>

<div class="content" style="margin-bottom:-10%;">

    <p class="hed-de">CV</p>
    <hr>
    <br>

    <div class="trainee-info" style="width:90%;" >
    <p> <b> Skills:&nbsp; </b> {{$skill}} </p><br>
    <p> <b> Languages:&nbsp; </b> {{$language}} </p><br>
    <p> <b> Interests :&nbsp; </b> {{$interest}} </p> <br>
    <p> <b> Experience:&nbsp; </b> {{$experience}} </p> <br>
    <p> <b> Uploaded Files:&nbsp; </b> </p>

    @foreach($files as $file)
    <div class="uploaded-files" style="margin-right:-32%; margin-top:2%; margin-bottom:2%;"> <a href="{{ url('/download/'.$file->id) }}">
    <img src="{{asset('img/file-download.png')}}" alt="File Icon" width="17%" height="17%" style="margin-bottom:1%; margin-left:5%;">
    <p style="width:24%; text-align: center; ">{{$file-> document}}</p> </a>
    </div>
    @endforeach

    </div>

</div>


@if($status == "accept")

<div class="content">

<div style="margin-left:4%;">
    <img src="{{asset('/img/'.$companyInfo->logoImage)}}" alt="Company logo" width="20%" hight="20%" style=" margin-left:-3%;">
    <h3 style=" margin-top:-5%;" class="spashlist">{{$oppourtunity-> jobTitle}}</h3> <h4 style=" margin-top:-2%;" class="date">{{$oppourtunity-> Start_at}} - {{$oppourtunity-> end_at}}  </h4>
</div>


    <br><hr><br>

    <div class="prog-rep" style="margin-left:2%;">

    <h4 style="font-size:145%;"> Trainee's Progress report</h4><br>

<table style="width:130%" class="ProgressReport">
  <tr>
    <td>Effective date notice</td>
    @if($effective != 0)
    <th class="subm"> <a href="{{ url('/download/'.$effective) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
  </tr>

  <tr>
    <td>Report</td>
    @if($report != 0)
    <th class="subm"> <a href="{{ url('/download/'.$report) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
</tr>

  <tr>
    <td>Training Survey</td>
    @if($survey != 0)
    <th class="subm"> <a href="{{ url('/download/'.$survey) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
</tr>

<tr>
    <td>Presentation</td>
    @if($presentation != 0)
    <th class="subm"> <a href="{{ url('/download/'.$presentation) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
</tr>

</table>

</div>


<div class="company-report" style="margin-left: 12em;">

<h3 style="font-size:145%;"> Company's Progress report</h3><br>

<table style="width:135%" class="ProgressReport">

  <tr>
    <td>Training Plan</td>
    @if($TrainingPlan != 0)
    <th class="subm"> <a href="{{ url('/download/'.$TrainingPlan) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
</tr>

  <tr>
    <td>Follow Up</td>
    @if($FollowUp != 0)
    <th class="subm"> <a href="{{ url('/download/'.$FollowUp) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
    </tr>

    <tr>
    <td>Attendance</td>
    @if($Attendance != 0)
    <th class="subm"> <a href="{{ url('/download/'.$Attendance) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
    </tr>

    <tr>
    <td>Trainee Evaluation</td>
    @if($TraineeEvaluation != 0)
    <th class="subm"> <a href="{{ url('/download/'.$TraineeEvaluation) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
    </tr>

  <tr>
    <td>Employee Feedback</td>
    @if($EmployeeFeedback != 0)
    <th class="subm"> <a href="{{ url('/download/'.$EmployeeFeedback) }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
    </tr>


</table>
</div>

@else

<div class="content" style="margin-bottom:-10%;">
<p class="hed-de">Progress Report</p>
<hr>
<br>

<div class="not-found">
    <br> <br>
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br>
    </div>

<div class="noReviews"> Trainee has not been accepted in an opportunity </div>

</div>

@endif


</div>


@endsection
