@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">

<form method="GET" action="{{url('/opportunityRequestCommittee')}}">
  <div style="width:50%" class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search for opportunity name..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">Search</button>
</div>
</form>

   
<div class="form-group col-md-2 state-menu" style="margin-top: -2.5%;">
      <select id="inputLocationCommettii" class="form-select ">
        <option selected>Location</option>
        <option >Riyadh</option>
        <option>Jeddah</option>
        <option>Dammam</option>
        <option>All</option>
      </select>
    </div>

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
    <img src="img/ministryOfComm.png" alt="Company logo" width="17%" hight="22%">
    <h3 class="spashlist">Product Manager</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityStateB">Rejected</h4>

        <div>
            <span class="glyphicon glyphicon-triangle-right" style="margin-left: 95%; margin-top: 0%;" ></span>
        </div>
    </div>
    <br><hr>
    
   
</div>

@endsection

