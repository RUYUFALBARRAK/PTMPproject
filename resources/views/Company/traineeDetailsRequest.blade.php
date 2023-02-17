@extends('Company.mainPage')

@section('content-training')

<div class="content" style="margin-bottom:-10%;">
<p class="hed-de">Trainee Information</p>
<hr>
<br>
    <div class="trainee-info" >
    <p> <b> Student Name:&nbsp; </b> {{$trainee->name}} </p> <br>
    <p> <b> Phone Number:&nbsp;</b> {{$trainee->phone}} </p><br>
    <p> <b> GPA :&nbsp; </b> {{$trainee->GPA}} <br></p>
    </div>

    <div class="info-sec" style="margin-left:20%;" >
    <p> <b> Email:&nbsp; </b> {{$trainee->email}} </p> <br>
    <p> <b> Major:&nbsp; </b> {{$trainee->major}} </p> <br>
    <p> <b> Number of completed hours :&nbsp; </b> {{$trainee->CompletedHours}} <br></p>
    </div>
</div>


<div class="content" style="margin-bottom:-10%;">

    <p class="hed-de">CV</p>
    <hr>
    <br>

    <div class="trainee-info" style="width:90%;" >
    <p> <b> Skills:&nbsp; </b>  @foreach($skill as $skills)
    @if(!($loop->last))
    {{ $skills ->skills }},

    @else
        {{ $skills ->skills }}

        @endif
        @endforeach
     </p><br>

    <p> <b> Languages:&nbsp; </b> @foreach($language as $lang)
    @if(!($loop->last))
    {{$lang-> languages}},

    @else
    {{$lang-> languages}}

    @endif
    @endforeach
    </p><br>

    <p> <b> Interests :&nbsp; </b> @foreach($interest as $intr)
    @if(!($loop->last))
    {{ $intr -> interests}},

    @else
    {{ $intr -> interests}}

    @endif
    @endforeach
    </p> <br>

    <p> <b> Experience:&nbsp; </b> @foreach($experience as $exp)
    @if(!($loop->last))
    {{ $exp -> Experience}},<br>

    @else
    {{ $exp -> Experience}} <br>

    @endif
    @endforeach
    </p> <br>

    <p> <b> Uploaded Files:&nbsp; </b> </p>

    @if($let)
    <div class="uploaded-files" style="margin-right:-40%; margin-top:2%; margin-bottom:2%;"> <a href="{{ $letter->getDocumentURL() }}">
    <img src="{{asset('img/file-download.png')}}" alt="File Icon" width="17%" height="17%" style="margin-bottom:1%; margin-left:5%;">
    <p style="width:24%; text-align: center; ">Identification Letter</p> </a>
    </div>
    @endif

    @if($aca)
    <div class="uploaded-files" style="margin-right:-40%; margin-top:2%; margin-bottom:2%;"> <a href="{{ $academic }}">
    <img src="{{asset('img/file-download.png')}}" alt="File Icon" width="17%" height="17%" style="margin-bottom:1%; margin-left:5%;">
    <p style="width:24%; text-align: center; ">Transcript</p> </a>
    </div>
    @endif

    @if($cert)
    <div class="uploaded-files" style=" margin-right:-40%; margin-top:2%; margin-bottom:2%;"> <a href="{{ $certificate }}">
    <img src="{{asset('img/file-download.png')}}" alt="File Icon" width="17%" height="17%" style="margin-bottom:1%; margin-left:5%;">
    <p style="width:24%; text-align: center; ">Certificate</p> </a>
    </div>
    @endif

    </div>

    <form action="{{ route('action',[$oppoId]) }}" method="POST">
        @csrf
        <input name="status" type="hidden" value="accept">
        <button type="submit" name="status" value="accept" class="btn btn-outline-success" class="alig" style="font-size: 136%;
        padding: 4px 18px 4px 18px; margin-left: 34%; margin-top: 5%;"> Accept </button>
        </form>

<form action="{{ route('action',[$oppoId]) }}" method="POST">
        @csrf
        <input name="status" type="hidden" value="reject">
        <button type="submit" name="status" value="reject" class="btn btn-outline-danger  show_confirm" class="alig" style="font-size: 135%;
        padding: 4px 20px 4px 20px; margin-left: 55%; margin-top: -7.3%;"> Reject  </button>
        </div>
</form>

</div>

<div>

<script>
 $('.show_confirm').click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `The trainee will be rejected`,
        text: "If you reject this, you can not undo this process.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("The opportunity has been rejected!", {
                    icon: "success",
                });
                form.submit();
            }
        });
});


</script>

</div>


@endsection
