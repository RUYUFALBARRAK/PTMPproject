@extends('PTunit.mainPage')

@section('content-training')

<div class="content" style="margin-bottom:-10%;">
<p class="hed-de">Trainee Information</p>
<hr>
<br>
@if(Session::has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
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

</div>

<div class="content" style="margin-bottom:-10%;">

    <p class="hed-de">Identfaction letter Request</p>
    <hr> <br>

    <div style="margin-left:5%;"> <b> Regulation:
            @if($regulation)
                <a href="{{url($regulation)}}" target="_blank">Link</a>
            @endif</b> </div>
    <br>
    <div style="margin-left:5%;"> <b> Uploaded File:
            @if($regulationToTrainee)
                <a href="{{url($regulationToTrainee)}}" target="_blank">Link</a>
            @endif</b> </div>
    <br><br>

    <div style="margin-left:45%;">
    <form method="post" action="{{route('uploadRegulationToTrainee')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" id="uploadedFileInput" name="uploadedFileInput" style="display: none">
            <button type="submit" style="display:none;" class="letter-btn" id="submit_button"> Submit </button>
            <p type="submit" id="p-filename"></p>
        </form>

      <label class="btn btn-success letter-btn" id="upload_button" for="uploadedFileInput">
          <i class="fa fa-upload"></i> Upload </label>
</div>


    </div>

</div>

</div>

<script>
    $('#uploadedFileInput').change(function() {
        var file = $('#uploadedFileInput')[0].files[0].name;
        $('#p-filename').text("uploaded file: "+file);
        $('#upload_button').css('display','none')
        $('#submit_button').css('display','block')
    });
</script>
@endsection
