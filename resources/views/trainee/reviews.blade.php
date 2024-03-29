@extends('trainee.mainPage')

@section('content-training')

<div class="content">

<div>
    <img src="{{ asset( 'storage/images/'.$companyInfo->logoImage ) }}" alt="Company logo" width="23%" hight="23%" style=" margin-left:38% ;">
</div>


@if( count($reviews) == 0)  <!-- in case for no review -->
<div class="not-found">
    <br>
    <hr> <br> <br>
      <img src="{{asset('/img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br>
    </div>

<div class="noReviews"> {{$companyInfo->orgnizationName}} Have No Reviews </div>


@else  <!-- if available review existed-->
<br> <br> <br> <br>

@foreach($reviews as $review)
<span style="display:none;"> {{$reviewDate = $review->Create_at}} {{ $stars = $review -> star_rating}} </span>

@php
$date = substr("$reviewDate",0,10);
$greyStar = 5 - $stars;
@endphp

@if(!($loop->last))

<div style="margin-bottom: 8%;">
<img src="{{asset('img/ava1.png')}}" alt="Avatar" width="50px" hight="50px">
<span style="margin-left: 1%; font-size: 135%; color: rgb(64, 60, 74);;"> {{ $review-> name }} </span> <span class="rev-date"> {{$date}} </span> <br>

<!-- begining of star rating -->

<div style="margin-left: 84%;">

@for($i=0; $i<$stars; $i++) <!-- checked stars -->
<span class="fa fa-star fa-lg checked"></span>
@endfor


@if( ($greyStar) != 0) <!-- Unchecked stars -->
@for($i=0; $i<$greyStar; $i++)
    <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    @endfor
    @endif

</div>

<p style="margin-left: 5%; margin-top: -4.5%; margin-bottom: 3.5%; font-size: 120%; width:70%;"> {{$review->review}} </span></p>

<hr style="width:107%; margin-bottom: -4.4%; margin-top: 4%; margin-left: -3.5%;">
</div>


@else <!-- last review -->
<div>

<img src="{{asset('img/ava1.png')}}" alt="avatar" width="60px" hight="60px">
<span style="margin-left: 1%; font-size: 135%; color: rgb(64, 60, 74);;"> {{ $review-> name }} </span> <span class="rev-date"> {{$date}} </span> <br>


<!-- begining of star rating -->

<div style="margin-left: 84%;">

@for($i=0; $i<$stars; $i++) <!-- checked stars -->
<span class="fa fa-star fa-lg checked"></span>
@endfor


@if( ($greyStar) != 0) <!-- Unchecked stars -->
@for($i=0; $i<$greyStar; $i++)
    <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    @endfor
    @endif

</div>

<p style="margin-left: 5%; margin-top: -4.5%; margin-bottom: 3.5%; font-size: 120%; width:70%;"> {{$review->review}} </span></p>

<hr style="width:107%; margin-bottom: -4.4%; margin-top: 5%; margin-left: -3.5%;">
</div>


@endif

@endforeach

@endif

</div>

@endsection
