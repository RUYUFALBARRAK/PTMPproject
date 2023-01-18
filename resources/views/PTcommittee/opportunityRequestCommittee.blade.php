@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">

<form method="GET" action="{{url('/opportunityRequestCommittee')}}">
  <div style="width:50%" class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search for opportunity name..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">Search</button>
</div>
</form>

   
<div class="form-group col-md-2 state-menu" style="margin-top: -2.5%;">
      <select id="inputLocationCommettii" class="form-select ">
        <option selected>Location</option>
        <option >Riyadh</option>
        <option>Jeddah</option>
        <option>Dammam</option>
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

          <td>
            <div style="color: #fff;">-------</div>
          </td>
          <td>
            <a href="{{ route('opportunity.details' , $opportunitiy->id) }}" class="btn btn-light"><i class="fa fa-chevron-right"></i></a>
          </td>
        
        </tr>
      @endforeach 

  </table>

  @else

    <div class="not-found">
      <img src="{{asset('img/paper.png')}}" alt="Company logo"  class= "logoCompany"> <br><br><br><hr>
      <p>No Opportunities Founded</p>
    </div>

  @endif
    
   
</div>

@endsection

