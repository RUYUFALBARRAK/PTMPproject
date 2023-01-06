@extends('trainee.mainPage')

@section('content-training')
<div class="content">
  <h3>Hi {{$loginIdUser['name']}}</h3><hr> 
  @if($loginIdUser['oppourtunity']!=null)
    <img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%">
    <h3 class="spashlist">{{$loginIdUser['oppourtunity']['jobTitle']}}</h3> <h4 class="date">{{$loginIdUser['oppourtunity']['Start_at']}} - {{$loginIdUser['oppourtunity']['end_at']}}</h4> <h4 class="opportunityState">. CONFIRMED</h4>
    <br><br><br><hr>
    <h3>Progress report</h3><div style="color: #808080" >upload your files down below </div><br>
    
<table style="width:40%" class="Progress-report">
  <tr>
    <td>Effective date notice<div style="color: #808080" id="EffectiveDateNoticeName"></div></td>
     <td>
     <form action="{{ route('uploadfile') }}" method="post">
      <input type="file" id="EffectiveDateNotice" name="EffectiveDateNotice" onchange="thisFileUploadEffectiveDateNotice(this);" style="display:none;"/>
     <button type="button" onclick="thisFileUploadEffectiveDateNotice();" class="btn btn-success EffectiveDateNotice"><i class="fa fa-upload"></i> </button>
     </form>
    </td>
  </tr>
  <tr>
    <td>Report<div style="color: #808080" id="reportName"></div></td>
    <td> 
  <form action="{{ route('uploadfile') }}" method="post">
        <input type="file" id="report" style="display:none;" name="report" onchange="thisFileUploadReport(this);" />
  <button type="button" onclick="thisFileUploadReport();" class="btn btn-success Report"><i class="fa fa-upload"></i> </button> 
</form>
</td>
  </tr>
  <tr>
    <td>Training Survey <div style="color: #808080" id="Training-SurveyName"></div></td>
    <td> 
      <form action="{{ route('uploadfile') }}" method="post">
        <input type="file" id="Training-Survey" style="display:none;"  name="TrainingSurvey" onchange="thisFileUploadTrainingSurvey(this);"/>
      <button type="button" onclick="thisFileUploadTrainingSurvey();" class="btn btn-success TrainingSurvey"><i class="fa fa-upload"></i> </button>
    </form>
    </td>
  </tr>
  <tr>
    <td>Presentation<div style="color: #808080" id="PresentationName"></div></td>
    <td> 
    <form action="{{ route('uploadfile') }}" method="post">
    <input type="file" id="Presentation" style="display:none;" name="Presentation"  onchange="thisFileUploadPresentation(this);"/>
   <button type="button" onclick="thisFileUploadPresentation();" class="btn btn-success Presentation"><i class="fa fa-upload"></i> </button>
   </form>
  </td>
  </tr>
</table>  
@else
<div> No oppourtunity selected</div>
@endif  

</div>

@endsection