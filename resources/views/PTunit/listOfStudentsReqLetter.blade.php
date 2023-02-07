@extends('PTunit.mainPage')

@section('content-training')
<div class="content">
  <form method="GET" action="{{url('/searchlistOfStudentsReqLetter')}}">

<div style="width:100%" class="input-group">

  <input type="search" name="query"  class="form-control rounded" placeholder="Search for trainee by name or ID..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark" >search</button>




</div>
</form>
<!--
<div class="form-group col-md-2 state-menu" style="margin-right:40px;">
<span class="glyphicon glyphicon-record" style="color:red; padding-top:25px;"></span>
  <span class="req-icon-caption">Identification letter</span><p>requests</p>

</div>-->

<hr>
@if(count($users) == 0)
      <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Trainee Found</p>
    </div>
    @else
<table class="list-of-company">
    <tr>

        <th style="padding-left:4%; text-align: left;">Name </th>
        <th>ID</th>

        <th style= "text-align: right; padding-right:4%;" >status</th>

        <th></th>

     </tr>

    @foreach($users as $user)
  <tr>

    <td>{{$user->name}}</td>
    <td style="font-size: 14px;"> {{$user->trainee_id}} </td>
    <td style="font-size: 14px;"> {{$user->status}} </td>
    <td>
        <a href="{{route('LetterRequest',['id'=> $user->trainee_id])}}">
            <span class="	fa fa-chevron-right"></span>
        </a>
    </td>
  </tr>
    @endforeach

</table>
@endif
</div>
@endsection
