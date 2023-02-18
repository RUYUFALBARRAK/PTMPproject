@extends('trainee.mainPage')

@section('content-training')
<h1>Curriculum Vitae (CV)</h1>
<div class="content-CV-Personal-Information">
<strong style="font-size: 150%;">Personal Information</strong><hr>
<strong style="font-size: 100%;">name:</strong><span id="name"> &nbsp;{{$loginIdUser->name}}</span><br><br>
<strong style="font-size: 100%;">Email:</strong><span id="email"> &nbsp;{{$loginIdUser->email}}</span><br><br>
<strong style="font-size: 100%;">Mobile:</strong><span id="mobile"> &nbsp;{{$loginIdUser->phone}}</span><br><br>
<strong style="font-size: 100%;">Major:</strong><span id="major"> &nbsp;{{$loginIdUser->major}}</span><br><br>
<strong style="font-size: 100%;">GPA:</strong><span id="gpa"> &nbsp;{{$loginIdUser->GPA}}</span> <br><br>
</div>
<!--skills-->

<div class="content-CV">
    <strong style="font-size: 130%;">skills</strong><span> Enter your skills saparated with comma(,)</span><hr>
 @foreach($skills as $skills)
    <span class="btn btn-outline-secondary"> <a style="text-decoration: none;color: #000;"  href="{{ route('deleteskills', [$skills->id] ) }}"><i class="fa fa-times"></i> </a> &nbsp;{{$skills->skills}}</span>
@endforeach
<br><br>
    <div class="textField">
        <form action="{{ route('addSkill') }}" method="post">
        @csrf
        <input type="text" class="form-control @error('skills') is-invalid @enderror" name="skills"  placeholder="E.g, adabtaple, team work, etc." >
        <button type="submit" hidden></button>
        @if ($errors->has('skills'))
        <span class="text-danger">{{ $errors->first('skills') }}</span>
        @endif
       </form>
    </div>
</div>
<!--langugers-->
<div class="content-CV">
    <strong style="font-size: 130%;">Languages</strong><span>   Enter your languages saparated with comma(,)</span><hr>
     @foreach($Languages as $Languages)
    <span class="btn btn-outline-secondary"><a style="text-decoration: none;color: #000;"  href="{{ route('deleteLanguages', [$Languages->id] ) }}"><i class="fa fa-times"></i></a>&nbsp;{{$Languages->languages}}</span>
    @endforeach
    <br><br>
    <div class="textField">
        <form action="{{ route('addLanguages') }}" method="post">
        @csrf
        <input type="text" class="form-control @error('Languages') is-invalid @enderror" name="Languages" id="validationTooltip01" placeholder="E.g, Arabic, English, etc." required>
        @if ($errors->has('Languages'))
        <span class="text-danger">{{ $errors->first('Languages') }}</span>
        @endif
        </form> 
    </div>
</div>
<!--Interests-->
<div class="content-CV">
<strong style="font-size: 130%;">Interests</strong><span> Enter your interests saparated with comma(,)</span><hr>
     @foreach($Interests as $Interests)
    <span class="btn btn-outline-secondary"><a style="text-decoration: none;color: #000;" href="{{ route('deleteInterests', [$Interests->id] ) }}"><i class="fa fa-times"></i></a>&nbsp;{{$Interests->interests}}</span>
    @endforeach
    <br><br>
    <div class="textField">
        <form action="{{ route('addInterests') }}" method="post">
        @csrf
        <input type="text" class="form-control @error('Interests') is-invalid @enderror" name="Interests" id="validationTooltip01" placeholder="E.g, Marketing, Learning languages, etc." required>
        @if ($errors->has('Interests'))
        <span class="text-danger">{{ $errors->first('Interests') }}</span>
        @endif
        </form> 
    </div>
</div>
<!--Experience-->
<div class= "content-CV">
<strong style="font-size: 130%;">Experience</strong><hr>
     @foreach($Experience as $Experience)
    <span class="btn btn-outline-secondary"><a style="text-decoration: none;color: #000;"  href="{{ route('deleteExperience', [$Experience->id] ) }}"><i class="fa fa-times"></i></a>&nbsp;{{$Experience->Experience}}</span>
    @endforeach
    <br><br>
    <div class="textField">
        <form action="{{ route('addExperience') }}" method="post">
        @csrf
        <input type="text" class="form-control @error('experience') is-invalid @enderror" name="Experience" id="validationTooltip01" placeholder="E.g, adabtaple, team work, etc." required>
        @if ($errors->has('Experience'))
        <span class="text-danger">{{ $errors->first('Experience') }}</span>
        @endif
         </form>
    </div>

</div>
<!--Upload Certification-->
<div class="content-CV">
<strong style="font-size: 110%;">Upload Certification and academic transcript and CV files</strong><hr>
<strong style="font-size: 100%;">Upload file: </strong><p id="file-uploded"></p>

<table style="width:100%" class="Progress-report">
  <tr>
    <td>certifaction File<div style="color: #808080" id="EffectiveDateNoticeName"></div></td>
     <td>
  @if($certifactionFile)
      <a style="color: #000; font-size: 1.3vw;" href="{{ $doccertifactionFile->document }}">view submitted</a>
   @else
     <form action="{{ route('uploadfileOfCv') }}" enctype="multipart/form-data" method="post">
      @csrf
      <input type="file" id="EffectiveDateNotice" name="certifactionFile" onchange="thisFileUploadEffectiveDateNotice(this);" style="display:none;"/>
     <button type="button" onclick="thisFileUploadEffectiveDateNotice();" class="btn btn-outline-secondary EffectiveDateNotice"><i class="fa fa-upload"></i> </button>
     </form>
    @endif
    </td>
  </tr>
  <tr>
    <td>Acdamic File<div style="color: #808080" id="reportName"></div></td>
    <td>

    @if($acdamicFile)
      <a style="color: #000;font-size: 1.3vw;" href="{{  $docacdamicFile->document  }}">view submitted</a>
    @else
  <form action="{{ route('uploadfileOfCv') }}" enctype="multipart/form-data" method="post">
    @csrf
        <input type="file" id="report" style="display:none;" name="acdamicFile" onchange="thisFileUploadReport(this);" />
  <button type="button" onclick="thisFileUploadReport();" class="btn btn-outline-secondary Report"><i class="fa fa-upload"></i> </button>

</form>
@endif

</td>
  </tr>
  <tr>
    <td>CV File<div style="color: #808080" id="Training-SurveyName"></div></td>
    <td>

    @if($identificationLetter)
      <a style="color: #000; font-size: 1.3vw;" href="{{$docidentificationLetter->getDocumentURL()}}">view submitted</a>
    @else
      <form action="{{ route('uploadfileOfCv') }}"  enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" id="Training-Survey" style="display:none;"  name="identificationLetter" onchange="thisFileUploadTrainingSurvey(this);"/>
      <button type="button" onclick="thisFileUploadTrainingSurvey();" class="btn btn-outline-secondary TrainingSurvey"><i class="fa fa-upload"></i> </button>
    </form>
    @endif
    </td>
  </tr>
</table>

    
</div>


@endsection