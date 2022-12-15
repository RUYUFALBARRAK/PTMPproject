<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<div class="content">
<table class="table-balqees">
    <tr>
        <th class="th-balqees">Identification letter</th>
    </tr>
    <tr>
        <td class="fist-col td-balqees"><button type="button" class="Identification-req-but" > Requst identification letter </button>
</td>
<td class="td-balqees-link"> <a href="#">Vview Identification letter<a> </td>
        <td class="td-balqees"><a href=<span class="glyphicon glyphicon-download-alt"></span></a></td>
    </tr>
    <tr>
        <td class ="fist-col td-balqees">uploaded file:</td>
        <td class="td-balqees"><button style="font-size:15px" class="btn btn-outline-secondary" ><i class="glyphicon glyphicon-open"></i> upload file</button></td>

    </tr>
    <tr>
    <td class ="fist-col td-balqees"></td>
    <td class=" td-balqees"><button type="button" class="Identification-req-but" > Submit </button>
</tr>


</table>
</div>
@endsection