@extends('company.mainPage')

@section('content-training')
<div class="content">

  <div class="input-group">

    <div style="width:20%" class="input-group">
    <h1>Opportunities</h1>
    </div>
  </div>

   
<div style=" width:80%; margin-left: 58%; margin-top:-2.5%; " class="input-group">
    <div style="font-size: 14px; margin-top:0.6%;">
    Status&nbsp;
    </div>

    <div style="width:15%">
    <select id="inputState"  class="form-select form-select-lg" >
        <option>accepted</option>
        <option>rejected</option>
        <option>Pending</option>
        <option>Needs Modification</option>
        <option selected>All</option>
      </select>
    </div>


<div >
    <button class="btn btn-primary" type="submit"
    style="width: 120%; height:90%; margin-left:17% ; font-size: 140%; background-color: #388087;" >Add training opportunity</button>
  </div>
</div>


    <br><br>

    <div>
    <img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%">
    <h3 class="spashlist">Software Engineer</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityState">Accepted</h4>
    </div>
    <div>
            <span class="glyphicon glyphicon-triangle-right" style="margin-left: 95%; margin-top: 0%;" ></span>
        </div>
    
    <br><hr>

    <div>
    <img src="img/ministryOfComm.png" alt="Company logo" width="17%" hight="22%" style="margin-top:2%" >
    <h3 class="spashlist">Product Manager</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityState" style="color: #dadd28;">Needs Modification</h4>

        <div>
            <span class="glyphicon glyphicon-triangle-right" style="margin-left: 95%; margin-top: 0%;" ></span>
        </div>
    </div>
    <br><hr>
    
   
</div>

@endsection

