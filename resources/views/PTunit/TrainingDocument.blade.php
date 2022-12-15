<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<div class="content">
<h1>Uplouded document</h1> 
<table class="table-balqees">
    <tr>
        <th class ="fist-column th-balqees">File name</th>
        <th class="th-balqees">Date of added</th>
        <th class="th-balqees">For</th>
        <th class="th-balqees">Delete</th>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >AttendanceDocument.docx </a></td>
        <td class="td-balqees">20/10/2022</td>
        <td class="td-balqees">Company</td>
        <td class="td-balqees"><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >FollowupDocument.docx </a></td>
        <td class="td-balqees">25/10/2022</td>
        <td class="td-balqees">Company</td>
        <td class="td-balqees"><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >EvaluationDocument.docx </a></td>
        <td class="td-balqees">25/10/2022</td>
        <td class="td-balqees">Company</td>
        <td class="td-balqees"><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >EmployeeFeedback.docx </a></td>
        <td class="td-balqees">25/10/2022</td>
        <td class="td-balqees">Company</td>
        <td class="td-balqees"><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >Trainee survey.docx </a></td>
        <td class="td-balqees">27/10/2022</td>
        <td class="td-balqees">Student</td>
        <td class="td-balqees"><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >EffectiveDateNotice.docx </a></td>
        <td  class="td-balqees">27/10/2022</td>
        <td class="td-balqees">Student</td>
        <td class="td-balqees"><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
</table>
<br>
<!-- <a href="#" class="link2">Upload new file:<span class="glyphicon glyphicon-upload"></span></a> -->
<button class="btn-upload2" type="submit">Upload new file<span class="glyphicon glyphicon-upload"></span></button>

</div>
@endsection
