@extends('company.mainPage')

@section('content-training')
<div class="content">

  <div class="input-group">

    <div style="width:20%" class="input-group">
    <h1>Opportunities</h1>
    </div>
  </div>

   
    <div class="form-group col-md-2 state-menu" style="margin-left:40%">
      <select id="inputLocationCompany" class="form-select">
        <option selected>Status..</option>
        <option>Accepted</option>
        <option>Rejected</option>
        <option>Pending</option>
        <option>Needs Modification</option>
        <option>All</option>
      </select>
    </div>


    
    <button class="btn btn-primary" type="button"
    style=" margin-left:75%; margin-top:-6%; font-size:140%;
    background-color: #388087;">Add training opportunity</button>
  



    <br><br>

    <div>
    <img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%">
    <h3 class="spashlist">Software Engineer</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityStateB">Accepted</h4>
    </div>
    <div>
            <span class="glyphicon glyphicon-triangle-right" style="margin-left: 95%; margin-top: 0%;" ></span>
        </div>
    
    <br><hr>

    <div>
    <img src="img/ministryOfComm.png" alt="Company logo" width="17%" hight="22%" style="margin-top:2%" >
    <h3 class="spashlist">Product Manager</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityStateB" >Needs Modification</h4>

        <div>
            <span class="glyphicon glyphicon-triangle-right" style="margin-left: 95%; margin-top: 0%;" ></span>
        </div>
    </div>
    <br><hr>
    
   
</div>

@endsection

