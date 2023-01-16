@extends('PTunit.mainPage')

@section('content-training')
<div class="content">
<form method="GET" action="{{url('/searchlistOfStudentsPTunit')}}">

<div class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search for trainee by name or ID..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">Search</button>
</div>
<hr>
@if(count($students) == 0)
      <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Trainee Found</p>
    </div>
    @else
<table class="list-of-company">
    <tr>
        <th style="padding-left:4%; text-align: left;">Name </th>
        <th>ID</th>

        <th style="text-align: right;padding-right:4%;">status</th>
        <th></th>

     </tr>
     @foreach($students as $student)

  <tr>
    <td>{{$student->name}}</td>
    <td style="font-size: 14px;"> {{$student->trainee_id}} </td>
    <td style="font-size: 14px;padding-right:3.5%; "> {{$student->status}} </td>
    <td style="padding-left:7%;">
    <a href="{{ route('detailsForUnit',[$student->trainee_id]) }}"><span class="	fa fa-chevron-right"></span></a>

    </td>
  </tr>
  @endforeach
</table>    
@endif
</div>
@endsection