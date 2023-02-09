@extends('Company.mainPage')

@section('content-training')
<div class="content">
<img src="{{asset( 'storage/images/'. $loginIdcompUser['logoImage'])}}" alt="Company logo" class="logoCompany">
<h3 class="spashlist">{{$loginIdcompUser['orgnizationName']}} Company</h3>
<br><br><hr>
<form action="{{ $action === 'edit' ? route('EditAuthopportunity', ['oppo' => $oppo]) : route('Authopportunity') }}" enctype="multipart/form-data" method="POST">
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
    <label for="validationTooltip01" class="form-label">Job Title :<span class ="red"> * </span></label>
      <input type="text" class="form-control @error('jobTitle') is-invalid @enderror" maxlength = "50" placeholder="Enter job title " value="{{ $action === 'edit' ? $oppo->jobTitle : old('jobTitle') }}" name="jobTitle">
      @if ($errors->has('jobTitle'))
        <span class="text-danger">{{ $errors->first('jobTitle') }}</span>
      @endif
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">  Work Hours :<span class ="red"> * </span></label>
      <input type="number" class="form-control @error('workHours') is-invalid @enderror" maxlength = "3" placeholder="Enter work hours" value="{{ $action === 'edit' ? $oppo->workHours : old('workHours') }}" name="workHours">
      @if ($errors->has('workHours'))
        <span class="text-danger">{{ $errors->first('workHours') }}</span>
      @endif
    </div>
  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">Supervisor Full Name:<span class ="red"> * </span></label>
      <input type="text" class="form-control @error('supervisorName') is-invalid @enderror" maxlength = "50" placeholder="Enter Supervisor full name" value="{{ $action === 'edit' ? $oppo->supervisorName : old('supervisorName') }}" name="supervisorName">
       @if ($errors->has('supervisorName'))
        <span class="text-danger">{{ $errors->first('supervisorName') }}</span>
        @endif
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Supervisor Mobile Number:<span class ="red"> * </span></label>
      <input type="tel" class="form-control @error('supervisorPhone') is-invalid @enderror" maxlength = "12" placeholder="Enter Supervisor mobile number 96650xxxxx" value="{{ $action === 'edit' ? $oppo->supervisorPhone : old('supervisorPhone') }}" name="supervisorPhone">
       @if ($errors->has('supervisorPhone'))
        <span class="text-danger">{{ $errors->first('supervisorPhone') }}</span>
        @endif
    </div>
  </div>

  <div class="row opportunity-form">
         <div class="col">
          <label for="validationTooltip01" class="form-label"> Start Date:<span class ="red"> * </span></label>
              <input type="date" class="form-control @error('Start_at') is-invalid @enderror" placeholder="Enter start date" value="{{ $action === 'edit' ? $oppo->Start_at : old('Start_at') }}" name="Start_at">
               @if ($errors->has('Start_at'))
              <span class="text-danger">{{ $errors->first('Start_at') }}</span>
              @endif
           </div>
                    <div class="col">
                      <label for="validationTooltip01" class="form-label"> End Date:<span class ="red"> * </span></label>
                        <input type="date" class="form-control @error('end_at') is-invalid @enderror" placeholder="Enter start date" value="{{ $action === 'edit' ? $oppo->end_at : old('end_at') }}" name="end_at">
                         @if ($errors->has('end_at'))
                        <span class="text-danger">{{ $errors->first('end_at') }}</span>
                        @endif
                    </div>  
  </div>

  <div class="row opportunity-form">
    <div class="col">
      <label for="validationTooltip01" class="form-label"> City :<span class ="red"> * </span></label>
      <select id="city" value="{{ $action === 'edit' ? $oppo->address : old('address') }}" name="address" class="form-select form-select-lg">
        @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif

        <option> select a city </option>
        <option>Abha</option>
        <option>Al-Abwa</option>
        <option>Al Artaweeiyah</option>
        <option>Al Bukayriyah</option>
        <option>Badr</option>
        <option>Baljurashi</option>
        <option>Bisha</option>
        <option>Bareq</option>
        <option>Buraydah</option>
        <option>Al Bahah</option>
        <option>Buqaa</option>
        <option>Dammam</option>
        <option>Dhahran</option>
        <option>Dhurma</option>
        <option>Dahaban</option>
        <option>Diriyah</option>
        <option>Duba</option>
        <option>Dumat Al-Jandal</option>
        <option>Dawadmi</option>
        <option>Farasan</option>
        <option>Gatgat</option>
        <option>Gerrha</option>
        <option>Ghawiyah</option>
        <option>Al-Gwei'iyyah</option>
        <option>Harmah</option>
        <option>Ha'il</option>
        <option>Hotat Bani Tamim</option>
        <option>Hofuf</option>
        <option>Huraymila</option>
        <option>Hafr Al-Batin</option>
        <option>Jabal Umm al Ru'us</option>
        <option>Jalajil</option>
        <option>Jeddah</option>
        <option>Jizan</option>
        <option>Jizan Economic City</option>
        <option>Jubail</option>
        <option>Al Jafr</option>
        <option>Khafji</option>
        <option>Khaybar</option>
        <option>King Abdullah Economic City</option>

        <option>King Abdullah Economic City</option>
        <option>Khamis Mushait</option>
        <option>Al-Saih</option>
        <option>Knowledge Economic City, Medina</option>
        <option>Khobar</option>
        <option>Al-Khutt</option>
        <option>Layla</option>
        <option>Lihyan</option>
        <option>Al Lith</option>
        <option>Al Majma'ah</option>
        <option>Mastoorah</option>
        <option>Al Mikhwah</option>
        <option>Al-Mubarraz</option>
        <option>Al Mawain</option>
        <option>Medina</option>
        <option>Mecca</option>
        <option>Muzahmiyya</option>
        <option>Najran</option>
        <option>Al-Namas</option>
        <option>Umluj</option>
        <option>Al-Omran</option>
        <option>Al-Oyoon</option>
        <option>Qadeimah</option>
        <option>Qatif</option>
        <option>Qaisumah</option>
        <option>Al Qunfudhah</option>
        <option>Qurayyat</option>
        <option>Rabigh</option>
        <option>Rafha</option>
        <option>Ar Rass</option>
        <option>Ras Tanura</option>
        <option>Ranyah</option>
        <option>Riyadh</option>
        <option>Riyadh Al-Khabra</option>
        <option>Rumailah</option>
        <option>Sabt Al Alaya</option>
        <option>Sarat Abidah</option>
        <option>Saihat</option>
        <option>Safwa city</option>
        <option>Sakakah</option>
        <option>Sharurah</option>
        <option>Shaqraa</option>
        <option>Shaybah</option>
        <option>As Sulayyil</option>
        <option>Taif</option>
        <option>Tabuk</option>
        <option>Tanomah</option>
        <option>Tarout</option>
        <option>Tayma</option>
        <option>Thadiq</option>
        <option>Thuwal</option>
        <option>Thuqbah</option>
        <option>Turaif</option>
        <option>Tabarjal</option>
        <option>Udhailiyah</option>
        <option>Al-'Ula</option>
        <option>Um Al-Sahek</option>
        <option>Unaizah</option>
        <option>Uqair</option>
        <option>'Uyayna</option>
        <option>Uyun AlJiwa</option>
        <option>Wadi Al-Dawasir</option>
        <option>Al Wajh</option>
        <option>Yanbu</option>
        <option>Az Zaimah</option>
        <option>Zulfi</option>
      </select>
       @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
    </div>
    
    <script>
      $("#address").append($("#address option:gt(0)").sort(function (a, b) {
        return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
      }));
    </script>

    <div class="col">
    <label for="validationTooltip01" class="form-label">Application Deadline:<span class ="red"> * </span></label>
      <input type="date" class="form-control @error('AppDeadline') is-invalid @enderror" placeholder="Enter Application deadline" value="{{ $action === 'edit' ? $oppo->AppDeadline : old('AppDeadline') }}" name="AppDeadline">
       @if ($errors->has('AppDeadline'))
        <span class="text-danger">{{ $errors->first('AppDeadline') }}</span>
        @endif
    </div>

  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Training Requirements : <span class ="red"> * </span></label>
      <textarea rows="2"id="validationTooltip01" maxlength="250" class="form-control @error('requirement') is-invalid @enderror" placeholder="Enter Training Requirements" value="{{ $action === 'edit' ? $oppo->requirement : old('requirement') }}" name="requirement">{{ $action === 'edit' ? $oppo->requirement : old('requirement') }}</textarea>
      <div class="d-inline-block"><span id="announcement-content-lengt">0</span>/250</div>
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Number Of Trainees:<span class ="red"> * </span></label>
      <input type="number" class="form-control @error('numberOfTrainee') is-invalid @enderror"  placeholder="Enter Number of trainees" value="{{ $action === 'edit' ? $oppo->numberOfTrainee : old('numberOfTrainee') }}" name="numberOfTrainee">
       @if ($errors->has('numberOfTrainee'))
        <span class="text-danger">{{ $errors->first('numberOfTrainee') }}</span>
        @endif
    </div>
  </div>
  <div class="row opportunity-form">
  <label for="validationTooltip02">Brief Description Of The Role:<span class ="red"> * </span></label>
    <textarea class="form-control @error('RoleDescription') is-invalid @enderror" maxlength="250" rows="5" id="validationTooltip02" value="{{ $action === 'edit' ? $oppo->RoleDescription : old('RoleDescription') }}" name="RoleDescription">{{ $action === 'edit' ? $oppo->RoleDescription : old('RoleDescription') }}</textarea>
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
  <label for="comment">Required Majors: <span class ="red"> * </span></label>
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
  <input type="radio"  class="form-check-input" id="radio1" name="incentive"  value="with incentive" checked>Yes
  <label class="form-check-label" for="radio1"></label>
    </div>

<div class="form-check">
  <input type="radio" class="form-check-input" id="radio2" value="without incentive"  name="incentive" >No
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
                    <input type="file" name="uploudedfile" value="{{ $action === 'edit' ? $oppo->uploudedfile : old('uploudedfile') }}" class="PTuploadedfile " hidden>
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
                <button class="add-but-center" type="submit">{{ $action === 'edit' ? 'Edit opportunity' : 'Add opportunity' }}</button>
        </div>
</form>
</div>
@endsection
