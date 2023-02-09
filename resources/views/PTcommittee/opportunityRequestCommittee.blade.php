@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">

    <form method="GET" action="{{url('/searchopportunityRequestCommittee')}}">
        <div style="width:50%" class="input-group">
            <input type="search" class="form-control rounded" name="query" placeholder="Search for opportunity name..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-dark">Search</button>
        </div>
    </form>


    <div class="form-group col-md-2 state-menu" style="margin-top: -2.5%;">

        <select id="filterLocationTrainee" class="form-select ">
            <option value="">Location..</option>
            @php
            $array = [
            "Abha",
            "Al-Abwa",
            "Al Artaweeiyah",
            "Al Bukayriyah",
            "Badr",
            "Baljurashi",
            "Bisha",
            "Bareq",
            "Buraydah",
            "Al Bahah",
            "Buqaa",
            "Dammam",
            "Dhahran",
            "Dhurma",
            "Dahaban",
            "Diriyah",
            "Duba",
            "Dumat Al-Jandal",
            "Dawadmi",
            "Farasan",
            "Gatgat",
            "Gerrha",
            "Ghawiyah",
            "Al-Gwei'iyyah",
            "Harmah",
            "Ha'il",
            "Hotat Bani Tamim",
            "Hofuf",
            "Huraymila",
            "Hafr Al-Batin",
            "Jabal Umm al Ru'us",
            "Jalajil",
            "Jeddah",
            "Jizan",
            "Jizan Economic City",
            "Jubail",
            "Al Jafr",
            "Khafji",
            "Khaybar",
            "King Abdullah Economic City",
            "Khamis Mushait",
            "Al-Saih",
            " Knowledge Economic City, Medina",
            " Khobar",
            "Al-Khutt",
            "Layla",
            "Lihyan",
            "Al Lith",
            "Al Majma'ah",
            "Mastoorah",
            "Al Mikhwah",
            "Al-Mubarraz",
            "Al Mawain",
            "Medina",
            "Mecca",
            "Muzahmiyya",
            "Najran",
            "Al-Namas",
            "Umluj",
            "Al-Omran",
            "Al-Oyoon",
            "Qadeimah",
            "Qatif",
            "Qaisumah",
            "Al Qunfudhah",
            "Qurayyat",
            "Rabigh",
            "Rafha",
            "Ar Rass",
            "Ras Tanura".
            "Ranyah",
            "Riyadh",
            "Riyadh Al-Khabra",
            "Rumailah",
            "Sabt Al Alaya",
            "Sarat Abidah",
            "Saihat",
            "Safwa city",
            "Sakakah",
            "Sharurah",
            "Shaqraa",
            "Shaybah",
            "As Sulayyil",
            "Taif",
            "Tabuk",
            "Tanomah",
            "Tarout",
            "Tayma",
            "Thadiq",
            "Thuwal",
            "Thuqbah",
            "Turaif",
            "Tabarjal",
            "Udhailiyah",
            " Al-'Ula",
            "Um Al-Sahek",
            "Unaizah",
            "Uqair",
            "Uyayna",
            "Uyun AlJiwa",
            "Wadi Al-Dawasir",
            "Al Wajh",
            "Yanbu",
            "Az Zaimah",
            "Zulfi",


            ];
            @endphp
            @foreach($array as $arr)
            {{-- if old value --}}
            @if($arr == request()->address ??null)
            <option value="{{$arr}}" selected>{{ $arr }}</option>
            @else

            <option value="{{$arr}}">{{ $arr }}</option>
            @endif
            @endforeach



        </select>
    </div>
    @section("js")
    <script>
        // on change of option refresh page
        $("#filterLocationTrainee").change(function() {
            var location = $(this).val();
            window.location.href = "{{url('/filter/opportunityRequestCommittee')}}" + "?address=" + location;
        });

    </script>

    @endsection
    <script>
        $("#filterLocationReqCommittee").append($("#filterLocationReqCommittee option:gt(0)").sort(function(a, b) {
            return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
        }));

    </script>

    <br><br>


    @if(count($opportunities) > 0)

    <table class="table-Bushra">
        @foreach($opportunities as $opportunitiy)
        <tr class="tr-Bushra">
            <td class="fisrt-col-Bushra">
                <img src="{{ asset( $opportunitiy->company->logoImage ? 'storage/images/' . $opportunitiy->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" width="100px" hight="100px">
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
                <a href="{{ route('opportunity.details' , $opportunitiy->id) }}"><span class="	fa fa-chevron-right"></span></a>
            </td>

        </tr>
        @endforeach

    </table>

    @else

    <div class="not-found">
        <img src="{{asset('img/paper.png')}}" alt="Company logo" class="logoCompany"> <br><br><br>
        <hr>
        <p>No Opportunities Founded</p>
    </div>

    @endif


</div>

@endsection
