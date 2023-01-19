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

    <div class="info-sec" style="margin-left:25%;" >
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
    <p> <b> Skills:&nbsp; </b> {{$skill}} </p><br>
    <p> <b> Languages:&nbsp; </b> {{$language}} </p><br>
    <p> <b> Interests :&nbsp; </b> {{$interest}} </p> <br>
    <p> <b> Experience:&nbsp; </b> {{$experience}} </p> <br>
    <p> <b> Uploaded Files:&nbsp; </b> </p>
    <div class="uploaded-files" style="margin-right:-32%; margin-top:2%; margin-bottom:2%;"> <a href=""> <img src="{{asset('img/file-download.png')}}" alt="File Icon" width="17%" height="17%" style="margin-bottom:1%; margin-left:5%;"> <p style="width:24%; text-align: center; ">identification letter.pdf</p> </a> </div>

    </div>


<form action="{{ route('action',[$trainee->trainee_id]) }}" method="POST">
        @csrf
    <button type="submit" name="status" value="accept" class="acc-but"> Accept </button>
    <button type="submit" name="status" value="reject" class="reject-but"> Reject  </button>
    </div>
</form>

</div>

<div>

</div>


@endsection