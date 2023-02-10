@extends('PTunit.mainPage')

@section('content-training')
<div class="content">

 <form method="GET" action="{{url('/searchlistOfCompanyRequest')}}">
<div class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">search</button>
</div>
</form>
<br>
  @if(count($companyRequest) == 0)
      <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Company Request Found</p>
    </div>
  @else

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Company name</th>
      <th scope="col">Logo</th>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   @foreach($companyRequest as $company)
  <tr>
    <td style="padding-top:30px;">{{$company->orgnizationName}}</td>
    <td><img src="{{asset('storage/images/'. $company->logoImage)}}" alt="Company logo"  class= "logoCompany">  </td>
 
    <td style="padding-top:25px;">
    <a class="btn btn-outline-success" href="{{ route('accept',[$company->id]) }}">Accept</a>
    </td>
    <td style="padding-top:25px;">
    <form action="{{ route('reject',[$company->id]) }}" method="POST">
        @csrf
    <button class="btn btn-outline-danger show_confirm" >Reject</button>
</form>
    </td>
    <td style="padding-top:30px;">
    <a href="{{ route('regestrationRequest',[$company->id]) }}"><span class="fa fa-chevron-right"></span></a>
    </td>
  </tr>
@endforeach
 </tbody>
    <script>
 $('.show_confirm').click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `The Company will be rejected`,
        text: "If you reject this, you can not undo this process.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("The comapny has been rejected!", {
                    icon: "success",
                });
                form.submit();
            }
        });
});

  
</script>
</table> 
@endif
</div>
@endsection