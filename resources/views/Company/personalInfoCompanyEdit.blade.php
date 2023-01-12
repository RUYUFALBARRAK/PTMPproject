@extends('company.mainPage')

@section('content-training')

<div class='content'>

    <img src="{{ asset('img/SDAIA.png') }}" alt="Company logo" class="logoCompany">
    <h3 class="spashlistB">SDAIA (Saudi Data & AL Authority)</h3>
    <br><br>
    
    <hr>

    <div class="parentB">
      <form action="{{ route('company.update', $company->id) }}" method="POST">
        @csrf
          <div class="childB" style=" margin-left:6%;">
          <p>
            <label> <b>Registration number:</b> </label>
            <input type="text" class="form-control" id="comRegNum" name="Registration" value="{{ $company->id }}">
            @if ($errors->has('Registration'))
            <span class="text-danger">{{ $errors->first('Registration') }}</span>
            @endif
          </p>
      
            <br><br>
      
      
          <p>
            <label><b> Employee full name:</b> </label>
            <input type="text" class="form-control" id="comEmpName" name="SupervisorName" value="{{ $company->SupervisorName }}">
            @if ($errors->has('SupervisorName'))
            <span class="text-danger">{{ $errors->first('SupervisorName') }}</span>
            @endif
          </p>
      
            <br><br>
      
          <p>
            <label class="d-block"><b> Email:</b></label>
            <input type="email" class="form-control" id="comEmail" name="orgnizationEmail" value="{{ $company->orgnizationEmail }}">
            @if ($errors->has('orgnizationEmail'))
            <span class="text-danger">{{ $errors->first('orgnizationEmail') }}</span>
            @endif
          </p>
          
          
            <br><br>
      
          <p>
            <label> <b> brief description about the company:</b> </label>
            <textarea type="text" class="form-control" id="comDes" name="description" placeholder="description" rows="5" cols="35">
              {{ $company->description }}
            </textarea>
            @if ($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
          </p>
      
      
          </div>
          <div class="childB">
      
          <p>
            <label> <b> Office phone number:</b> </label>
            <input type="text" class="form-control" id="comOfficeNum" name="OrganizationPhone" value="{{ $company->OrganizationPhone }}">
            @if ($errors->has('OrganizationPhone'))
            <span class="text-danger">{{ $errors->first('OrganizationPhone') }}</span>
            @endif
          </p>
      
            <br><br>
      
      
            <p>
              <label> <b> Employee mobile number: </b> </label>
              <input type="text" class="form-control" id="comMobileNum" name="SupervisorPhone" value="{{ $company->SupervisorPhone }}">
              @if ($errors->has('SupervisorPhone'))
              <span class="text-danger">{{ $errors->first('SupervisorPhone') }}</span>
              @endif
            </p>
      
            <br><br>
      
      
          <p>
            <label class="d-block"> <b> Website:</b> </label> 
            <input type="text" class="form-control" id="comWebsite" name="website" value="{{ $company->website }}">
            @if ($errors->has('website'))
            <span class="text-danger">{{ $errors->first('website') }}</span>
            @endif
          </p>
      
          
            <br><br>
      
          <p>
            <label class="d-block"> <b> City:</b> </label>
            <input type="text" class="form-control" id="comCity" name="Address" value="{{ $company->Address }}">
            @if ($errors->has('Address'))
            <span class="text-danger">{{ $errors->first('Address') }}</span>
            @endif
          </p>
      
      
      
          </div>
      
        <button type="submit" class="btn-save"  style="width:15%; margin-left: 78%; margin-top:5%">Save</button>
      
      </form>
    </div>

</div>
@endsection

 