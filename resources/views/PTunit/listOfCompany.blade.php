@extends('trainee.mainPage')

@section('content-training')
<div class="content">
<div style="width:50%" class="input-group">
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-dark">search</button>
</div>
<div class="form-group col-md-2 state-menu">
      <select id="inputState" class="form-select ">
        <option selected>Status..</option>
        <option>accepted</option>
        <option>need modification</option>
        <option>rejected</option>
      </select>
    </div>
<hr>
<table class="list-of-company">
    <tr>
        <th style="padding-left:4%; text-align: left;">Company name </th>
        <th>logo</th>
        <th style="text-align: right; padding-right:8%;">Delete</th>
     </tr>
  <tr class="company1">
    <td>Advanced Electronics</td>
    <td><img src="img/SDAIA.png" alt="Company logo"  class= "logoCompany"> </td>
    <td>
    <button type="button"  class="btn btn-outline-danger delet-btn">Delete</button>
    <span class="	fa fa-chevron-right"></span>
    </td>
  </tr>
</table>    
</div>

@endsection