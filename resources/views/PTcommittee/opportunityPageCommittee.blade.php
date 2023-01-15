@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">

<form method="GET" action="{{url('/opportunityPageCommittee')}}">
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
        @foreach ($opportunities as $opportunity)
        <tr class="tr-Bushra">
          <td class="fisrt-col-Bushra">
              <img src="{{ asset( $opportunity->company->logoImage ? 'storage/images/' . $opportunity->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" width="100px" hight="100px">
              <br><br>
          </td>

          <td class="second-col-Bushra">
              <h5>{{ $opportunity->jobTitle }}</h5>
              <h6>{{ Carbon\Carbon::parse($opportunity->Start_at)->toFormattedDateString() }}  -  {{ Carbon\Carbon::parse($opportunity->end_at)->toFormattedDateString() }}</h6>
          </td>

          <td class="td-Bushra" >

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

      
          <td class="td-Bushra"><button class="btn-delete" type="submit">Delete </button></td>
      
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

