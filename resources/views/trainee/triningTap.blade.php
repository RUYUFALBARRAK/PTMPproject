@extends('trainee.mainPage')

@section('content-training')
<div class="content">
  <style>
    @media screen and (max-width: 700px){
 .add-but{
  margin-left:10vw;
 }
}
  </style>
  <h3>Hi {{$loginIdUser['name']}}</h3><hr>

@if(session('msg') == 'review')
<div class="alert alert-success">Feedback was Added successfully!</div>
@endif

@if(session('msg') == 'delete')
<div class="alert alert-success">Feedback was Deleted successfully!</div>
@endif


  @if($opportumityinfo!=null&&$opportumityinfo->statusbycommittee=='accept'&&$opportumityinfo->statusbytrainee=='accept'&&$opportumityinfo->statusbycompany=='accept')
  @if($loginIdUser['status']=='Completed')
  <a href="{{route('addReview')}}"><button type="button" style="margin-left:50vw; font-size: 1.6vw; position: absolute; " class="add-but">Add Review</button></a>
  @endif
    <img src="{{asset('storage/images/'. $opportumityinfo->logoImage)}}" alt="Company logo" width="15%" hight="15%">
    <h3 class="spashlist">{{$opportumityinfo->jobTitle}}</h3> <h4 class="date">{{$opportumityinfo->Start_at}} - {{$opportumityinfo->end_at}}</h4><h4 class="opportunityState">.</h4> <h4 class="opportunityState">CONFIRMED</h4>
    <br><br><br><hr>

       @if ($errors->has('uploudedfile'))
                <div class="alert alert-danger">{{ $errors->first('uploudedfile') }}</div>
      @endif

    <h3>Progress report</h3><div style="color: #808080" >upload your files down below </div><br>
 @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger">{{Session::get('fail')}}</div>
  @endif

<table style="width:40%" class="Progress-report">
  <tr>
    <td>Effective date notice<div style="color: #808080" id="EffectiveDateNoticeName"></div></td>
     <td>

  @if($EffectiveDateNotice)
      <a style="color: #000; font-size: 1.3vw;" href="{{$docEffectiveDateNotice->document}}">view submitted</a>

   @else
     <form action="{{ route('uploadfile') }}" enctype="multipart/form-data" method="post">
      @csrf
      <input type="file" id="EffectiveDateNotice" name="EffectiveDateNotice" onchange="thisFileUploadEffectiveDateNotice(this);" style="display:none;"/>
     <button type="button" onclick="thisFileUploadEffectiveDateNotice();" class="btn btn-success EffectiveDateNotice"><i class="fa fa-upload"></i> </button>
     </form>
    @endif

    </td>
  </tr>
  <tr>
    <td>Report<div style="color: #808080" id="reportName"></div></td>
    <td>

    @if($report)
      <a style="color: #000; font-size: 1.3vw;" href="{{$docreport->document}}">view submitted</a>
    @else
  <form action="{{ route('uploadfile') }}" enctype="multipart/form-data" method="post">
    @csrf
        <input type="file" id="report" style="display:none;" name="report" onchange="thisFileUploadReport(this);" />
  <button type="button" onclick="thisFileUploadReport();" class="btn btn-success Report"><i class="fa fa-upload"></i> </button>

</form>
@endif

</td>
  </tr>
  <tr>
    <td>Training Survey <div style="color: #808080" id="Training-SurveyName"></div></td>
    <td>

    @if($TrainingSurvey)
      <a style="color: #000; font-size: 1.3vw;" href="{{$docTrainingSurvey->document}}">view submitted</a>
    @else
      <form action="{{ route('uploadfile') }}"  enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" id="Training-Survey" style="display:none;"  name="TrainingSurvey" onchange="thisFileUploadTrainingSurvey(this);"/>
      <button type="button" onclick="thisFileUploadTrainingSurvey();" class="btn btn-success TrainingSurvey"><i class="fa fa-upload"></i> </button>
    </form>
    @endif
    </td>
  </tr>
  <tr>

    <td>Presentation<div style="color: #808080" id="PresentationName"></div></td>
    <td>
   @if($Presentation)
      <a style="color: #000; font-size: 1.3vw;" href="{{$docPresentation->document}}">view submitted</a>
     @else
    <form action="{{ route('uploadfile') }}" enctype="multipart/form-data" method="post">
      @csrf
    <input type="file" id="Presentation" style="display:none;" name="Presentation"  onchange="thisFileUploadPresentation(this);"/>
   <button type="button" onclick="thisFileUploadPresentation();" class="btn btn-success Presentation"><i class="fa fa-upload"></i> </button>
   </form>
    @endif
  </td>
  </tr>
</table>


@else
<div> No oppourtunity selected</div>

@endif
</div>
@endsection
