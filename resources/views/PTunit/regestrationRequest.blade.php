@extends('PTunit.mainPage')

@section('content-training')
<div class="content">
@foreach($company as $company)
<img src="{{  asset('storage/images/'.$company->logoImage)  }}" alt="Company logo" width="15%" hight="15%">
    <div class=" requset-details">
    <a class="btn btn-outline-success" href="{{ route('accept',[$company->id]) }}">Accept</a>
       <form action="{{ route('reject',[$company->id]) }}" method="POST" style="margin-top:-50%; margin-left:110%;">
        @csrf
    <button class="btn btn-outline-danger show_confirm" >Reject</button>
</form>
    </div>
    <h3 class="spashlist">{{$company->orgnizationName}}</h3>
    <br><br><hr>
    <strong style="font-size: 150%;">Employee Information</strong> <hr>  
        <span style="color: #106a6a;" clase="comp-info" id="Employee-full-name"> <strong style="font-size: 100%; color: #000404;" class="info">Employee full name:</strong> &nbsp;  {{$company->SupervisorName}}</span><br><br>
    <span style="color: #106a6a;" clase="comp-info" id="Employee-full-name"> <strong style="font-size: 100%; color: #000404;" class="info">Employee Email:</strong> &nbsp;  {{$company->SupervisorEmail}}</span><br><br>
    <span style="color: #106a6a;"  clase="comp-info" id="Employee-mobile-number"> <strong style="font-size: 100%; color: #000404;" class="info"> Employee mobile number:</strong>&nbsp;    {{$company->SupervisorPhone}}</span><br><br>
    <hr><strong style="font-size: 150%;">Company Information</strong> <hr><br>
    <span style="color: #106a6a;" clase="comp-info" id="Email">  <strong style="font-size: 100%; color: #000404;" class="info">Email:</strong> &nbsp;  {{$company->orgnizationEmail}}</span> <br><br>
    <span style="color: #106a6a;"  clase="comp-info" id="Website"><strong style="font-size: 100%; color: #000404;" class="info">Website:</strong> &nbsp;   {{$company->website}}</span> <br><br>
    <span style="color: #106a6a;"  id="Registration-number"><strong style="font-size: 100%; color: #000404;" class="info">Registration number:  </strong> &nbsp;  {{$company->Registration}}</span><br><br>
    <span style="color: #106a6a;" id="Office-phone-number"> <strong style="font-size: 100%; color: #000404;" class="info"> Office phone number:</strong> &nbsp;   {{$company->OrganizationPhone}}</span><br><br>
    <span style="color: #106a6a;"  clase="comp-info" id="Employee-mobile-number"> <strong style="font-size: 100%; color: #000404;" class="info"> Fax:</strong>&nbsp;    {{$company->SupervisorFax}}</span><br><br>
    <span style="color: #106a6a;" clase="comp-info" id="City"><strong style="font-size: 100%; color: #000404;" class="info">City:</strong>  &nbsp;   {{$company->country}}</span> <br><br>
    <span style="color: #106a6a;" clase="comp-info" id="City"><strong style="font-size: 100%; color: #000404;" class="info">City:</strong>  &nbsp;   {{$company->Address}}</span> <br><br>
    <span style="color: #106a6a;" clase="comp-info" id="brief-description-about-the-company"><strong style="font-size: 100%; color: #000404;" class="info">Brief description bout the company:</strong> &nbsp;  {{$company->description}}</span><br> <br>
    @endforeach 
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
</div>

@endsection