<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<div class="content">
<table class="table-balqees">
    <tr>
        <th style="text-align: center;" class="th-khawlah">Identification letter</th> <th class="th-khawlah"></th>
    </tr>
    <tr>
        <td class="fist-col-khawlah td-khawlah"><button type="button" class="Identification-req-but" > Requst identification letter </button>
</td>

<td  style="text-align: center;" class="td-balqees-link"> <a href="#" style="color:grey">View Identification letter<a> <a href=<span class="fa fa-download"></span></td>
  
    </tr>
    <tr>
        <td class ="fist-col-khawlah td-balqees">uploaded file:</td>
        <td style="text-align: center;" class="td-balqees-link"> <a href="#" >Upload Identification letter<a> <a href=<span class="fa fa-upload" style="font-size:16px;"></span></td>
</td>

    </tr>
    <tr>
    <td class ="fist-col-khawlah td-balqees"></td>
    <td class=" td-balqees"><button type="button" class="Identification-req-but" > Submit </button></td>
</tr>


</table>
</div>
@endsection