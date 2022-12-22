@extends('PTunit.mainPage')


@section('content-training')
<div class="content">
<h2>Uplouded document</h2> 
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
        <td class="td-balqees"><button type="button"  class="btn btn-outline-danger">Delete</button></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >FollowupDocument.docx </a></td>
        <td class="td-balqees">25/10/2022</td>
        <td class="td-balqees">Company</td>
        <td class="td-balqees"><button type="button"  class="btn btn-outline-danger">Delete</button></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >EvaluationDocument.docx </a></td>
        <td class="td-balqees">25/10/2022</td>
        <td class="td-balqees">Company</td>
        <td class="td-balqees"><button type="button"  class="btn btn-outline-danger">Delete</button></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >EmployeeFeedback.docx </a></td>
        <td class="td-balqees">25/10/2022</td>
        <td class="td-balqees">Company</td>
        <td class="td-balqees"><button type="button"  class="btn btn-outline-danger">Delete</button></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >Trainee survey.docx </a></td>
        <td class="td-balqees">27/10/2022</td>
        <td class="td-balqees">Student</td>
        <td class="td-balqees"><button type="button"  class="btn btn-outline-danger">Delete</button></td>
    </tr>
    <tr>
        <td class ="fist-column td-balqees"><a href=# >EffectiveDateNotice.docx </a></td>
        <td  class="td-balqees">27/10/2022</td>
        <td class="td-balqees">Student</td>
        <td class="td-balqees"><button type="button"  class="btn btn-outline-danger">Delete</button></td>
    </tr>
</table>
<br><br><hr>
<h3>Uploud new document</h3> <hr>
<div class="warp">
    <form action="" method="">
        <div class="form1"> 
        <input type="file" name="uploudedfile" class="PTuploadedfile" hidden>
        <i class="fas fa-cloud-upload-alt"></i>
         <p>Browse file to upload</p>
   </div> 
    <section class="prograss-area">
    <li class="row">
    <i class="fas fa-file-alt"></i>
        <div class="cont">
            <div class="detal">
                <span class="name">img</span>
                <span class="precent">50</span>
            </div>
            <div class="prog-bar">
                <div class="prog"></div>
            </div>
         </div>
        
    </li>
    </section>
    <section class="upload-area">
        <li class="row">
        <i class="fas fa-file-alt"></i>
            <div class="cont">
            <div class="detal">
                <span class="name">img</span>
                <span class="size">30KB</span>
            </div>
            </div><hr>
            <i class="fas fa-check"></i>
        </li>
     
    </section>
</div>
<div class="file-state">
<label for="validationTooltip01" class="form-label"> File uploaded for :* </label>
<div class="form-group col-md-2">
      <select id="inputState" class="form-select ">
        <option selected>For..</option>
        <option>company</option>
        <option>trainee</option>
        <option>both</option>
      </select>
    </div>
</div>
<!-- <a href="#" class="link2">Upload new file:<span class="glyphicon glyphicon-upload"></span></a> -->
<button class="add-but-center" type="submit">Upload new file</button>
</form>
</div>
@endsection
