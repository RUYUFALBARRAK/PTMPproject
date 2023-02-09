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
            window.location.href = "{{url('/filter/opportunityPageCommittee')}}" + "?address=" + location;
        });

    </script>

    @endsection
    <script>
        $("#filterAddressCommittee").append($("#filterAddressCommittee option:gt(0)").sort(function(a, b) {
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

      
        <td >   
          @if(($opportunity->numberOfTraineeAssigned)== 0)
     <form method="POST" action="{{ route('deleteoppourtunityPTcommitte',[$opportunity->id]) }}">
           @csrf
           <input name="_method" type="hidden" value="DELETE">
          <button type="submit" id="delete" data-toggle="tooltip" title='Delete' style="margin-left:50%;" class="btn btn-outline-danger  show_confirm">Delete</button>
        </form>
        @else
          <form method="" action="">
           @csrf
           <input name="_method" type="hidden" value="DELETE">
        <button type="submit"  id="delete" data-toggle="tooltip" title='can not be deleted' style="margin-left:50%;" class="btn btn-outline-danger show_noconfirm">Delete</button>
        </form>
        @endif
      </td>

          <td>
            <a href="{{ route('accOpportunity.details', $opportunity->id) }}"><span class="	fa fa-chevron-right" style="margin-top:1%;"></span></a>
          </td>
      
      </tr>
        @endforeach
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `This opportunity may have assigned to trainee do you want to delete it?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              className: "myClass"
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  $('.show_noconfirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Opportunity delete!`,
              text: "This opportunity can not be deleted it is assigned to trainee",
              icon: "warning",
              button: true,
              dangerMode: true,
              className: "myClass"
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
 });
  
</script>
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
