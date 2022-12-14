@extends('trainee.mainPage')

@section('content-training')

<div class="content">

    <div class="rate">
        <input type="radio" id="star5" name="rate" value="5" />
        <label for="star5" title="text" >5 stars  </label>
        <input type="radio" id="star4" name="rate" value="4" />
        <label for="star4" title="text" >4 stars</label>
        <input type="radio" id="star3" name="rate" value="3" />
        <label for="star3" title="text">3 stars </label>
        <input type="radio" id="star2" name="rate" value="2" />
        <label for="star2" title="text" >2 stars</label>
        <input type="radio" id="star1" name="rate" value="1" />
        <label for="star1" title="text" >1 star</label>
    </div>

    <br> <br><br><br>

        <div class="viw"> <p> i loved the working enviroment i loved the working enviromenti loved the working enviromenti loved the working enviromenti loved the working enviromenti loved the;ldf,c working enviroment </p></div>

    <div>
    <button type="button" class="can-but"> Cancel </button>
    <button type="button" class="del-but" class="fas fa-edit"> Delete </button>
    </div>


</div>

@endsection
