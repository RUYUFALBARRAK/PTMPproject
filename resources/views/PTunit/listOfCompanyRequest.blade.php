@extends('trainee.mainPage')

@section('content-training')
<div class="content">
<div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-dark">search</button>
</div>
<hr>
<table class="list-of-company">
    <tr>
        <th style="padding-left:4%; text-align: left;">Company name </th>
        <th>logo</th>
        <th style="text-align: right; padding-right:9%;">accept/reject</th>
     </tr>
  <tr>
    <td>Advanced Electronics</td>
    <td><img src="img/SDAIA.png" alt="Company logo"  class= "logoCompany">  </td>
    <td>
    <div class="btn-group">
    <button type="button" class="btn btn-outline-success">Accept </button>
    <button type="button" class="btn btn-outline-danger">Decline </button>
    </div>
    <span class="glyphicon glyphicon-triangle-right"></span>
    </td>
  </tr>
</table>    
</div>
@endsection