@extends('PTunit.mainPage')

@section('content-training')
<div class="content">
<div style="width:100%" class="input-group">

  <input type="search"  class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-dark" >search</button>
  <span class="glyphicon glyphicon-record" style="color:red;padding-left:30px; font-size:25px; "></span>
  <span class ="req-icon-caption" style="width:35%; padding-left:7px;font-weight:bold; font-size:16px;">Identification letter requests</span>
  


</div>
<!--
<div class="form-group col-md-2 state-menu" style="margin-right:40px;">
<span class="glyphicon glyphicon-record" style="color:red; padding-top:25px;"></span>
  <span class="req-icon-caption">Identification letter</span><p>requests</p>

</div>-->

<hr>
<table class="list-of-company">
    <tr>
       
        <th style="padding-left:4%; text-align: left;">Name </th>
        <th>ID</th>

        <th style= "text-align: right; padding-right:4%;" >status</th>
        <th></th>
        <th></th>

     </tr>
  <tr>

    <td>sarah mohamad</td>
    <td style="font-size: 14px;"> 437200273 </td>
    <td style="font-size: 14px;"> Ongoing </td>
    <td>
    
    <span class="glyphicon glyphicon-record"style="color:red;  font-size:25px; padding-left:8%;"></span>
    </td>
    <td>
    
    <span class="glyphicon glyphicon-triangle-right"></span>
    </td>
  </tr>
</table>    
</div>
@endsection