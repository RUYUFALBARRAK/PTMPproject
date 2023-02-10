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
    <table class="table table-hover">
   <thead>
    <tr>
      <th scope="col">Logo</th>
      <th scope="col">Title</th>
      <th scope="col">Location</th>
      <th scope="col">Delete</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach ($opportunities as $opportunity)
        <tr>
          <td >
          <img src="{{ asset( $opportunity->company->logoImage ? 'storage/images/' . $opportunity->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" class="logoCompany" width="100px" hight="100px">
              <br><br>
          </td>

          <td style="padding-top:30px;">
              <h5>{{ $opportunity->jobTitle }}</h5>
              <h6>{{ Carbon\Carbon::parse($opportunity->Start_at)->toFormattedDateString() }}  -  {{ Carbon\Carbon::parse($opportunity->end_at)->toFormattedDateString() }}</h6>
          </td>
          <td style="padding-top:40px;">
            <h5>{{ $opportunity->address }}</h5>
          </td>
      
        <td style="padding-top:30px;" >   
          @if(($opportunity->numberOfTraineeAssigned)== 0)
     <form method="POST" action="{{ route('deleteoppourtunityPTcommitte',[$opportunity->id]) }}">
           @csrf
           <input name="_method" type="hidden" value="DELETE">
          <button type="submit" id="delete" data-toggle="tooltip" title='Delete'   class="btn btn-outline-danger  show_confirm">Delete</button>
        </form>
        @else
  
        <button type="submit"  id="delete" data-toggle="tooltip" title='can not be deleted' onclick="nodelete('opportunity')" class="btn btn-outline-danger show_noconfirm">Delete</button>
       
        @endif
      </td>

          <td style="padding-top:40px;" >
            <a href="{{ route('accOpportunity.details', $opportunity->id) }}"><span class="	fa fa-chevron-right" ></span></a>
          </td>
      
      </tr>
        @endforeach
 </tbody>
<script>
 $('.show_confirm').click(function (event) {
    var form = $(this).closest("form");
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
                swal("This opportunity has been deleted!", {
                    icon: "success",
                });
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
