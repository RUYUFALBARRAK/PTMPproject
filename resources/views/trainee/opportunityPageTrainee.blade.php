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
      <select id="filterLocationTrainee" class="form-select ">
        <option value="">Location..</option>
        <option>Abha</option>
        <option>Al-Abwa</option>
        <option>Al Artaweeiyah</option>
        <option>Al Bukayriyah</option>
        <option>Badr</option>
        <option>Baljurashi</option>
        <option>Bisha</option>
        <option>Bareq</option>
        <option>Buraydah</option>
        <option>Al Bahah</option>
        <option>Buqaa</option>
        <option>Dammam</option>
        <option>Dhahran</option>
        <option>Dhurma</option>
        <option>Dahaban</option>
        <option>Diriyah</option>
        <option>Duba</option>
        <option>Dumat Al-Jandal</option>
        <option>Dawadmi</option>
        <option>Farasan</option>
        <option>Gatgat</option>
        <option>Gerrha</option>
        <option>Ghawiyah</option>
        <option>Al-Gwei'iyyah</option>
        <option>Harmah</option>
        <option>Ha'il</option>
        <option>Hotat Bani Tamim</option>
        <option>Hofuf</option>
        <option>Huraymila</option>
        <option>Hafr Al-Batin</option>
        <option>Jabal Umm al Ru'us</option>
        <option>Jalajil</option>
        <option>Jeddah</option>
        <option>Jizan</option>
        <option>Jizan Economic City</option>
        <option>Jubail</option>
        <option>Al Jafr</option>
        <option>Khafji</option>
        <option>Khaybar</option>
        <option>King Abdullah Economic City</option>
        <option>King Abdullah Economic City</option>
        <option>Khamis Mushait</option>
        <option>Al-Saih</option>
        <option>Knowledge Economic City, Medina</option>
        <option>Khobar</option>
        <option>Al-Khutt</option>
        <option>Layla</option>
        <option>Lihyan</option>
        <option>Al Lith</option>
        <option>Al Majma'ah</option>
        <option>Mastoorah</option>
        <option>Al Mikhwah</option>
        <option>Al-Mubarraz</option>
        <option>Al Mawain</option>
        <option>Medina</option>
        <option>Mecca</option>
        <option>Muzahmiyya</option>
        <option>Najran</option>
        <option>Al-Namas</option>
        <option>Umluj</option>
        <option>Al-Omran</option>
        <option>Al-Oyoon</option>
        <option>Qadeimah</option>
        <option>Qatif</option>
        <option>Qaisumah</option>
        <option>Al Qunfudhah</option>
        <option>Qurayyat</option>
        <option>Rabigh</option>
        <option>Rafha</option>
        <option>Ar Rass</option>
        <option>Ras Tanura</option>
        <option>Ranyah</option>
        <option>Riyadh</option>
        <option>Riyadh Al-Khabra</option>
        <option>Rumailah</option>
        <option>Sabt Al Alaya</option>
        <option>Sarat Abidah</option>
        <option>Saihat</option>
        <option>Safwa city</option>
        <option>Sakakah</option>
        <option>Sharurah</option>
        <option>Shaqraa</option>
        <option>Shaybah</option>
        <option>As Sulayyil</option>
        <option>Taif</option>
        <option>Tabuk</option>
        <option>Tanomah</option>
        <option>Tarout</option>
        <option>Tayma</option>
        <option>Thadiq</option>
        <option>Thuwal</option>
        <option>Thuqbah</option>
        <option>Turaif</option>
        <option>Tabarjal</option>
        <option>Udhailiyah</option>
        <option>Al-'Ula</option>
        <option>Um Al-Sahek</option>
        <option>Unaizah</option>
        <option>Uqair</option>
        <option>Uyayna</option>
        <option>Uyun AlJiwa</option>
        <option>Wadi Al-Dawasir</option>
        <option>Al Wajh</option>
        <option>Yanbu</option>
        <option>Az Zaimah</option>
        <option>Zulfi</option>
      </select>
    </div>

    <script>
      $("#filterLocationTrainee").append($("#filterLocationTrainee option:gt(0)").sort(function (a, b) {
        return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
      }));
    </script>

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
              <a href="{{ route('opportunity.confirm' , $opportunitiy->id) }}"><span class="fa fa-chevron-right"></span></a>
            @else
              <a href="{{ route('opportunity.apply' , $opportunitiy->id) }}"><span class="fa fa-chevron-right"></span></a>
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

