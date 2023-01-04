@extends('trainee.mainPage')

@section('content-training')
<div class="content">
  <h3>Hi {{$loginIdUser['name']}}</h3><hr>
    <img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%">
    <h3 class="spashlist">Software Engineer</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityState">. CONFIRMED</h4>
    <br><br><br><hr>
    <h3>Progress report</h3><br>
<table style="width:40%" class="Progress-report">
  <tr>
    <td>Effective date notice</td>
    <td> <input type="file" id="EffectiveDateNotice" style="display:none;" /><button type="button" onclick="thisFileUploadEffectiveDateNotice();" class="btn btn-success Report"><i class="fas fa-edit"></i>Submit</button></td>
  </tr>
  <tr>
    <td>Report</td>
    <td> <input type="file" id="report" style="display:none;" /><button type="button" onclick="thisFileUploadReport();" class="btn btn-success Report"><i class="fas fa-edit"></i>Submit</button></td>
  </tr>
  <tr>
    <td>Training Survey</td>
    <td><input type="file" id="Training-Survey" style="display:none;" /><button type="button" onclick="thisFileUploadTrainingSurvey();" class="btn btn-success TrainingSurvey"><i class="fas fa-edit"></i>Submit</button></td>
  </tr>
  <tr>
    <td>Presentation</td>
    <td><input type="file" id="Presentation" style="display:none;" /><button type="button" onclick="thisFileUploadPresentation();" class="btn btn-success Presentation"><i class="fas fa-edit"></i>Submit</button></td>
  </tr>
</table>    
</div>

@endsection