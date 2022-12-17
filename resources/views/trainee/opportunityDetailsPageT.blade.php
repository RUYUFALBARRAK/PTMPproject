@extends('trainee.mainPage')

@section('content-training')

<div class='content'>
    <img src="img/SDAIA.png" alt="Company logo" class="logoCompany">
    <h3 class="spashlist">SDAIA (Saudi Data & AL Authority)</h3>
    <br>

    <span class="rate2" style="margin-left: 84%; margin-top: -3%;">
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
    <div class="view-reveiws2" style="margin-left: 86.5%; margin-top: 0%;" onClick="">
            View Reviews
    </div>
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

    <div>
    <label for="validationTooltip01" class="oppT-form-label">About the role:</label>
    <label for="validationTooltip01" class="oppD-form-label"> </label>
    </div><br>

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
    </div><br><br>
    <br><br>

    <button type="button" class="btn-conf">Confirm</button>

</div>
 

@endsection
