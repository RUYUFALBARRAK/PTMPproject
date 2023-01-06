@extends('Company.mainPage')

@section('content-training')
<div class="content">
<img src="img/SDAIA.png" alt="Company logo" class="logoCompany">
<h3 class="spashlist">SAMI (ADVANCED ELECTRONICS)</h3>
<br><br><hr>
<form action="{{ route('Authopportunity') }}" enctype="multipart/form-data" method="POST">
  @csrf
    @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger">{{Session::get('fail')}}</div>
  @endif
<div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">job title :</label>
      <input type="text" class="form-control @error('jobTitle') is-invalid @enderror" placeholder="Enter job title " value="{{ old('jobTitle') }}" name="jobTitle">
       @if ($errors->has('jobTitle'))
        <span class="text-danger">{{ $errors->first('jobTitle') }}</span>
        @endif
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">  work hours :</label>
      <input type="number" class="form-control @error('workHours') is-invalid @enderror" placeholder="Enter work hours" value="{{ old('workHours') }}" name="workHours">
       @if ($errors->has('workHours'))
        <span class="text-danger">{{ $errors->first('workHours') }}</span>
        @endif
    </div>
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">Supervisor full name:</label>
      <input type="text" class="form-control @error('supervisorName') is-invalid @enderror" placeholder="Enter Supervisor full name" value="{{ old('supervisorName') }}" name="supervisorName">
       @if ($errors->has('supervisorName'))
        <span class="text-danger">{{ $errors->first('supervisorName') }}</span>
        @endif
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Supervisor mobile number:</label>
      <input type="tel" class="form-control @error('supervisorPhone') is-invalid @enderror" placeholder="Enter Supervisor mobile number" value="{{ old('supervisorPhone') }}" name="supervisorPhone">
       @if ($errors->has('supervisorPhone'))
        <span class="text-danger">{{ $errors->first('supervisorPhone') }}</span>
        @endif
    </div>
  </div>

  <div class="row opportunity-form">
         <div class="col">
          <label for="validationTooltip01" class="form-label"> Start date:</label>
              <input type="date" class="form-control @error('Start_at') is-invalid @enderror" placeholder="Enter start date" value="{{ old('Start_at') }}" name="Start_at">
               @if ($errors->has('Start_at'))
              <span class="text-danger">{{ $errors->first('Start_at') }}</span>
              @endif
           </div>
                    <div class="col">
                      <label for="validationTooltip01" class="form-label"> End date:</label>
                        <input type="date" class="form-control @error('end_at') is-invalid @enderror" placeholder="Enter start date" value="{{ old('end_at') }}" name="end_at">
                         @if ($errors->has('end_at'))
                        <span class="text-danger">{{ $errors->first('end_at') }}</span>
                        @endif
                    </div>  
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Address: </label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" value="{{ old('address') }}" name="address">
       @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Application deadline:</label>
      <input type="date" class="form-control @error('AppDeadline') is-invalid @enderror" placeholder="Enter Application deadline" value="{{ old('AppDeadline') }}" name="AppDeadline">
       @if ($errors->has('AppDeadline'))
        <span class="text-danger">{{ $errors->first('AppDeadline') }}</span>
        @endif
    </div>
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Training Requirements :</label>
      <textarea rows="2" class="form-control @error('requirement') is-invalid @enderror" placeholder="Enter Training Requirements" value="{{ old('requirement') }}" name="requirement"></textarea>
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Number of trainees:</label>
      <input type="number" class="form-control @error('numberOfTrainee') is-invalid @enderror" placeholder="Enter Number of trainees" value="{{ old('numberOfTrainee') }}" name="numberOfTrainee">
       @if ($errors->has('numberOfTrainee'))
        <span class="text-danger">{{ $errors->first('numberOfTrainee') }}</span>
        @endif
    </div>
  </div>
  <div class="row opportunity-form">
  <label for="comment">brief descriptionof the role:</label>
    <textarea class="form-control @error('RoleDescription') is-invalid @enderror" rows="5" id="comment" value="{{ old('RoleDescription') }}" name="RoleDescription"></textarea>
     @if ($errors->has('RoleDescription'))
        <span class="text-danger">{{ $errors->first('RoleDescription') }}</span>
        @endif
</div>
<div class="row opportunity-form">
  <label for="comment">Required majors:</label>
    <div class="form-group col-md-2">
      <select name="majors" id="inputState" class="form-select form-select-lg">
        <option selected> Required majors</option>
        <option>nformation Technology and Information Systems</option>
        <option>Computer Science</option>
        <option>Information Science</option>
        <option>Software Engineering</option>
        <option>Computer Engineering</option>
        <option>Cybersecurity</option>
      </select>
    </div>
<br> <br> <br> <br>
 <label for="comment">include incentive:</label>
    <div class="form-check">
  <input type="radio"  class="form-check-input" id="radio1" name="incentive"  checked>Yes
  <label class="form-check-label" for="radio1"></label>
    </div>

<div class="form-check">
  <input type="radio" class="form-check-input" id="radio2"  name="incentive" >No
</div>
 @if ($errors->has('incentive'))
        <span class="text-danger">{{ $errors->first('incentive') }}</span>
        @endif
</div><br>
<hr>

        <h4>Uploud PT plan</h4>
        <hr>
        <div class="warp">
            

                <div class="form1" onclick="document.querySelector('[name=uploudedfile]').click()">
                    <input type="file" name="uploudedfile" value="{{ old('uploudedfile') }}" class="PTuploadedfile " hidden>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Browse file to upload</p>
                </div>

                @error('uploudedfile')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <section class="prograss-area" style="display: none">
                    <div class="row">
                        <i class="fas fa-file-alt"></i>
                        <div class="cont">
                            <div class="detal">
                                <span class="name">s</span>
                                <span class="precent">0</span>
                            </div>
                        </div>
                    </div>
                </section>
            <!-- <a href="#" class="link2">Upload new file:<span class="glyphicon glyphicon-upload"></span></a> -->
                <button class="add-but-center" type="submit">Add opportunity</button>
        </div>
</form>
</div>
@endsection