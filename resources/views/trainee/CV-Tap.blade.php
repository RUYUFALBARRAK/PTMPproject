@extends('trainee.mainPage')

@section('content-training')
<h1>Curriculum Vitae (CV)</h1>
<div class="content-CV-Personal-Information">
<strong style="font-size: 150%;">Personal Information</strong><hr>
<strong style="font-size: 100%;">name:</strong><span id="name"> &nbsp;{{$loginIdUser->name}}</span><br><br>
<strong style="font-size: 100%;">Email:</strong><span id="email"> &nbsp;{{$loginIdUser->email}}</span><br><br>
<strong style="font-size: 100%;">Mobile:</strong><span id="mobile"> &nbsp;{{$loginIdUser->phone}}</span><br><br>
<strong style="font-size: 100%;">Major:</strong><span id="major"> &nbsp;{{$loginIdUser->major}}</span><br><br>
<strong style="font-size: 100%;">GPA:</strong><span id="gpa"> &nbsp;{{$loginIdUser->status}}</span> <br><br>
</div>
<!--skills-->

<div class="content-CV">
    <strong style="font-size: 130%;">skills</strong><span> Enter your skills saparated with comma(,)</span><hr>
 
    <p class="btn btn-outline-secondary"><i class="fa fa-times"></i> fast learning</p>

    <div class="textField">
        <form action="{{ route('addSkill') }}" method="post">
        <input type="text" class="form-control" name="skills" id="validationTooltip01" placeholder="E.g, adabtaple, team work, etc." required>
       </form>
    </div>
</div>
<!--langugers-->
<div class="content-CV">
    <strong style="font-size: 130%;">Languages</strong><span>   Enter your languages saparated with comma(,)</span><hr>
    <p class="btn btn-outline-secondary"><i class="fa fa-times"></i> Arabic</p>
    <div class="textField">
        <form action="{{ route('addLanguages') }}" method="post">
        <input type="text" class="form-control" name="languages" id="validationTooltip01" placeholder="E.g, Arabic, English, etc." required>
        </form> 
    </div>
</div>
<!--Interests-->
<div class="content-CV">
<strong style="font-size: 130%;">Interests</strong><span> Enter your interests saparated with comma(,)</span><hr>
    <p class="btn btn-outline-secondary"><i class="fa fa-times"></i> Podcasting</p>
    <div class="textField">
        <form action="{{ route('addInterests') }}" method="post">
        <input type="text" class="form-control" name="interests" id="validationTooltip01" placeholder="E.g, Marketing, Learning languages, etc." required>
        </form> 
    </div>
</div>
<!--Experience-->
<div class= "content-CV">
<strong style="font-size: 130%;">Experience</strong><hr>
    <p class="btn"></p>
    <div class="textField">
        <form action="{{ route('addExperience') }}" method="post">
        <input type="text" class="form-control" name="experience" id="validationTooltip01" placeholder="E.g, adabtaple, team work, etc." required>
         </form>
    </div>

</div>
<!--Upload Certification-->
<div class="content-CV">
<strong style="font-size: 110%;">Upload Certification and academic transcript and identification letter</strong><hr>
<strong style="font-size: 100%;">File uploaded:</strong><p id="file-uploded"></p>
<button style="font-size:15px" name="uploadfile" class="btn btn-outline-secondary" ><i class="fa fa-download"></i> upload file</button>
    
</div>
<button type="button" class="btn-save">Save</button>

@endsection