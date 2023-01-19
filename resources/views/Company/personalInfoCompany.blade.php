@extends('company.mainPage')

@section('content-training')

<div class='content'>



<img src="{{ asset( $company->logoImage ? $company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" class="logoCompany">
    <h3 class="spashlistB">{{ $company->orgnizationName }}</h3>
    <br><br>
    
    <hr>
    <a href="{{ route('company.edit' , $company->id) }}" class="btn-save" style="width:8%; font-size:100%; margin-left: 85%; margin-top:1%; margin-bottom:-2%; text-decoration:none; color:white;">  
      Edit
    </a>
 <div class="parentB">

  <div class="childB" style=" margin-left:6%;">
    
    <p> 
     <label> <b> Registration number:</b> </label>
     <label> {{ $company->Registration}} </label>
    </p>

    <br><br>

    <p>
     <label><b> Employee full name:</b></label>
     <label>{{ $company->SupervisorName }} </label>
    </p>

    <br><br>


    <p>
     <label><b> Email:</b> </label>
     <label>{{ $company->orgnizationEmail }}</label>
    </p>


    <br><br>

    <p>
     <label><b>brief description about the company:</b></label><br>
     <label>{{ $company->description }}</label>
    </p>


    </div>



    <div class="childB">

    <p>
     <label><b>Office phone number:</b> </label>
     <label>{{ $company->OrganizationPhone }}</label>
    </p>

    <br><br>

    <p>
     <label><b> Employee mobile number:</b></label>
     <label>{{ $company->SupervisorPhone }}</label>
    </p>

    <br><br>

    <p>
     <label><b>Website:</b></label>
     <label>{{ $company->website }}</label>
    </p>

    <br><br>

    <p>
     <label><b>City:</b></label>
     <label>{{ $company->Address }}</label>
    </p>
 
  </div>

 </div>

  

</div>
 

@endsection