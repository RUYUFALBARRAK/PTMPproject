@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">

<form method="GET" action="{{url('/searchopportunityPageCommittee')}}">

  <div style="width:50%" class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search for opportunity name..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">Search</button>
</div>
</form>


    <div class="form-group col-md-2 state-menu" style="margin-top: -2.5%;">
      <select name="filterAddressCommittee" id="filterAddressCommittee" class="form-select ">
        <option value="">Location..</option>
        <option value="Abha">Abha</option>
        <option value="Al-Abwa">Al-Abwa</option>
        <option value="Al Artaweeiyah">Al Artaweeiyah</option>
        <option value="Al Bukayriyah">Al Bukayriyah</option>
        <option value="Badr">Badr</option>
        <option value="Baljurashi">Baljurashi</option>
        <option value="Bisha">Bisha</option>
        <option value="Bareq">Bareq</option>
        <option value="Buraydah">Buraydah</option>
        <option value="Al Bahah">Al Bahah</option>
        <option value="Buqaa">Buqaa</option>
        <option value="Dammam<">Dammam</option>
        <option value="Dhahran">Dhahran</option>
        <option value="Dhurma">Dhurma</option>
        <option value="Dahaban">Dahaban</option>
        <option value="Diriyah">Diriyah</option>
        <option value="Duba">Duba</option>
        <option value="Dumat Al-Jandal">Dumat Al-Jandal</option>
        <option value="Dawadmi">Dawadmi</option>
        <option value="Farasan">Farasan</option>
        <option value="Gatgat">Gatgat</option>
        <option value="Gerrha">Gerrha</option>
        <option value="Ghawiyah">Ghawiyah</option>
        <option value="Al-Gwei'iyyah">Al-Gwei'iyyah</option>
        <option value="Harmah">Harmah</option>
        <option value="Ha'il">Ha'il</option>
        <option value="Hotat Bani Tamim">Hotat Bani Tamim</option>
        <option value="Hofuf">Hofuf</option>
        <option value="Huraymila">Huraymila</option>
        <option value="Hafr Al-Batin">Hafr Al-Batin</option>
        <option value="Jabal Umm al Ru'us">Jabal Umm al Ru'us</option>
        <option value="Jalajil">Jalajil</option>
        <option value="Jeddah">Jeddah</option>
        <option value="Jizan">Jizan</option>
        <option value="Jizan Economic City">Jizan Economic City</option>
        <option value="Jubail">Jubail</option>
        <option value="Al Jafr">Al Jafr</option>
        <option value="Khafji">Khafji</option>
        <option value="Khaybar">Khaybar</option>
        <option value="King Abdullah Economic City">King Abdullah Economic City</option>
        <option value="Khamis Mushait">Khamis Mushait</option>
        <option value="Al-Saih">Al-Saih</option>
        <option value="Knowledge Economic City, Medina">Knowledge Economic City, Medina</option>
        <option value="Khobar">Khobar</option>
        <option value="Al-Khutt">Al-Khutt</option>
        <option value="Layla">Layla</option>
        <option value="Lihyan">Lihyan</option>
        <option value="Al Lith">Al Lith</option>
        <option value="Al Majma'ah">Al Majma'ah</option>
        <option value="Mastoorah">Mastoorah</option>
        <option value="Al Mikhwah">Al Mikhwah</option>
        <option value="Al-Mubarraz">Al-Mubarraz</option>
        <option value="Al Mawain">Al Mawain</option>
        <option value="Medina">Medina</option>
        <option value="Mecca">Mecca</option>
        <option value="Muzahmiyya">Muzahmiyya</option>
        <option value="Najran">Najran</option>
        <option value="Al-Namas">Al-Namas</option>
        <option value="Umluj">Umluj</option>
        <option value="Al-Omran">Al-Omran</option>
        <option value="Al-Oyoon">Al-Oyoon</option>
        <option value="Qadeimah">Qadeimah</option>
        <option value="Qatif">Qatif</option>
        <option value="Qaisumah">Qaisumah</option>
        <option value="Al Qunfudhah">Al Qunfudhah</option>
        <option value="Qurayyat">Qurayyat</option>
        <option value="Rabigh">Rabigh</option>
        <option value="Rafha">Rafha</option>
        <option value="Ar Rass">Ar Rass</option>
        <option value="Ras Tanura">Ras Tanura</option>
        <option value="Ranyah">Ranyah</option>
        <option value="Riyadh">Riyadh</option>
        <option value="Riyadh Al-Khabra">Riyadh Al-Khabra</option>
        <option value="Rumailah">Rumailah</option>
        <option value="Sabt Al Alaya">Sabt Al Alaya</option>
        <option value="Sarat Abidah">Sarat Abidah</option>
        <option value="Saihat">Saihat</option>
        <option value="Safwa city">Safwa city</option>
        <option value="Sakakah">Sakakah</option>
        <option value="Sharurah">Sharurah</option>
        <option value="Shaqraa">Shaqraa</option>
        <option value="Shaybah">Shaybah</option>
        <option value="As Sulayyil">As Sulayyil</option>
        <option value="Taif">Taif</option>
        <option value="Tabuk">Tabuk</option>
        <option value="Tanomah">Tanomah</option>
        <option value="Tarout">Tarout</option>
        <option value="Tayma">Tayma</option>
        <option value="Thadiq">Thadiq</option>
        <option value="Thuwal">Thuwal</option>
        <option value="Thuqbah">Thuqbah</option>
        <option value="Turaif">Turaif</option>
        <option value="Tabarjal">Tabarjal</option>
        <option value="Udhailiyah">Udhailiyah</option>
        <option value="Al-'Ula">Al-'Ula</option>
        <option value="Um Al-Sahek">Um Al-Sahek</option>
        <option value="Unaizah">Unaizah</option>
        <option value="Uqair">Uqair</option>
        <option value="Uyayna">Uyayna</option>
        <option value="Uyun AlJiwa">Uyun AlJiwa</option>
        <option value="Wadi Al-Dawasir">Wadi Al-Dawasir</option>
        <option value="Al Wajh">Al Wajh</option>
        <option value="Yanbu">Yanbu</option>
        <option value="Az Zaimah">Az Zaimah</option>
        <option value="Zulfi">Zulfi</option>
      </select>
    </div>

    <script>
      $("#filterAddressCommittee").append($("#filterAddressCommittee option:gt(0)").sort(function (a, b) {
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

