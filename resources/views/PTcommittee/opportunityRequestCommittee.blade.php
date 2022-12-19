@extends('trainee.mainPage')

@section('content-training')
<div class="content">

  <div class="input-group">

    <div style="width:20%" class="input-group">
    <input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
    <button type="button" class="btn btn-outline-dark" >search</button>
    </div>
  </div>

   
<div style=" width:80%; margin-left: 82%; margin-top:-2.5%; " class="input-group">
    <div style="font-size: 14px; margin-top:0.6%;">
    Location&nbsp;
    </div>

    <div style="width:10%">
      <select id="inputLoc" class="form-select form-select-lg" >
        <option></option>
        <option></option>
        <option></option>
        <option></option>
        <option selected>All</option>
      </select>
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
    <img src="img/ministryOfComm.png" alt="Company logo" width="17%" hight="22%">
    <h3 class="spashlist">Product Manager</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityState" style="color: red;">Rejected</h4>

        <div>
            <span class="glyphicon glyphicon-triangle-right" style="margin-left: 95%; margin-top: 0%;" ></span>
        </div>
    </div>
    <br><hr>
    
   
</div>

@endsection

