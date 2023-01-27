@extends('PTunit.mainPage')

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
    </div>

</div>

<div class="content" style="margin-bottom:-10%;">

    <p class="hed-de">Identfaction letter Request</p>
    <hr> <br>

    <div style="margin-left:5%;"> <b> Regulation: </b> </div>
    <br>
    <div style="margin-left:5%;"> <b> Uploaded File: </b> </div>

    <br><br>

    <div style="margin-left:45%;">
    <button type="button" style="display:none;" class="letter-btn"> Submit </button>
      <button type="button" class="letter-btn"><i class="fa fa-upload"></i> Upload </button>
</div>


    </div>

</div>

</div>


@endsection