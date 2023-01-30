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
      <select id="filterLocationCommittee" class="form-select ">
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
      $("#filterLocationCommittee").append($("#filterLocationCommittee option:gt(0)").sort(function (a, b) {
        return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
      }));
    </script>

      <br><br>

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

      
          <td class="td-Bushra"><button class="btn-delete" type="submit">Delete </button></td>

          <td>
            <a href="{{ route('accOpportunity.details', $opportunity->id) }}"><span class="	fa fa-chevron-right" style="margin-top:1%;"></span></a>
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

