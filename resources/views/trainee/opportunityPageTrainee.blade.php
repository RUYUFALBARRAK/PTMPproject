@extends('trainee.mainPage')

@section('content-training')
<div class="content">



    <form method="GET" action="{{url('/searchopportunityPageTrainee')}}">
        <div style="width:50%" class="input-group">
            <input type="search" class="form-control rounded" name="query" placeholder="Search for opportunity name..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-dark">Search</button>
        </div>
    </form>

    <div class="form-group col-md-2 state-menu" style=" margin-left:47%; margin-top:-3.8%;">
        <select id="filterLocationTrainee" class="form-select ">
            <option value=" ">Location..</option>
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


    <script>
        $("#filterLocationTrainee").append($("#filterLocationTrainee option:gt(0)").sort(function(a, b) {
            return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
        }));

    </script>

    <div class="form-group col-md-2 state-menu" style="margin-left:66%; margin-top:-3.8%;">
        <select id="inputLocationCompany" name="status" class="form-select">
            @php
            $arr = [
            "accept" =>"Accepted",
            "reject" =>"Rejected",
            "pending" => "Pending",
            "available" => "Available",
            "all" => "All",]
            @endphp

            <option disabled selected>Status..</option>

            @foreach($arr as $ar => $name)
            {{-- if old value --}}
            @if($ar == session()->get("status")??null || $arr == request()->status ??null)
            <option value="{{$ar}}" selected>{{$name}}</option>
            @else
            <option value="{{$ar}}">{{$name}}</option>
            @endif

            @endforeach

        </select>
    </div>
    
    @section("js")
    <script>
        // on change of option refresh page
        $("#filterLocationTrainee").change(function() {
            var location = $(this).val();
            window.location.href =
             "{{url('/filter/opportunityPageTrainee')}}" + "?address=" +
              location  + "@if(session()->get('status'))&status={{ session()->get('status') }}@endif"
        });

        $("#inputLocationCompany").change(function() {
            var location = $(this).val();
            window.location.href = "{{url('/filter/opportunityPageTrainee')}}" 
            + "?status="+ location + "@if(session()->get('address'))&address={{session()->get('address')}}@endif";
        });

    </script>

    @endsection
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    <hr>

    <span style=" font-size: 14px; margin-top:1.5%;">&nbsp;Didn't see your opportunity? <a class="linkB" style="color: #388087;cursor: pointer;" onclick="$('#view_invait_modal').modal('show');"> Invite a Company</a> </span>

    <br>
    <hr>



    @if(count($opportunities) > 0)

    <table class="table-Bushra">

      @foreach($opportunities as $opportunitiy)
      @if(($opportunitiy->numberOfTraineeAssigned) < ($opportunitiy->numberOfTrainee))
      @if($opportunitiy->AppDeadline >= now()->format('Y-m-d'))
        <tr class="tr-Bushra">

            <td class="fisrt-col-Bushra">
                <img src="{{ asset( $opportunitiy->company->logoImage ? 'storage/images/' . $opportunitiy->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" class="logoCompany" width="100px" hight="100px">
                <br><br>
            </td>

            <td class="second-col-Bushra">
                <h5>{{ $opportunitiy->jobTitle }}</h5>
                <h6 class="text-secondary">{{ Carbon\Carbon::parse($opportunitiy->Start_at)->toFormattedDateString() }} - {{ Carbon\Carbon::parse($opportunitiy->end_at)->toFormattedDateString() }} </h6>
            </td>

            <td>
                @php $status = App\Models\requestedopportunity::where('opportunity_id',$opportunitiy->id)->where('trainee_id' , session()->get('loginId'))->first(); @endphp


            @if(is_null($status))
            @else
              @if(($status->statusbycompany ==  \App\Enum\companyStatus::pending || $status->statusbycompany == \App\Enum\companyStatus::accept) && $status->statusbytrainee ==  \App\Enum\companyStatus::pending )
                <h6 class="opportunityStateB2 text-warning">Pending</h6>
              @elseif($status->statusbycompany == \App\Enum\companyStatus::accept && $status->statusbytrainee == \App\Enum\companyStatus::accept)
                <h6 class="opportunityStateB2 text-success">Accept</h6>
              @elseif($status->statusbycompany == \App\Enum\companyStatus::reject)
                <h6 class="opportunityStateB2 text-danger">Reject</h6>
              @else
                <h6 class="opportunityStateB2 text-success">Available</h6>
             
              @endif
           @endif
          </td>

            <td class="td-Bushra">
                <span class="rate2-Bushra">

                    @php
                    $count = 0;
                    $num = 0;
                    @endphp

                    @foreach($reviews as $review)
                    @if($review->company_id == $opportunitiy->company_id)

                    @php
                    $count = $count + $review-> star_rating;
                    $num++;
                    @endphp

                    @endif
                    @endforeach

                    @if($num != 0)

                    @php
                    $result = number_format($count/$num)
                    @endphp

                    @for($i = 1; $i <= $result; $i++) <span class="fa fa-star fa-lg checked"></span>
                @endfor

                @for($j = $result+1; $j <= 5; $j++) <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
                    @endfor

                    @else

                    @for($q = 0; $q <= 4; $q++) <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
                        @endfor

                        @endif

                        </span>
                        <br>

                        <a class="view-reveiws2" href="{{route('reviews', $opportunitiy->company_id)}}">View Reviews</a>

            </td>




            @php
            $is_apply = \App\Models\requestedopportunity::where('opportunity_id' , $opportunitiy->id)->where('trainee_id' , session()->get('loginId'))->first();

            // dd($is_apply)
            @endphp

            <td>
                @if($is_apply)
                <a href="{{ route('opportunity.confirm' , $opportunitiy->id) }}"><span class="	fa fa-chevron-right"></span></a>
                @else
                <a href="{{ route('opportunity.apply' , $opportunitiy->id) }}"><span class="	fa fa-chevron-right"></span></a>
                @endif
            </td>

        </tr>

         @endif
        @endif
      @endforeach 

    </table>

    @else

    <div class="not-found">
        <img src="{{asset('img/paper.png')}}" alt="Company logo" class="logoCompany"> <br><br><br>
        <hr>
        <p>No Opportunities yet</p>
    </div>

    @endif


</div>

@endsection
