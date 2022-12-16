@extends('PTunit.mainPage')


@section('content-training')
<div class="content">
<h1>Current Announcement</h1> 
<table class="table-balqees">
    <tr>
        <th class ="fist-column th-balqees">Announcement title  </th>
        <th class="th-balqees">Publish data</th>
        <th class="th-balqees">Modify</th>
        <th class="th-balqees">Delete</th>
    </tr>
    <tr>
        <td class ="fist-column td-balqees">dates of training  </td>
        <td class="td-balqees">25/10/2022</td>
        <td class="td-balqees"><button class="btn-modify" type="submit"> Modify </button></td>
        <td class="td-balqees"><button class="btn-delete" type="submit">Delete </button></td>
    </tr>
</table>
<br><br><br>
<form action = "addAnnouncement">
<button class="btn-Register" type="submit" >Add announcement </button>
</form>


</div>
@endsection
