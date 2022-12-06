@extends('trainee.mainPage')

@section('content-training')
<div class="content">
<img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%">
    <h2 class="spashlist">SAMI (ADVANCED ELECTRONICS)</h2>
    <button type="button"  class="btn btn-outline-danger delet-btn">Delete</button>
    <br><br><hr>
    <strong style="font-size: 200%;">Company Information:</strong><hr>
    <strong style="font-size: 130%;" class="info">Registration number:</strong><p id="Registration-number"></p><br>
    <strong style="font-size: 130%;" class="info"> Office phone number:</strong><p id="Office-phone-number"></p><br>
    <strong style="font-size: 130%;" class="info">Employee full name:</strong><p id="Employee-full-name"></p><br>
    <strong style="font-size: 130%;" class="info"> Employee mobile number:</strong><p id="Employee-mobile-number"></p><br>
    <strong style="font-size: 130%;" class="info">Email:</strong><p id="Email"></p> <br>
    <strong style="font-size: 130%;" class="info">Website:</strong><p id="Website"></p> <br>
    <strong style="font-size: 130%;" class="info">City:</strong><p id="City"></p> <br>
    <strong style="font-size: 130%;" class="info">brief description about the company:</strong><p id="brief-description-about-the-company"></p><br> 
</div>
@endsection