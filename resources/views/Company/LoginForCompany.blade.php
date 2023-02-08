@extends('layouts.layout')

@section('content')

<img src="{{asset('img/background_ksu2.png')}}" alt="ksu" class="back">
<div class="container-sm">
<img src="{{asset('img/learning.png')}}" alt="ksu" class="learning" width="30%" hight="30%">
<h3 class="display-3">Log in</h3>
<hr>
@if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger">{{Session::get('fail')}}</div>
  @endif
    @if(Session::has('correctReg'))
  <div class="alert alert-success">{{Session::get('correctReg')}}</div>
  @endif
<form class="row g-3 needs-validation" method="POST" action=" {{ route('Authlogincompany')}}" novalidate>
@csrf
  <div class="textField">
    <label for="validationTooltip01" class="form-label">Email:</label>
    <input type="text" class="form-control @error('orgnizationEmail') is-invalid @enderror" id="validationTooltip01" value="{{ old('orgnizationEmail') }}" name="orgnizationEmail" placeholder="Email" required>
    @if ($errors->has('orgnizationEmail'))
    <span class="text-danger">{{ $errors->first('orgnizationEmail') }}</span>
    @endif
  </div>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">Password:</label>
    <div class="col input-group mb-3">
    <input type="Password" class="form-control  @error('password') is-invalid @enderror" id="password2"  name="password" placeholder="Password" required>
    <span class="input-group-text"><i class="far fa-eye-slash" id="togglePassword2"></i></span>
    </div>
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
  </div>
<script>
 const password2 = document.querySelector("#password2");
document.querySelector("#togglePassword2").addEventListener("click", function () {
const type2 = password2.getAttribute("type") == "password" ? "text" : "password";
password2.setAttribute("type", type2);
this.classList.toggle('fa-eye');
});
</script>

  <div class="col-12">
    <button class="add-but-login" type="submit">Log in</button>
  </div>
  <a class="link-center" href="forgetPassword"> Forget Password</a>
  <p>Are you A company and you don’t have an account? <a class="link" href="registerCompany">Sign up</a></p>
  <p>Are you a Student or KSU Staff ?  <a class="link" href="login">Sign In</a></p>
</form>
</div>

@endsection
