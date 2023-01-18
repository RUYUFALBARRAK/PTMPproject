@extends('trainee.mainPage')

@section('content-training')
<div class="content">

  

    <form method="GET" action="{{url('/opportunityPageTrainee')}}">
      <div style="width:50%" class="input-group">
      <input type="search" class="form-control rounded" name="query" placeholder="Search for opportunity name..." aria-label="Search" aria-describedby="search-addon" />
      <button type="submit" class="btn btn-outline-dark">Search</button>
      </div>
      <span style=" font-size: 14px; margin-top:1.5%;">&nbsp;Didn't see your opportunity? <a class="linkB" style="color:blue;" href="#"> Invite a Company</a> </span>
    </form>

    <div class="form-group col-md-2 state-menu" style=" margin-left:47%; margin-top:-3.8%;">
      <select id="inputLocationCommettii" class="form-select ">
        <option selected>Location..</option>
        <option >Riyadh</option>
        <option>Jeddah</option>
        <option>Dammam</option>
        <option>All</option>
      </select>
    </div>

    <div class="form-group col-md-2 state-menu" style="margin-left:66%; margin-top:-3.8%;">
      <select id="inputLocationCompany" class="form-select">
        <option selected>Status..</option>
        <option>Accepted</option>
        <option>Rejected</option>
        <option>Pending</option>
        <option>Available</option>
        <option>All</option>
      </select>
    </div>


    <br><br>



    @if(count($opportunities) > 0)

    <table class="table-Bushra">
      @foreach($opportunities as $opportunitiy)
        <tr class="tr-Bushra">

          <td class="fisrt-col-Bushra">
              <img class="img-thumbnail" src="{{ asset( $opportunitiy->company->logoImage ? $opportunitiy->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" width="100px" hight="100px">
              <br><br>
          </td>

          <td class="second-col-Bushra">
              <h5>{{ $opportunitiy->jobTitle }}</h5>
              <h6 class="text-secondary">{{ Carbon\Carbon::parse($opportunitiy->Start_at)->toFormattedDateString() }} - {{ Carbon\Carbon::parse($opportunitiy->end_at)->toFormattedDateString() }} </h6>
          </td>

          <td class="td-Bushra">
              <span class="rate2-Bushra">
              <span class="fa fa-star fa-lg checked"></span>
              <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
              <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
              <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
              <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
              </span>
              <br>
              <a class="view-reveiws2" href="#">View Reviews</a>
          </td>

          {{-- <td>
            <h4 class="opportunityStateB2 text-success">{{ $opportunitiy->status }}</h4>
          </td> --}}

          @php 
            $is_apply = \App\Models\requestedopportunity::where('opportunity_id' , $opportunitiy->id)->where('trainee_id' , session()->get('loginId'))->first();

            // dd($is_apply)
          @endphp

          <td>
            @if($is_apply)
              <a href="{{ route('opportunity.confirm' , $opportunitiy->id) }}" class="btn btn-light ml-4"><i class="fa fa-chevron-right""></i></a>
            @else
              <a href="{{ route('opportunity.apply' , $opportunitiy->id) }}" class="btn btn-light ml-4"><i class="fa fa-chevron-right""></i></a>
            @endif
          </td>
        
        </tr>
      @endforeach 

  </table>

  @else

    <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Opportunities yet</p>
    </div>

  @endif


</div>

@endsection

