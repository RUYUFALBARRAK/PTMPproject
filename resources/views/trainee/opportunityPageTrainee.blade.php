@extends('trainee.mainPage')

@section('content-training')
<div class="content">

  <div class="input-group">

    <div style="width:20%" class="input-group">
    <input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
    <button type="button" class="btn btn-outline-dark" >search</button>
    </div>

    <div>
    <span style=" font-size: 12px; display:inline-block; margin-top:1.5%" class="input-group">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Didn't see your opportunity? <a class="linkB" style="color:blue;" href="#"> Invite a Company</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </div>

  <div style="margin-left: 65%; margin-top:-3%; " class="input-group">
    <div style="font-size: 14px; margin-top:0.8%;">
    Status&nbsp;
    </div>
    
    
    <div style="width:28%">
      <select id="inputState"  class="form-select form-select-lg" >
        <option>accepted</option>
        <option>rejected</option>
        <option>Pending</option>
        <option>Available</option>
        <option selected>All</option>
      </select>
    </div>

  </div>

 <div style="margin-left: 80%; margin-top:-3%; " class="input-group">
    <div style="font-size: 14px; margin-top:0.9%;">
    Location&nbsp;
    </div>

    <div style="width:50%">
      <select id="inputLoc" class="form-select form-select-lg" >
        <option></option>
        <option></option>
        <option></option>
        <option></option>
        <option selected>All</option>
      </select>
    </div>

 </div>

  </div>

  
    <br><br>

    <div>
    <img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%">
    <h3 class="spashlist">Software Engineer</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityState">Accepted</h4>
    <span class="rate2" style=" position: absolute; margin: 1% 10% 30% 54.8%;">
        <input type="radio" id="star5" name="rate2" value="5" />
        <label for="star5" title="text" >5 stars  </label>
        <input type="radio" id="star4" name="rate2" value="4" />
        <label for="star4" title="text" >4 stars</label>
        <input type="radio" id="star3" name="rate2" value="3" />
        <label for="star3" title="text">3 stars </label>
        <input type="radio" id="star2" name="rate2" value="2" />
        <label for="star2" title="text" >2 stars</label>
        <input type="radio" id="star1" name="rate2" value="1" />
        <label for="star1" title="text" >1 star</label>
    </span>
    <br>
    <div class="view-reveiws2" style="margin-left: 69%; ">
        <a href="#">View Reviews</a>
    </div>
    </div>
    <div>
            <span class="glyphicon glyphicon-triangle-right" style="margin-left: 95%; margin-top: 2%;" ></span>
        </div>
    
    <br><hr>

    <div>
    <img src="img/ministryOfComm.png" alt="Company logo" width="17%" hight="22%">
    <h3 class="spashlist">Product Manager</h3> <h4 class="date">Jan. 16, 2022 - Aug. 11/2022 </h4> <h4 class="opportunityState" style="color: red;">Rejected</h4>
    <span class="rate2" style=" position: absolute; margin: 0.9% 10% 30% 53.2%;">
        <input type="radio" id="star5" name="rate2" value="5" />
        <label for="star5" title="text" >5 stars  </label>
        <input type="radio" id="star4" name="rate2" value="4" />
        <label for="star4" title="text" >4 stars</label>
        <input type="radio" id="star3" name="rate2" value="3" />
        <label for="star3" title="text">3 stars </label>
        <input type="radio" id="star2" name="rate2" value="2" />
        <label for="star2" title="text" >2 stars</label>
        <input type="radio" id="star1" name="rate2" value="1" />
        <label for="star1" title="text" >1 star</label>
    </span>
    <br>
    <div class="view-reveiws2" style="margin-left: 69%; ">
        <a href="#">View Reviews</a>
    </div>
        <div>
            <span class="glyphicon glyphicon-triangle-right" style="margin-left: 95%; margin-top: 2%;" ></span>
        </div>
    </div>
    <br><hr>
    
   
</div>

@endsection

