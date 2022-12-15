<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<div class="content">
<table class="table-balqees">
    <tr>
        <th class="th-khawlah">Identification letter</th> <th class="th-khawlah"></th>
    </tr>
    <tr>
        <td class="fist-col-khawlah td-balqees"><button type="button" class="Identification-req-but" > Requst identification letter </button>
</td>

<td class="td-balqees-link"> <a href="#">View Identification letter<a> <a href=<span class="glyphicon glyphicon-download-alt"></span></td>
  
    </tr>
    <tr>
        <td class ="fist-col-khawlah td-balqees">uploaded file:</td>
        <td class="td-balqees"><button style="font-size:15px" class="btn btn-outline-secondary" ><i class="glyphicon glyphicon-open"></i> upload file</button></td>

    </tr>
    <tr>
    <td class ="fist-col-khawlah td-balqees"></td>
    <td class=" td-balqees"><button type="button" class="Identification-req-but" > Submit </button>
</tr>


</table>
</div>
@endsection