@extends('company.mainPage')

@section('content-training')
<div class="content">

  

  
    <h2>Opportunities</h2>
    
   @if($comp->status=='accept')
    <a href="{{ url('/addOppourtunityForCompany') }}" class="btn text-white" style="margin-left:40%; font-size:20px; margin-top:-3.6%; position:absolute; background-color: #388087;">Add training opportunity</a>
   @endif
 

   
    <div class="form-group col-md-2 state-menu" style="margin-left:65%;  position:absolute; ">
      <select id="inputLocationCompany" class="form-select">
        <option selected>Status..</option>
        <option>Accepted</option>
        <option>Rejected</option>
        <option>Pending</option>
        <option>Needs Modification</option>
        <option>All</option>
      </select>
    </div>





<hr>
<!-- New-->
    @if(count($opportunities) > 0) 
      <table class="table-Bushra">
        @foreach ($opportunities as $opportunity)
        <tr class="tr-Bushra">
            <td class="fisrt-col-Bushra">
                <img src="{{ asset( $opportunity->company->logoImage ? 'storage/images/' . $opportunity->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" class="logoCompany" width="100px" hight="100px">
                <br><br>
            </td>

            <td class="second-col-Bushra">
                <h5>{{ $opportunity->jobTitle }}</h5>
                <h6>{{ Carbon\Carbon::parse($opportunity->Start_at)->toFormattedDateString() }}  -  {{ Carbon\Carbon::parse($opportunity->end_at)->toFormattedDateString() }}</h6>
            </td>

          <td>
            @if($opportunity->status == 'pending')
              <h5 class="opportunityStateB2 text-warning" style="margin-top:-0.8%;">Pending</h5>
            @elseif ($opportunity->status == 'accept')
              <h5 class="opportunityStateB2 text-success" style="margin-top:-0.8%;">Accepted</h5>
            @elseif ($opportunity->status == 'need_modification')
            <h5 class="opportunityStateB2" style="color:#dadd28; margin-top:-0.8%;">Need Modification</h5>
            @elseif ($opportunity->status == 'reject')
            <h5 class="opportunityStateB2 text-danger" style="margin-top:-0.8%;">Rejected</h5>
            @endif
          </td>

          <td class="oppoArrow">
            <a href="{{ route('opportunityDetails.show' , $opportunity->id) }}"><span class="	fa fa-chevron-right" ></span></a>
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


