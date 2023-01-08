@extends('PTcommittee.mainPage')

@section('content-training')

<div class='content'>
    <img src="img/SDAIA.png" alt="Company logo" class="logoCompany">
    <h3 class="spashlistB">SDAIA (Saudi Data & AL Authority)</h3>
    <br><br>
    
    <br><br><br>


    <div>
    <label for="validationTooltip01" class="oppT-form-label">job title:</label>
    <label for="validationTooltip01" class="oppD-form-label"> Software Engineer</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Start Date:</label>
    <label for="validationTooltip01" class="oppD-form-label"> Jan, 16, 2022</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">End Date:</label>
    <label for="validationTooltip01" class="oppD-form-label"> Aug, 11, 2022</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">About the company:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

    <br>
    <div>
    <label for="validationTooltip01" class="oppT-form-label">About the role:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>
    <br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Training Requirement:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Incentive:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Work Hours:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Supervisor:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Email:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Phone Number:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Address:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Application deadline:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>
    
    <div class="input-group" style="width: 100%;">
    <label for="validationTooltip01" class="oppT-form-label">PT Plan:</label>&nbsp;&nbsp;
    &nbsp;&nbsp;<p><a class="linkB" href="#" style="color: blue;">PT_Plan.pdf</a>&nbsp;
    <a href=<span class="glyphicon glyphicon-download-alt "></span></a></p>
    </div><br>

    <br><br>

    <div class="input-group" style="margin-bottom:3%;">
    <button type="button" class="btn-status" style="background-color:green; border:green; border-radius: 7px;">Accept</button>&nbsp;&nbsp;
    <button type="button" class="btn-status" style="background-color:red; border:red; border-radius: 7px;">Decline</button>&nbsp;&nbsp;
    <button type="button" class="btn-status" style="background-color:#dadd28; border:#dadd28; border-radius: 7px; width: 18%;">Need modification</button>
    </div>

    <div style="margin-bottom:0.5%;">
    <input type="text" class="form-control" style="width:50%" placeholder="hours not accepted (need more hours)" >
    </div>


    <div style="margin-bottom:2%;">
    <label for="validationTooltip01" class="oppT-form-label" style="color: red; font-size:12px">Fill the empty field</label>
    </div>


    <div>
        <button type="button" class="btn-status" style="background-color:#dadd28;
        border:#dadd28; border-radius:7px; margin-left:46.4%; ">Submit</button>
    </div>

</div>
 

@endsection
