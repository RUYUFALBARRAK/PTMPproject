@extends('Company.mainPage')

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


<div class="content" style="margin-bottom:-10%;">
<p class="hed-de">Progress Report</p>
<hr>

<div style="color: #808080; margin-left:4%;" >upload your files down below </div><br>

    @if ($errors->has('uploudedfile'))
                <div class="alert alert-danger">{{ $errors->first('uploudedfile') }}</div>
    @endif

    @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger">{{Session::get('fail')}}</div>
  @endif

  <div style="margin-left:4%;">

<table style="width:40% " class="Progress-report">
  <tr>
    <td>Training Plan<div style="color: #808080" id="trainingPlanName"></div></td>
     <td>

  @if($trainingPlan != 0)
      <a style="color: #000; font-size: 1.3vw;" href="{{ $trainingPlan }}">view submitted</a>

   @else
   <form action="{{ url('companyUpload/'.$trainee->trainee_id) }}" enctype="multipart/form-data" method="post">
      @csrf
      <input type="file" id="trainingPlan" name="trainingPlan" onchange="thisFileUploadTrainingPlan(this);" style="display:none;"/>
     <button type="button" onclick="thisFileUploadTrainingPlan();" class="btn btn-success TrainingPlan"><i class="fa fa-upload"></i> </button>
     </form>
    @endif

    </td>
  </tr>


  <tr> <!-- CSS BUTTON NEED TO ADD -->
    <td>Follow Up<div style="color: #808080" id="followUpName"></div></td>
    <td>

    @if($followUp !=0)
    <a style="color: #000; font-size: 1.3vw;" href="{{ $followUp }}">view submitted</a>
    @else
    <form action="{{ url('companyUpload/'.$trainee->trainee_id) }}" enctype="multipart/form-data" method="post">
    @csrf
        <input type="file" id="followUp" style="display:none;" name="followUp" onchange="thisFileUploadFollowUp(this);" />
        <button type="button" onclick="thisFileUploadFollowUp();" class="btn btn-success FollowUp"><i class="fa fa-upload"></i> </button>

</form>
@endif

</td>


  </tr>
  <tr>
    <td> Attendance <div style="color: #808080" id="attendanceName"></div></td>
    <td>

    @if($attendance !=0)
    <a style="color: #000; font-size: 1.3vw;" href="{{ $attendance }}">view submitted</a>
    @else
    <form action="{{ url('companyUpload/'.$trainee->trainee_id) }}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" id="attendance" style="display:none;"  name="attendance" onchange="thisFileUploadAttendance(this);"/>
      <button type="button" onclick="thisFileUploadAttendance();" class="btn btn-success Attendance"><i class="fa fa-upload"></i> </button>
    </form>
    @endif
    </td>
  </tr>

  <tr>
    <td>Trainee Evaluation<div style="color: #808080" id="traineeEvaluationName"></div></td>
    <td>
   @if($traineeEvaluation !=0)
   <a style="color: #000; font-size: 1.3vw;" href="{{ $traineeEvaluation }}">view submitted</a>
     @else
     <form action="{{ url('companyUpload/'.$trainee->trainee_id) }}" enctype="multipart/form-data" method="post">
      @csrf
    <input type="file" id="traineeEvaluation" style="display:none;" name="traineeEvaluation"  onchange="thisFileUploadTraineeEvaluation(this);"/>
   <button type="button" onclick="thisFileUploadTraineeEvaluation();" class="btn btn-success TraineeEvaluation"><i class="fa fa-upload"></i> </button>
   </form>
    @endif
  </td>
  </tr>


  <tr>
    <td> Employee Feedback <div style="color: #808080" id="employeeFeedbackName"></div></td>
    <td>

    @if($employeeFeedback !=0)
    <a style="color: #000; font-size: 1.3vw;" href="{{ $employeeFeedback }}">view submitted</a>
    @else
    <form action="{{ url('companyUpload/'.$trainee->trainee_id) }}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" id="employeeFeedback" style="display:none;"  name="employeeFeedback" onchange="thisFileUploadEmployeeFeedback(this);"/>
      <button type="button" onclick="thisFileUploadEmployeeFeedback();" class="btn btn-success EmployeeFeedback"><i class="fa fa-upload"></i> </button>
    </form>
    @endif
    </td>
  </tr>

</table>

</div>

</div>


@endsection
