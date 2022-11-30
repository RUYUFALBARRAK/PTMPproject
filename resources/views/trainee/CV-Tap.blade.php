@extends('trainee.mainPage')

@section('content-training')
<h1>Curriculum Vitae (CV)</h1>
<div class="content-CV-Personal-Information">
<strong style="font-size: 200%;">Personal Information</strong><hr>
<strong style="font-size: 130%;">name:</strong><p id="name"></p>
<strong style="font-size: 130%;">Email:</strong><p id="email"></p>
<strong style="font-size: 130%;">Mobile:</strong><p id="mobile"></p>
<strong style="font-size: 130%;">Major:</strong><p id="major"></p>
<strong style="font-size: 130%;">GPA:</strong><p id="gpa"></p> 
</div>
<!--skills-->

<div class="content-CV">
    <strong style="font-size: 200%;">skills</strong><span> Enter your skills saparated with comma(,)</span><hr>
    <p class="btn btn-outline-secondary"><i class="glyphicon glyphicon-remove"></i> fast learning</p>
    <div class="textField">
        <label for="validationTooltip01" class="form-label"></label>
        <input type="text" class="form-control" id="validationTooltip01" placeholder="E.g, adabtaple, team work, etc." required>
    </div>
</div>
<!--langugers-->
<div class="content-CV">
    <strong style="font-size: 200%;">Languages</strong><span>   Enter your languages saparated with comma(,)</span><hr>
    <p class="btn btn-outline-secondary"><i class="glyphicon glyphicon-remove"></i> Arabic</p>
    <div class="textField">
        <label for="validationTooltip01" class="form-label"></label>
        <input type="text" class="form-control" id="validationTooltip01" placeholder="E.g, Arabic, English, etc." required>
    </div>
</div>
<!--Interests-->
<div class="content-CV">
<strong style="font-size: 200%;">Interests</strong><span> Enter your interests saparated with comma(,)</span><hr>
    <p class="btn btn-outline-secondary"><i class="glyphicon glyphicon-remove"></i> Podcasting</p>
    <div class="textField">
        <label for="validationTooltip01" class="form-label"></label>
        <input type="text" class="form-control" id="validationTooltip01" placeholder="E.g, Marketing, Learning languages, etc." required>
    </div>
</div>
<!--Experience-->
<div class= "content-CV">
<strong style="font-size: 200%;">Experience</strong><hr>
    <p class="btn"></p>
    <div class="textField">
        <label for="validationTooltip01" class="form-label"></label>
        <input type="text" class="form-control" id="validationTooltip01" placeholder="E.g, adabtaple, team work, etc." required>
    </div>

</div>
<!--Upload Certification-->
<div class="content-CV">
<strong style="font-size: 150%;">Upload Certification and academic transcript and identification letterence</strong><hr>
<strong style="font-size: 130%;">File uploaded:</strong><p id="file-uploded"></p>
<button style="font-size:15px" class="btn btn-outline-secondary" ><i class="glyphicon glyphicon-open"></i> upload file</button>
    
</div>
<button type="button" class="btn-save">Save</button>

@endsection