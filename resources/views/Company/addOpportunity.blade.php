@extends('Company.mainPage')

@section('content-training')
<div class="content">
<img src="{{asset($loginIdcompUser['logoImage'])}}" alt="Company logo" class="logoCompany">
<h3 class="spashlist">{{$loginIdcompUser['orgnizationName']}} Company</h3>
<br><br><hr>
<form action="{{ route('Authopportunity') }}" enctype="multipart/form-data" method="POST">
  @csrf
    @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger">{{Session::get('fail')}}</div>
  @endif 
   @if ($errors->has('uploudedfile'))
      <div class="alert alert-danger">{{ $errors->first('uploudedfile') }}</div>
   @endif
<div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">Job Title :</label>
      <input type="text" class="form-control @error('jobTitle') is-invalid @enderror" maxlength = "50" placeholder="Enter job title " value="{{ old('jobTitle') }}" name="jobTitle">
      @if ($errors->has('jobTitle'))
        <span class="text-danger">{{ $errors->first('jobTitle') }}</span>
      @endif
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">  Work Hours :</label>
      <input type="number" class="form-control @error('workHours') is-invalid @enderror" maxlength = "3" placeholder="Enter work hours" value="{{ old('workHours') }}" name="workHours">
      @if ($errors->has('workHours'))
        <span class="text-danger">{{ $errors->first('workHours') }}</span>
      @endif
    </div>
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">Supervisor Full Name:</label>
      <input type="text" class="form-control @error('supervisorName') is-invalid @enderror" maxlength = "50" placeholder="Enter Supervisor full name" value="{{ old('supervisorName') }}" name="supervisorName">
       @if ($errors->has('supervisorName'))
        <span class="text-danger">{{ $errors->first('supervisorName') }}</span>
        @endif
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Supervisor Mobile Number:</label>
      <input type="tel" class="form-control @error('supervisorPhone') is-invalid @enderror" maxlength = "12" placeholder="Enter Supervisor mobile number 96650xxxxx" value="{{ old('supervisorPhone') }}" name="supervisorPhone">
       @if ($errors->has('supervisorPhone'))
        <span class="text-danger">{{ $errors->first('supervisorPhone') }}</span>
        @endif
    </div>
  </div>

  <div class="row opportunity-form">
         <div class="col">
          <label for="validationTooltip01" class="form-label"> Start Date:</label>
              <input type="date" class="form-control @error('Start_at') is-invalid @enderror" placeholder="Enter start date" value="{{ old('Start_at') }}" name="Start_at">
               @if ($errors->has('Start_at'))
              <span class="text-danger">{{ $errors->first('Start_at') }}</span>
              @endif
           </div>
                    <div class="col">
                      <label for="validationTooltip01" class="form-label"> End Date:</label>
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
    <label for="validationTooltip01" class="form-label">Application Deadline:</label>
      <input type="date" class="form-control @error('AppDeadline') is-invalid @enderror" placeholder="Enter Application deadline" value="{{ old('AppDeadline') }}" name="AppDeadline">
       @if ($errors->has('AppDeadline'))
        <span class="text-danger">{{ $errors->first('AppDeadline') }}</span>
        @endif
    </div>
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Training Requirements :</label>
      <textarea rows="2"id="validationTooltip01" maxlength="250" class="form-control @error('requirement') is-invalid @enderror" placeholder="Enter Training Requirements" value="{{ old('requirement') }}" name="requirement"></textarea>
      <div class="d-inline-block"><span id="announcement-content-lengt">0</span>/250</div>
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Number Of Trainees:*</label>
      <input type="number" class="form-control @error('numberOfTrainee') is-invalid @enderror"  placeholder="Enter Number of trainees" value="{{ old('numberOfTrainee') }}" name="numberOfTrainee">
       @if ($errors->has('numberOfTrainee'))
        <span class="text-danger">{{ $errors->first('numberOfTrainee') }}</span>
        @endif
    </div>
  </div>
  <div class="row opportunity-form">
  <label for="validationTooltip02">Brief Description Of The Role:*</label>
    <textarea class="form-control @error('RoleDescription') is-invalid @enderror" maxlength="250" rows="5" id="validationTooltip02" value="{{ old('RoleDescription') }}" name="RoleDescription"></textarea>
     @if ($errors->has('RoleDescription'))
        <span class="text-danger">{{ $errors->first('RoleDescription') }}</span>
        @endif
        <div class="d-inline-block"><span id="announcement-content-length">0</span>/250</div>
</div>
    <script>
        document.querySelector('#announcement-content-length').textContent = document.querySelector('#validationTooltip02').value.length;
        document.querySelector('#validationTooltip02').oninput = (e) => {
            $('#announcement-content-length').text($('#validationTooltip02').val().length);
        };
         document.querySelector('#announcement-content-lengt').textContent = document.querySelector('#validationTooltip01').value.length;
        document.querySelector('#validationTooltip01').oninput = (e) => {
            $('#announcement-content-lengt').text($('#validationTooltip01').val().length);
        };
    </script>
<div class="row opportunity-form">
  <label for="comment">Required Majors:*</label>
    <div class="form-group col-md-7">
      <select name="majors" id="inputState" class="form-select form-select-lg">
        <option selected> Required majors</option>
        <option>Information Technology and Information Systems</option>
        <option>Computer Science</option>
        <option>Information Science</option>
        <option>Software Engineering</option>
        <option>Computer Engineering</option>
        <option>Cybersecurity</option>
      </select>
    </div>
<br> <br> <br> <br>
 <label for="comment">Include Incentive?</label>
    <div class="form-check">
  <input type="radio"  class="form-check-input" id="radio1" name="incentive"  value="1" checked>Yes
  <label class="form-check-label" for="radio1"></label>
    </div>

<div class="form-check">
  <input type="radio" class="form-check-input" id="radio2" value="0"  name="incentive" >No
</div>
 @if ($errors->has('incentive'))
        <span class="text-danger">{{ $errors->first('incentive') }}</span>
        @endif
</div><br>
<hr>

        <h4>Uploud PT Plan</h4>
        <hr>
        <div class="warp">
            

                <div class="form1" onclick="document.querySelector('[name=uploudedfile]').click()">
                    <input type="file" name="uploudedfile" value="{{ old('uploudedfile') }}" class="PTuploadedfile " hidden>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Browse file to upload</p>
                </div>

              
     
                <section class="prograss-area" style="display: none">
                    <div class="row">
                        <i class="fas fa-file-alt"></i>
                        <div class="cont">
                            <div class="detal">
                                <span class="name"></span>
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