@extends('layouts.layout')

@section('content')

<img src="img/background_ksu2.png" alt="ksu" class="back">
<div class="container-sm">
<img src="img/learning.png" alt="ksu" class="learning" width="200px" hight="200px">
<h3 class="display-3">Log in</h3>
<hr>
<form class="row g-3 needs-validation" method="" novalidate>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">ID</label>
    <input type="text" class="form-control" id="validationTooltip01" placeholder="ID" required>
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
  <p>Are you A company and you already have an account? <a href="">Sign In</a></p>
</form>
</div>

@endsection