@extends('layouts.layout')

@section('content')

<img src="img/background_ksu2.png" alt="ksu" class="back">
<div class="container-sm">
<img src="img/learning.png" alt="ksu" class="learning" width="30%" hight="30%">
<h3 class="display-3">Log in</h3>
<hr>
<form class="row g-3 needs-validation" method="" novalidate>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationTooltip01" placeholder="Email" required>
    <div class="valid-tooltip">
      Looks good!
    </div>
  </div>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">Password</label>
    <input type="Password" class="form-control" id="validationTooltip01" placeholder="Password" required>
    <div class="valid-tooltip">
      Looks good!
    </div>
  </div>

  
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Log in</button>
  </div>
  <p>Are you A company and you don’t have an account? <a href="">Sign up</a></p>
  <p>Are you a Student or KSU Staff ?  <a href="">Sign In</a></p>
</form>
</div>

@endsection