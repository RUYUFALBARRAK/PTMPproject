@extends('trainee.mainPage')

@section('content-training')

<div class="content">


<span style="display:none;">{{$reviewDate = $review->Create_at}}  {{ $stars = $review -> star_rating}}  </span>

@php
$date = substr("$reviewDate",0,10);
$greyStar = 5 - $stars;
@endphp

            <!-- STARS -->
    <div style="margin-left: 1%;">
    @for($i=0; $i<$stars; $i++) <!-- checked stars -->
    <span class="fa fa-star fa-2xl checked"></span>
    @endfor


    @if( ($greyStar) != 0) <!-- Unchecked stars -->
@for($i=0; $i<$greyStar; $i++)
<span class="fa fa-star fa-2xl " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    @endfor
    @endif

    <span class="review-date"> {{$date}} </span>
</div>

    <br> <br>

        <div class="viw"> <p> {{$review->review}} </p></div>

    <div>

    <form method="POST" action="{{ route('destroy',[$review->id]) }}">
           @csrf
           <input name="_method" type="hidden" value="DELETE">
    <button type="submit" id="delete" data-toggle="tooltip" title='Delete' class="del-but  show_confirm" > Delete </button>
    </form>

    <a href="{{ url()->previous() }}"><button  class="can-but2" class="fas fa-edit"> Cancel </button> </a>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">


     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Do you really want to delete your feedback?`,
              text: "This proccess cannot be undone",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              className: "myClass"
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

      </script>

</div>

@endsection
