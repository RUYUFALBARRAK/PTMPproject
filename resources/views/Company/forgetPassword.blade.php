@extends('layouts.layout')

@section('content')

<img src="img/background_ksu2.png" alt="ksu" class="back">
<div class="container-sm">
<img src="img/learning.png" alt="ksu" class="learning" width="30%" hight="30%">
<h3 class="display-3">Forget Password</h3>
<hr>
<form class="row g-3 needs-validation" method="" novalidate>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter your email agin " required>
    <div class="valid-tooltip">
      Looks good!
    </div>
  </div>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">Confirm email</label>
    <input type="Password" class="form-control" id="validationTooltip01" placeholder="Enter your email agin " required>
    <div class="valid-tooltip">
      Looks good!
    </div>
  </div>

  
  <div class="col-12">
    <button class="add-but-login" type="submit">Log in</button>
  </div>
  <p>Are you A company and you don’t have an account? <a class="link" href="">Sign up</a></p>
  <p>Are you A company and you already have an account? <a class="link" href="">Sign in</a></p>
  <p>Are you a Student or KSU Staff ?  <a class="link"href="">Sign In</a></p>
</form>
</div>

@endsection