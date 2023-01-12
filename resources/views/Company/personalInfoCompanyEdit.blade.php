@extends('company.mainPage')

@section('content-training')

<div class='content'>

    <img src="{{ asset('img/SDAIA.png') }}" alt="Company logo" class="logoCompany">
    <h3 class="spashlistB">SDAIA (Saudi Data & AL Authority)</h3>
    <br><br>
    
    <hr>

    <div class="parentB">
      {{-- <form action="{{ route('company.update', $company->id) }}" method="POST"> --}}
          <div class="childB" style=" margin-left:6%;">
      
            <p>
            <label> <b>Registration number:</b> </label>
            <input type="text" class="form-control" id="comRegNum" name="comRegNum" value="{{ $company->id }}">
            @if ($errors->has('website'))
            <span class="text-danger">{{ $errors->first('website') }}</span>
            @endif
            </p>
      
            <br><br>
      
      
            <p>
            <label><b> Employee full name:</b> </label>
            <input type="text" class="form-control" id="comEmpName" name="comEmpName" value="{{ $company->SupervisorName }}">
            </p>
      
            <br><br>
      
      
            <p>
            <label class="d-block"><b> Email:</b></label>
            <input type="email" class="form-control" id="comEmail" name="comEmail" value="{{ $company->orgnizationEmail }}">
            </p>
          
          
            <br><br>
      
            <p>
            <label> <b> brief description about the company:</b> </label>
            <textarea type="text" class="form-control" id="comDes" name="comDes" placeholder="description" rows="5" cols="35">
              {{ $company->description }}
            </textarea>
            </p>
      
      
          </div>
          <div class="childB">
      
            <p>
            <label> <b> Office phone number:</b> </label>
            <input type="text" class="form-control" id="comOfficeNum" name="comOfficeNum" value="{{ $company->OrganizationPhone }}">
            </p>
      
            <br><br>
      
      
            <p>
              <label> <b> Employee mobile number: </b> </label>
              <input type="text" class="form-control" id="comMobileNum" name="comMobileNum" value="{{ $company->SupervisorPhone }}">
            </p>
      
            <br><br>
      
      
            <p>
            <label class="d-block"> <b> Website:</b> </label> 
            <input type="text" class="form-control" id="comWebsite" name="comWebsite" value="{{ $company->website }}">
            </p>
      
          
            <br><br>
      
            <p>
            <label class="d-block"> <b> City:</b> </label>
            <input type="text" class="form-control" id="comCity" name="comCity" value="{{ $company->Address }}">
            </p>
      
      
      
          </div>
      
        <button type="submit" class="btn-save"  style="width:15%; margin-left: 78%; margin-top:5%">Save</button>
      
      {{-- </form> --}}
    </div>

</div>
@endsection

 