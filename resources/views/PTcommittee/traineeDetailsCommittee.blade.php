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

    <div class="info-sec" style="margin-left:20%;" >
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
    <p> <b> Skills:&nbsp; </b>  @foreach($skill as $skills)
    @if(!($loop->last))
    {{ $skills ->skills }},

    @else
        {{ $skills ->skills }}

        @endif
        @endforeach
     </p><br>

    <p> <b> Languages:&nbsp; </b> @foreach($language as $lang)
    @if(!($loop->last))
    {{$lang-> languages}},

    @else
    {{$lang-> languages}}

    @endif
    @endforeach
    </p><br>

    <p> <b> Interests :&nbsp; </b> @foreach($interest as $intr)
    @if(!($loop->last))
    {{ $intr -> interests}},

    @else
    {{ $intr -> interests}}

    @endif
    @endforeach
    </p> <br>

    <p> <b> Experience:&nbsp; </b> @foreach($experience as $exp)
    @if(!($loop->last))
    {{ $exp -> Experience}},<br>

    @else
    {{ $exp -> Experience}} <br>

    @endif
    @endforeach
    </p> <br>

    <p> <b> Uploaded Files:&nbsp; </b> </p>

    @if($let)
    <div class="uploaded-files" style="margin-right:-40%; margin-top:2%; margin-bottom:2%;"> <a href="{{ $letter->getDocumentURL() }}">
    <img src="{{asset('img/file-download.png')}}" alt="File Icon" width="17%" height="17%" style="margin-bottom:1%; margin-left:5%;">
    <p style="width:24%; text-align: center; ">Identification Letter</p> </a>
    </div>
    @endif

    @if($aca)
    <div class="uploaded-files" style="margin-right:-40%; margin-top:2%; margin-bottom:2%;"> <a href="{{ $academic }}">
    <img src="{{asset('img/file-download.png')}}" alt="File Icon" width="17%" height="17%" style="margin-bottom:1%; margin-left:5%;">
    <p style="width:24%; text-align: center; ">Transcript</p> </a>
    </div>
    @endif

    @if($cert)
    <div class="uploaded-files" style=" margin-right:-40%; margin-top:2%; margin-bottom:2%;"> <a href="{{ $certificate }}">
    <img src="{{asset('img/file-download.png')}}" alt="File Icon" width="17%" height="17%" style="margin-bottom:1%; margin-left:5%;">
    <p style="width:24%; text-align: center; ">Certificate</p> </a>
    </div>
    @endif

    </div>

</div>


@if($status == "Ongoing")

<div class="content">

<div style="margin-left:4%;">
    <img src="{{ asset( 'storage/images/'.$companyInfo->logoImage ) }}" alt="Company logo" width="20%" hight="20%" style=" margin-left:-3%;">
    <h3 style=" margin-top:-5%;" class="spashlist">{{$oppourtunity-> jobTitle}}</h3> <h4 style=" margin-top:-2%;" class="date">{{$oppourtunity-> Start_at}} - {{$oppourtunity-> end_at}}  </h4>
</div>


    <br><hr><br>

    <div class="prog-rep" style="margin-left:2%;">

    <h4 style="font-size:145%;"> Trainee's Progress report</h4><br>

<table style="width:130%" class="ProgressReport">
  <tr>
    <td>Effective date notice</td>
    @if($effective != 0)
    <th class="subm"> <a href="{{ $effective }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
  </tr>

  <tr>
    <td>Report</td>
    @if($report != 0)
    <th class="subm"> <a href="{{ $report }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
</tr>

  <tr>
    <td>Training Survey</td>
    @if($survey != 0)
    <th class="subm"> <a href="{{ $survey }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
</tr>
h
<tr>
    <td>Presentation</td>
    @if($presentation != 0)
    <th class="subm"> <a href="{{ $presentation }}">VIEW SUBMITTED </a> </th>
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
    <th class="subm"> <a href="{{ $TrainingPlan }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
</tr>

  <tr>
    <td>Follow Up</td>
    @if($FollowUp != 0)
    <th class="subm"> <a href="{{ $FollowUp }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
    </tr>

    <tr>
    <td>Attendance</td>
    @if($Attendance != 0)
    <th class="subm"> <a href="{{ $Attendance }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
    </tr>

    <tr>
    <td>Trainee Evaluation</td>
    @if($TraineeEvaluation != 0)
    <th class="subm"> <a href="{{ $TraineeEvaluation }}">VIEW SUBMITTED </a> </th>
    @else
    <th class="subm" style="color:rgb(161, 161, 161);"> VIEW SUBMITTED </th>
    @endif
    </tr>

  <tr>
    <td>Employee Feedback</td>
    @if($EmployeeFeedback != 0)
    <th class="subm"> <a href="{{ $EmployeeFeedback }}">VIEW SUBMITTED </a> </th>
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
