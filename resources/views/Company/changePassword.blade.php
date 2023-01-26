@extends('layouts.layout')

@section('content')

<img src="img/background_ksu2.png" alt="ksu" class="back">
<div class="container-sm">
<img src="img/learning.png" alt="ksu" class="learning" width="30%" hight="30%">
<h3>Change Password</h3>
<hr>
<form class="row g-3 needs-validation" method="" novalidate>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">New Password</label>
    <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter a new password " required>
    <div class="valid-tooltip">
      Looks good!
    </div>
  </div>
  <div class="textField">
    <label for="validationTooltip01" class="form-label">Confirm Password</label>
    <input type="Password" class="form-control" id="validationTooltip01" placeholder="Enter your password agin " required>
    <div class="valid-tooltip">
      Looks good!
    </div>
  </div>

  
  <div class="col-12">
    <button class="add-but-login" type="submit">Submit</button>
  </div>
</form>
</div>

@endsection