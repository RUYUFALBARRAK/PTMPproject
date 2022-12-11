@extends('trainee.mainPage')

@section('content-training')

<div class="content">

<div>
<img src="img/SDAIA.png" alt="Company logo" width="15%" hight="15%" style="margin-left:40%;">
</div>
<br> <br><br>


<div style="margin-bottom: 8%;">
<img src="img/ava1.png" alt="avatar" width="5%" hight="5%">
<span style="margin-left: 1%;  font-size: 160%;"> Razan Alsaif </span>

<p style="margin-left: 5%; margin-top: 0.3%; font-size: 150%; color:rgb(110, 107, 124);"> good love it it <span class="dt">Aug. 20,2020 </span></p>

<span class="rate2" style="margin-left: 84%; margin-top: -7%;">
        <input type="radio" id="star5" name="rate2" value="5" />
        <label for="star5" title="text" >5 stars  </label>
        <input type="radio" id="star4" name="rate2" value="4" />
        <label for="star4" title="text" >4 stars</label>
        <input type="radio" id="star3" name="rate2" value="3" />
        <label for="star3" title="text">3 stars </label>
        <input type="radio" id="star2" name="rate2" value="2" />
        <label for="star2" title="text" >2 stars</label>
        <input type="radio" id="star1" name="rate2" value="1" />
        <label for="star1" title="text" >1 star</label>
    </span>
<br>
<hr style="width:107%; margin-bottom: -4.4%; margin-left: -3.5%;">
</div>


<div style="">
<img src="img/ava1.png" alt="avatar" width="5%" hight="5%">
<span style="margin-left: 1%;  font-size: 160%;"> Razan Alsaif </span>
<p style="margin-left: 5%; margin-top: 0.3%; font-size: 150%; color:rgb(110, 107, 124);"> good love it it <span class="dt">Aug. 20,2020 </span></p>

<span class="rate2" style="margin-left: 84%; margin-top: -7%;">
        <input type="radio" id="star5" name="rate2" value="5" />
        <label for="star5" title="text" >5 stars  </label>
        <input type="radio" id="star4" name="rate2" value="4" />
        <label for="star4" title="text" >4 stars</label>
        <input type="radio" id="star3" name="rate2" value="3" />
        <label for="star3" title="text">3 stars </label>
        <input type="radio" id="star2" name="rate2" value="2" />
        <label for="star2" title="text" >2 stars</label>
        <input type="radio" id="star1" name="rate2" value="1" />
        <label for="star1" title="text" >1 star</label>
    </span>

<br>
<hr style="width:107%; margin-bottom: -4.4%; margin-left: -3.5%;">
</div>


<!-- if it is the last review don't add margin-bottom: 8% -->

</div>


@endsection
