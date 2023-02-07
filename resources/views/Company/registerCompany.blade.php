
@extends('layouts.layout')

@section('content')

<img src="img/background_ksu2.png" alt="ksu" class="back">
<div class="container-big">
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3></h3>
      </div>
      <div class="modal-body">
        <div class="external-file">
          <iframe src="#" width="500" height="300"frameborder="0"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<form class="form-balqees" method="POST" enctype="multipart/form-data" action=" {{ route('Authreg')}}" novalidate>
@csrf

  @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger">{{Session::get('fail')}}</div>
  @endif
  @if($doc!=null)
    <p><a class="link" href="{{ $doc->getDocumentURL() }}"> training specifications and regulations</a> <a href="{{ $doc->getDocumentURL() }}"><span class="fa fa-download"></span></a></p>
    @endif
    <div class="row opportunity-form">   
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Choose Logo: <span class ="red"> * </span></label>
    <input type="file" class="form-control @error('logoImage') is-invalid @enderror" value="{{ old('logoImage') }}" name="logoImage">
    @if ($errors->has('logoImage'))
        <span class="text-danger">{{ $errors->first('logoImage') }}</span>
        @endif
    <!-- <button class="btn-upload" type="submit">choose file</button>  -->
    </div>
     <div class="col">
    <label for="validationTooltip01" class="form-label">Organization website:<span class ="red"> * </span>  </label>
      <input type="text" class="form-control @error('website') is-invalid @enderror" placeholder="Example: www.organization.com" value="{{ old('website') }}" name="website">
      @if ($errors->has('website'))
        <span class="text-danger">{{ $errors->first('website') }}</span>
        @endif
    </div>
 

  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">Organization full name in English :<span class ="red"> * </span></label>
      <input type="text" class="form-control @error('orgnizationName') is-invalid @enderror" placeholder="Enter organization name here" maxlength = "50" value="{{ old('orgnizationName') }}" name="orgnizationName">
      @if ($errors->has('orgnizationName'))
        <span class="text-danger">{{ $errors->first('orgnizationName') }}</span>
        @endif
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Organization email :<span class ="red"> * </span></label>
      <input type="email" class="form-control @error('orgnizationEmail') is-invalid @enderror" placeholder="Example: Organiztion@orgnization.com" maxlength = "80" value="{{ old('orgnizationEmail') }}" name="orgnizationEmail">
      @if ($errors->has('orgnizationEmail'))
        <span class="text-danger">{{ $errors->first('orgnizationEmail') }}</span>
        @endif
    </div>
  </div>

  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Commercial register number :<span class ="red"><span class ="red"> * </span></span></label>
            <input type="text" class="form-control @error('Registration') is-invalid @enderror" placeholder="Enter organization number here only 10 numbers" maxlength = "10" value="{{ old('Registration') }}" name="Registration">
            @if ($errors->has('Registration'))
            <span class="text-danger">{{ $errors->first('Registration') }}</span>
            @endif
         </div>
         <div class="col">
            <label for="validationTooltip01" class="form-label"> Organization phone number :<span class ="red"> * </span></label>
            <input type="tel" class="form-control @error('OrganizationPhone') is-invalid @enderror"  maxlength = "12"placeholder="Example: 96650*******" value="{{ old('OrganizationPhone') }}" maxlength = "30" name="OrganizationPhone">
            @if ($errors->has('OrganizationPhone'))
            <span class="text-danger">{{ $errors->first('OrganizationPhone') }}</span>
            @endif
         </div>

  </div>
  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip02" class="form-label"> About the organization:<span class ="red"> * </span></label>
      <textarea rows="5" id="validationTooltip02" maxlength="250" class="form-control @error('description') is-invalid @enderror" placeholder="Describe your organization business here." value="{{ old('description') }}" name="description"></textarea>
      @if ($errors->has('description'))
        <div><span class="text-danger">{{ $errors->first('description') }}</span></div>
        @endif
        <div class="d-inline-block"><span id="announcement-content-length">0</span>/250</div>
    </div>
</div>

    <script>
        document.querySelector('#announcement-content-length').textContent = document.querySelector('#validationTooltip02').value.length;
        document.querySelector('#validationTooltip02').oninput = (e) => {
            $('#announcement-content-length').text($('#validationTooltip02').val().length);
        };
    </script>
