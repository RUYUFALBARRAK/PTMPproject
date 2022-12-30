@extends('trainee.mainPage')

@section('content-training')

<div class="content">

<div>
<img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%" style="margin-left:40%;">
</div>
<br> <br><br>

@foreach($reviews)
@endforeach

<!-- First Review -->
<div style="margin-bottom: 8%;">
<img src="img/ava1.png" alt="avatar" width="50px" hight="50px">
<span style="margin-left: 1%;  font-size: 115%;"> Razan Alsaif </span> <span class="rev-date"> Aug. 20,2020 </span>  <br>

<div style="margin-left: 86.5%;">
<span class="fa fa-star fa checked"></span>
    <span class="fa fa-star fa" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    <span class="fa fa-star fa" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    <span class="fa fa-star fa" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    <span class="fa fa-star fa" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
</div>

<p style="margin-left: 5%; margin-top: -3%; margin-bottom: 3.5%; font-size: 120%; width:50%;"> bad </span></p>

<hr style="width:107%; margin-bottom: -4.4%; margin-left: -3.5%;">
</div>


<!-- if it is the last review don't add margin-bottom: 8% -->


<div style="">
<img src="img/ava1.png" alt="avatar" width="50px" hight="50px">
<span style="margin-left: 1%;  font-size: 115%;"> Razan Alsaif </span> <span class="rev-date"> Aug. 20,2020 </span>  <br>

<div style="margin-left: 86.5%;">
<span class="fa fa-star fa checked"></span>
    <span class="fa fa-star fa checked"></span>
    <span class="fa fa-star fa" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    <span class="fa fa-star fa" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    <span class="fa fa-star fa" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
</div>

<p style="margin-left: 5%; margin-top: -3%; margin-bottom: 3.5%; font-size: 120%; width:50%;"> Average </span></p>

<hr style="width:107%; margin-bottom: -4.4%; margin-left: -3.5%;">
</div>


</div>
@endsection
