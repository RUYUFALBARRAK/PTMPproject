@extends('company.mainPage')

@section('content-training')
<div class="content">
  <form type="get" action="{{url('/searchTraineeRequest')}}">
<div class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search for trainee by name or opportunity..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark"  >Search</button>
</div>
</form>

<hr>
@if( count($traineesResult) == 0)  <!-- in case for no review -->
<div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Trainee Request Found</p>
    </div>
@else
<hr>

<table class="list-of-company">
    <tr>
        <th style="padding-left:4%; text-align: left;">Name </th>
        <th>Opportunities</th>
        <th style="text-align: right; padding-right:9%;"></th>
     </tr>
     @foreach($traineesResult as $trainee)
     <tr>
    <td>{{$trainee->name}}</td>
    <td style="font-size: 16px;"> {{$trainee->jobTitle}} </td>
    <td>
    

    <a href="{{ route('detailsForCompany',[$trainee->trainee_id]) }}"><span class="	fa fa-chevron-right"></span></a>
    </td>
  </tr>
@endforeach
  
</table> 
@endif  

</div>
@endsection