@extends('company.mainPage')

@section('content-training')
<div class="content">

  <div class="input-group">

    <div style="width:20%" class="input-group">
    <h1>Opportunities</h1>
    </div>
  </div>

   
    <div class="form-group col-md-2 state-menu" style="margin-left:40%">
      <select id="inputLocationCompany" class="form-select">
        <option selected>Status..</option>
        <option>Accepted</option>
        <option>Rejected</option>
        <option>Pending</option>
        <option>Needs Modification</option>
        <option>All</option>
      </select>
    </div>


    
    <a href="{{ url('/addOppourtunityForCompany') }}" class="btn btn-primary" style="margin-left:75%; margin-top:-6%; font-size:140%; background-color: #388087;">Add training opportunity</a>
  



    <br><br>
<!-- New-->
    @if(count($opportunities) > 0) 
      <table class="table-Bushra">
        @foreach ($opportunities as $opportunity)
        <tr class="tr-Bushra">
          <td class="fisrt-col-Bushra">
              <img src="{{ asset( $opportunity->company->logoImage ? $opportunity->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" width="100px" hight="100px">
              <br><br>
          </td>

          <td class="second-col-Bushra">
              <h5>{{ $opportunity->jobTitle }}</h5>
              <p class="opportunityStateB2 text-secondary"> {{ Carbon\Carbon::parse($opportunity->Start_at)->toFormattedDateString() }}  -  {{ Carbon\Carbon::parse($opportunity->end_at)->toFormattedDateString() }}  </p>
              <p class="opportunityStateB2 text-secondary"> {{ Carbon\Carbon::parse($opportunity->Start_at)->toFormattedDateString() }}  -  {{ Carbon\Carbon::parse($opportunity->end_at)->toFormattedDateString() }}  </p>
          </td>

        <td>
          @if($opportunity->status == 'pending')
            <h5 class="opportunityStateB2 text-warning">Pending</h5>
          @elseif ($opportunity->status == 'accept')
            <h5 class="opportunityStateB2 text-success">Accepted</h5>
          @elseif ($opportunity->status == 'need_modification')
          <h5 class="opportunityStateB2 text-blue">Need Modification</h5>
          @elseif ($opportunity->status == 'reject')
          <h5 class="opportunityStateB2 text-danger">Rejected</h5>
          @endif
        </td>
      
      </tr> 
        @endforeach
    </table>
  @else
    <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>Company has No Opportunities yet</p>
    </div>
  @endif
    
   
</div>

@endsection


