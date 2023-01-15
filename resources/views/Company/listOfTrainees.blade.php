@extends('company.mainPage')

@section('content-training')
<div class="content">
<form method="GET" action="{{url('/searchlistOfTraineesCompany')}}">

<div class="input-group">
  <input type="search" class="form-control rounded" name="query"placeholder="Search for trainee by name or ID..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">Search</button>
</form>
</div>
<hr>
@if(count($trainee) == 0)
      <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Trainee Found</p>
    </div>
    @else
<table class="list-of-company">
    <tr>
        <th style="padding-left:4%; text-align: left;">Name </th>
        <th>Opportunities</th>
        <th style="text-align: right; padding-right:9%;"></th>
     </tr>
     @foreach($trainee as $student)
  <tr>
    <td>{{$student->name}}</td>
    <td style="font-size: 14px;"> {{$student->jobTitle}} </td>
    <td>
    
    <a href="traineeDetails"><span class="	fa fa-chevron-right"></span></a>
    </td>
  </tr>
@endforeach
</table> 
@endif     
</div>
@endsection