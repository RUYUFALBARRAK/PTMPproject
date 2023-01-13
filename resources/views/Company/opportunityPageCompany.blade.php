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


    
    <a href="addOppourtunityForCompany"><button class="btn btn-primary" type="button"
    style=" margin-left:75%; margin-top:-6%; font-size:140%;
    background-color: #388087;">Add training opportunity</button></a>
  



    <br><br>

    @if(count($opportunities) > 0)
      <table class="table-Bushra">
        @foreach ($opportunities as $opportunity)
        <tr class="tr-Bushra">
          <td class="fisrt-col-Bushra">
              <img src="{{ asset('img/SDAIA.png') }}" alt="Company logo" width="180%" hight="180%">
              <br><br>
          </td>

          <td class="second-col-Bushra">
              <h5>{{ $opportunity->jobTitle }}</h5>
              <p class="opportunityStateB2 text-secondary"> {{ $opportunity->Start_at }}  -  {{ $opportunity->end_at }}  </p>
          </td>

        <td>
          @if($opportunity->status == 'pending')
            <h5 class="opportunityStateB2 text-warning">{{ $opportunity->status }}</h5>
          @elseif ($opportunity->status == 'accept')
            <h5 class="opportunityStateB2 text-success">{{ $opportunity->status }}</h5>
          @elseif ($opportunity->status == 'need_modification')
          <h5 class="opportunityStateB2 text-blue">{{ $opportunity->status }}</h5>
          @elseif ($opportunity->status == 'reject')
          <h5 class="opportunityStateB2 text-danger">{{ $opportunity->status }}</h5>
          @endif
        </td>
      
      </tr> 
        @endforeach
    </table>
  @else
    <div class="alert-info">Company has no opportunities</div>
  @endif
    
   
</div>

@endsection

