@extends('company.mainPage')

@section('content-training')

<div class='content'>

    <img src="img/SDAIA.png" alt="Company logo" class="logoCompany">
    <h3 class="spashlist">SDAIA (Saudi Data & AL Authority)</h3>
    <br><br>
    
    <hr>


 <div class="parentB">

  <div class="childB" style=" margin-left:6%;">


    <p>
     <label> <b>Registration number:</b> </label>
     <input type="text" id="comRegNum" name="comRegNum" value="XoXO1123XPasd"></input>
    </p>

    <br><br>


    <p>
     <label><b> Employee full name:</b> </label>
     <input type="text" id="comEmpName" name="comEmpName" value="saleah mohamad"></input>
    </p>

    <br><br>


    <p>
     <label><b> Email:</b></label>
     <input type="email" id="comEmail" name="comEmail" value="company@mail.com"></input>
    </p>
   
  
    <br><br>

    <p>
     <label> <b> brief description about the company:</b> </label>
     <textarea type="text" id="comDes" name="comDes" placeholder="description" rows="7" cols="40"></textarea>
    </p>


  </div>



  <div class="childB">

    <p>
     <label> <b> Office phone number:</b> </label>
     <input type="text" id="comOfficeNum" name="comOfficeNum" value="01143847423"></input>
    </p>

    <br><br>


    <p>
      <label> <b> Employee mobile number: </b> </label>
      <input type="text" id="comMobileNum" name="comMobileNum" value="0505142037"></input>
    </p>

    <br><br>


    <p>
     <label> <b> Website:</b> </label> 
     <input type="text" id="comWebsite" name="comWebsite" value="www.company.com"></input>
    </p>

  
    <br><br>

    <p>
     <label> <b> City:</b> </label>
     <input type="text" id="comCity" name="comCity" value="Jeddah"></input>
    </p>



  </div>
 </div>

  <button type="submit" class="btn-save"  style="width:8%; margin-left: 86%; margin-top:5%">Save</button>

</div>
 


@endsection

 