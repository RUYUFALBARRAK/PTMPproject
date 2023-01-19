@extends('trainee.mainPage')

@section('content-training')

<div class="content">

<div style="font-size:23px;"> Add A Review To <b>{{ $comapnyInfo -> orgnizationName }} </b> </div>


<br>


    <form action="/traineeMainPage" method="POST">
    @csrf
    <div class="rating-css">
    <div class="star-icon">
        <input type="radio" value="1" name="product_rating" checked id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="product_rating" id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="product_rating" id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="product_rating" id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="product_rating" id="rating5">
        <label for="rating5" class="fa fa-star"></label>
    </div>
</div>

    <br> <br><br>


    <div style="margin-top: -1%;">
    <p> <label> <textarea id="review" name="review"  rows="5" cols="50" placeholder="How is your experience?" style="border-radius:4px; font-size:130%; font-family:'Actor';
    font-weight:200; padding:1%; @error('review') border-color:#e72828; border-width:1.5px; @enderror "></textarea></label> </p>
    </div>

    @error('review') <p style="color:#e72828; margin-top: -2%;"> {{$message}} </p> @enderror

    <div>
    <input type="submit" value="Add" class="add-but" >  </input> <!-- data-bs-toggle="modal" data-bs-target="#error" -->
    <a href="{{ url()->previous() }}"><button type="button" class="can-but1" class="fas fa-edit"> Cancel </button> </a>
    </div>

</form>

</div>

@endsection
