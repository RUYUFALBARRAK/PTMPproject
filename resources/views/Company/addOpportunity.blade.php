@extends('trainee.mainPage')

@section('content-training')
<div class="content">
<img src="img/SDAIA.png" alt="Company logo" class="logoCompany">
<h3 class="spashlist">SAMI (ADVANCED ELECTRONICS)</h3>
<br><br><hr>
<form action="#">
<div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">job title :</label>
      <input type="text" class="form-control" placeholder="Enter job title " name="job-title">
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">  work hours :</label>
      <input type="number" class="form-control" placeholder="Enter work hours" name="work-hours">
    </div>
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">Supervisor full name:</label>
      <input type="text" class="form-control" placeholder="Enter Supervisor full name" name="Supervisor-full-name">
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Supervisor mobile number:</label>
      <input type="tel" class="form-control" placeholder="Enter Supervisor mobile number" name="Supervisor-mobile-number">
    </div>
  </div>

  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Email :</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email">
         </div>
        <div class="col">
                    <label for="validationTooltip01" class="form-label"> Start and End date:</label>
                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control" placeholder="Enter start date" name="start-date">
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" placeholder="Enter end date" name="end-date">
                    </div>
                </div>
        </div>
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Address: </label>
      <input type="text" class="form-control" placeholder="Enter Address" name="Address">
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Application deadline:</label>
      <input type="date" class="form-control" placeholder="Enter Application deadline" name="Application-deadline">
    </div>
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Training Requirements :</label>
      <textarea rows="2" class="form-control" placeholder="Enter Training Requirements" name="Training-Requirements"></textarea>
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Number of trainees:</label>
      <input type="number" class="form-control" placeholder="Enter Number of trainees" name="Number-of-rainees">
    </div>
  </div>
  <div class="row opportunity-form">
  <label for="comment">brief descriptionof the role:</label>
    <textarea class="form-control" rows="5" id="comment" name="brief-descriptionof-the-role"></textarea>
</div>
<div class="row opportunity-form">
  <label for="comment">Required majors:</label>
    <div class="form-group col-md-2">
      <select id="inputState" class="form-select form-select-lg">
        <option selected> Required majors</option>
        <option>nformation Technology and Information Systems</option>
        <option>Computer Science</option>
        <option>Information Science</option>
        <option>Software Engineering</option>
        <option>Computer Engineering</option>
        <option>Cybersecurity</option>
      </select>
    </div>
 <label for="comment">include incentive:</label>
    <div class="form-check">
  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="yes" checked>Yes
  <label class="form-check-label" for="radio1"></label>
    </div>

<div class="form-check">
  <input type="radio" class="form-check-input" id="radio2" name="optradio" value="no">No
</div>
</div>
</form>

</div>
@endsection