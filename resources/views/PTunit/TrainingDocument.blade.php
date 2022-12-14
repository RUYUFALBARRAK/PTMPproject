<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<div class="content">
<h1>Uplouded document</h1> 
<table>
    <tr>
        <th class ="fist-column">File name</th>
        <th>Date of added</th>
        <th>For</th>
        <th>Delete</th>
    </tr>
    <tr>
        <td class ="fist-column"><a href=# >AttendanceDocument.docx </a></td>
        <td>20/10/2022</td>
        <td>Company</td>
        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column"><a href=# >FollowupDocument.docx </a></td>
        <td>25/10/2022</td>
        <td>Company</td>
        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column"><a href=# >EvaluationDocument.docx </a></td>
        <td>25/10/2022</td>
        <td>Company</td>
        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column"><a href=# >EmployeeFeedback.docx </a></td>
        <td>25/10/2022</td>
        <td>Company</td>
        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column"><a href=# >Trainee survey.docx </a></td>
        <td>27/10/2022</td>
        <td>Student</td>
        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column"><a href=# >EffectiveDateNotice.docx </a></td>
        <td>27/10/2022</td>
        <td>Student</td>
        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
</table>
<hr>
<a href="#" class="link2">Upload new file:<span class="glyphicon glyphicon-upload"></span></a>

</div>
@endsection