<div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor full name in English :<span class ="red"> * </span></label>
            <input type="text" class="form-control @error('SupervisorName') is-invalid @enderror" maxlength = "30" placeholder="Example: Ahmed Abduallah Alhassan" value="{{ old('SupervisorName') }}" name="SupervisorName">
            @if ($errors->has('SupervisorName'))
            <span class="text-danger">{{ $errors->first('SupervisorName') }}</span>
            @endif
         </div>
  </div>
  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor phone number :<span class ="red"> * </span></label>
            <input type="tel" class="form-control @error('SupervisorPhone') is-invalid @enderror" maxlength = "12" placeholder="Example: 96650*******" value="{{ old('SupervisorPhone') }}" name="SupervisorPhone">
            @if ($errors->has('SupervisorPhone'))
            <span class="text-danger">{{ $errors->first('SupervisorPhone') }}</span>
            @endif
         </div>
       <div class="col">
      <label for="validationTooltip01" class="form-label"> City :<span class ="red"> * </span></label>
      <select id="city" value="{{ old('city') }}" name="city" class="form-select form-select-lg">
        @if ($errors->has('city'))
        <span class="text-danger">{{ $errors->first('city') }}</span>
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
     
         </div>
  </div>
  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor email :<span class ="red"> * </span></label>
            <input type="email" class="form-control @error('SupervisorEmail') is-invalid @enderror" maxlength = "80" placeholder="Example: supervisor@orgnization.com" value="{{ old('SupervisorEmail') }}" name="SupervisorEmail">
            @if ($errors->has('SupervisorEmail'))
            <span class="text-danger">{{ $errors->first('SupervisorEmail') }}</span>
            @endif
         </div>
         <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor email confirmation :<span class ="red"> * </span></label>
            <div class="col input-group mb-3">
            <input type="email" class="form-control @error('SupervisorEmailConfirm') is-invalid @enderror" maxlength = "80" placeholder="Example: supervisor@orgnization.com" value="{{ old('SupervisorEmailConfirm') }}" name="SupervisorEmail_confirmation">
            @if ($errors->has('SupervisorEmailConfirm'))
            <span class="text-danger">{{ $errors->first('SupervisorEmailConfirm') }}</span>
            @endif
         </div>
  </div>

  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Passowrd:<span class ="red"> * </span></label>
            <div class="col input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" maxlength = "30" placeholder="it should contain at leaste 8 character, small &capital litter and number" name="password">
             <span class="input-group-text"><i class="far fa-eye-slash" id="togglePassword"></i></span>
          </div>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
         </div>
         <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor fax   :<span class ="red"> * </span> </label>
            <input type="tel" class="form-control @error('SupervisorFax') is-invalid @enderror" maxlength = "12" placeholder="Example: +966*********" value="{{ old('SupervisorFax') }}" name="SupervisorFax">
            @if ($errors->has('SupervisorFax'))
            <span class="text-danger">{{ $errors->first('SupervisorFax') }}</span>
            @endif
         </div>

  </div>
<script>
const password = document.querySelector("#password");
document.querySelector("#togglePassword").addEventListener("click", function () {
const type = password.getAttribute("type") === "password" ? "text" : "password";
password.setAttribute("type", type);
this.classList.toggle('fa-eye');
});
</script>

  <div class="row opportunity-form">
  <div class="col">
    <label for="validationTooltip01" class="form-label">Password confirmation: <span class ="red"> * </span></label>
    <div class="col input-group mb-3">
      <input type="password" id="password2" class="form-control @error('password_confirmation') is-invalid @enderror" maxlength = "30" placeholder="must be simailar to password field" name="password_confirmation">
        <span class="input-group-text"><i class="far fa-eye-slash" id="togglePassword2"></i></span>
        </div>
        @if ($errors->has('password_confirmation'))
          <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
          @endif
    </div>
<script>
 const password2 = document.querySelector("#password2");
document.querySelector("#togglePassword2").addEventListener("click", function () {
const type2 = password2.getAttribute("type") === "password" ? "text" : "password";
password2.setAttribute("type", type2);
this.classList.toggle('fa-eye');
});
</script>
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Address: </label>
      <input type="text" class="form-control @error('Address') is-invalid @enderror " maxlength = "50" placeholder="Riyadh-Olay street" value="{{ old('Address') }}" name="Address">
      @if ($errors->has('Address'))
        <span class="text-danger">{{ $errors->first('Address') }}</span>
        @endif
    </div>
  </div>
  <br><br>

  <div class="col-12">
    <button class="add-but-center" value="submit" type="submit">Create account </button>
  </div>

</form>

</div>
@endsection