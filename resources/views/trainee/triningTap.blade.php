@extends('trainee.mainPage')

@section('content-training')
<div class="content">
    <img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%">
    <h3 class="spashlist">Software Engineer</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityState">. CONFIRMED</h4>
    <br><br><br><hr>
    <h3>Progress report</h3><br>
<table style="width:40%" class="Progress-report">
  <tr>
    <td>Effective date notice</td>
    <th>VIEW SUBMITTED </th>
  </tr>
  <tr>
    <td>Report</td>
    <td><button type="button" class="btn btn-success"><i class="fas fa-edit"></i>Submit</button></td>
  </tr>
  <tr>
    <td>Training Survey</td>
    <td><button type="button" class="btn btn-success"><i class="fas fa-edit"></i>Submit</button></td>
  </tr>
  <tr>
    <td>Presentation</td>
    <td><button type="button" class="btn btn-success"><i class="fas fa-edit"></i>Submit</button></td>
  </tr>
</table>    
</div>

@endsection