@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">
<div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Search for trainee by name or ID..." aria-label="Search" aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-dark">Search</button>
</div>
<hr>
<table class="list-of-company">
    <tr>
        <th style="padding-left:4%; text-align: left;">Name </th>
        <th>ID</th>

        <th style="text-align: right; padding-right:9%;">status</th>
        <th></th>

     </tr>
  <tr>
    <td>sarah mohamad</td>
    <td style="font-size: 14px;"> 437200273 </td>
    <td style="font-size: 14px;"> Ongoing </td>
    <td>
    
    <span class="glyphicon glyphicon-triangle-right"></span>
    </td>
  </tr>
</table>    
</div>
@endsection