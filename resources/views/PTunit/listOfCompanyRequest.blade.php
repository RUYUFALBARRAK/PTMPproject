@extends('PTunit.mainPage')

@section('content-training')
<div class="content">
    @if(count($companyRequest) == 0)
    <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Company Request Found</p>
    </div>
    @else
 <form method="GET" action="{{url('/searchlistOfCompanyRequest')}}">
<div class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">search</button>
</div>
</form>
<hr>
<table class="list-of-company">
  
    <tr>
        <th style="padding-left:4%; text-align: left;">Company name </th>
        <th>logo</th>
        <th style="text-align: right; padding-right:9%;">accept/reject</th>
     </tr>
   @foreach($companyRequest as $company)
  <tr>
    <td>{{$company->orgnizationName}}</td>
    <td><img src="{{asset('storage/images/'. $company->logoImage)}}" alt="Company logo"  class= "logoCompany">  </td>
    <td>
  <div class="btn-group">
    <a class="btn btn-outline-success" href="{{ route('accept',[$company->id]) }}">Accept</a>
    <a class="btn btn-outline-danger" href="{{ route('reject',[$company->id]) }}">Decline</a>
    </div>
    <a href="{{ route('regestrationRequest',[$company->id]) }}"><span class="fa fa-chevron-right"></span></a>
    </td>
  </tr>
@endforeach
</table> 
@endif
</div>
@endsection