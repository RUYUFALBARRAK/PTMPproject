@extends('layouts.layout')

@section('content')

<img src="img/background_ksu2.png" alt="ksu" class="back">
<div class="container-sm">
<img src="img/learning.png" alt="ksu" class="learning" width="30%" hight="30%">
<p class="display-3">Log in</p>
<hr>
@if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger">{{Session::get('fail')}}</div>
  @endif
<form class="row g-3 needs-validation" method="POST" action=" {{ route('Authlogin')}}" novalidate>
  @csrf
  <div class="textField">
    <label for="validationTooltip01" class="form-label">ID</label>
    <input type="text" class="form-control @error('id') is-invalid @enderror" value="{{ old('id') }}" id="validationTooltip01" placeholder="ID" name="id"required>
    @if ($errors->has('id'))
    <span class="text-danger">{{ $errors->first('id') }}</span>
    @endif
  </div>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">Password</label>
    <div class="col input-group mb-3">
    <input type="Password" id="password2" class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="Password" required>
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
  <p>Are you A company and you don’t have an account? <a class="link" href="registerCompany">Sign up</a></p>
  <p>Are you A company and you already have an account? <a class= "link"href="loginCompany">Sign In</a></p>
</form>
</div>

@endsection