@extends('trainee.mainPage')

@section('content-training')

<div class="content">

    <form action="" method="">

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

    <div>
    <p> <label> <textarea name="review" rows="5" cols="50" placeholder="How is your experience?" style="border-radius:4px; font-size:130%; font-family:'Actor'; font-weight:200; padding:1%;"></textarea></label> </p>
    </div>

    <div>
    <button type="button" class="add-but" data-bs-toggle="modal" data-bs-target="#error"> Add </button>
    <button type="button" class="can-but" class="fas fa-edit"> Cancel </button>
    </div>

</form>

</div>

@endsection
