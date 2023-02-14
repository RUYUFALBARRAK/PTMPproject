@extends('PTunit.mainPage')

@section('content-training')
<div class="content">
@if(Session::has('msgcompanyDelete'))
  <div class="alert alert-success">{{Session::get('msgcompanyDelete')}}</div>
@endif
  @if(count($companyResult) == 0)
      <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Company Found</p>
    </div>
  @else
  <form method="GET" action="{{url('/searchlistOfCompany')}}">
<div style="width:50%" class="input-group">
  <input type="search" class="form-control rounded" placeholder="Search" name= "query"aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">search</button>
</div>
</form>
<hr>
<table class="list-of-company">
    <tr>
        <th style="padding-left:4%; text-align: left;">Company name </th>
        <th>logo</th>
        <th style="text-align: right; padding-right:8%;">Delete</th>
     </tr>
  @foreach($companyResult as $company)
  <tr class="company1">
    <td>{{$company->orgnizationName}}</td>
    <td><img src="{{asset('storage/images/'. $company->logoImage)}}" alt="Company logo"  class= "logoCompany"> </td>
    <td>
    <a href="{{ route('deleteCompanyPTunit',[$company->id]) }}"> <button type="button"  class="btn btn-outline-danger delet-btn">Delete</button></a>
    <a href="{{ route('CompanyDetails',[$company->id]) }}"><span class="	fa fa-chevron-right"></span></a>
    </td>
  </tr>
  @endforeach
</table>
 @endif
</div>

@endsection
