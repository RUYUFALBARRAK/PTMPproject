@extends('PTunit.mainPage')

@section('content-training')
<div class="content">
@if(Session::has('popupNO'))
  <div class="alert alert-danger">{{Session::get('popupNO')}}</div>
@endif

  <form method="GET" action="{{url('/searchlistOfCompany')}}">

<div class="input-group">
  <input type="search" class="form-control "  name= "query" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">search</button>
</div>

  </form><br>
  @if(count($company) == 0)
      <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Company Found</p>
    </div>
  @else

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Company name</th>
      <th scope="col">Logo</th>
      <th scope="col">Delete</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($company as $company)
  <tr>
    <td style="padding-top:25px;">{{$company->orgnizationName}}</td>
    <td><img src="{{asset('storage/images/'. $company->logoImage)}}" alt="Company logo"  class= "logoCompany"> </td>
    <td style="padding-top:22px;">
                     <form method="POST" action="{{ route('deleteCompanyPTunit',[$company->id]) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" id="delete" data-toggle="tooltip" title='Delete'  class="btn btn-outline-danger show_confirm">Delete</button>
                        </form>
    
    </td>
   <td style="padding-top:30px;"> <a href="{{ route('CompanyDetails',[$company->id]) }}"><span class="	fa fa-chevron-right"></span></a></td>
  </tr>
  @endforeach
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `This company may have an opportunity do you want to delete it?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              className: "myClass"
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("The comapny has been deleted!", {
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