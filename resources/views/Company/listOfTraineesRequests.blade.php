@extends('company.mainPage')

@section('content-training')
<div class="content">
  <form method="GET" action="{{url('/searchTraineeRequest')}}">
<div class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search for trainee by name or major..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">Search</button>
</div>
</form>



@if( count($trainee) == 0)  <!-- in case for no review -->
<br> <br><br>
<hr style="margin-top: -20px; margin-bottom: 35px;">
<div class="noReviews"> No trainee request </div>
@else
<hr>

<table class="list-of-company">
    <tr>
        <th style="padding-left:4%; text-align: left;">Name </th>
        <th>Opportunities</th>
        <th style="text-align: right; padding-right:9%;"></th>
     </tr>
     @foreach($trainee as $trainee)
     <tr>
    <td>{{$trainee->name}}</td>
    <td style="font-size: 16px;"> {{$trainee->Major}} </td>
    <td>
    
    <span class="glyphicon glyphicon-triangle-right"></span>
    </td>
  </tr>
@endforeach
  
</table> 
@endif  

</div>
@endsection