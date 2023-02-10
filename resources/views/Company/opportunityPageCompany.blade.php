@extends('company.mainPage')

@section('content-training')
<div class="content">

    <h2>Opportunities</h2>

    
   @if($comp->status=='accept')
    <a href="{{ url('/addOppourtunityForCompany') }}" class="btn text-white" style="margin-left:40%; font-size:20px; margin-top:-3.6%; position:absolute; background-color: #388087;">Add training opportunity</a>
   @elseif($comp->status=='reject')
   <a class="btn text-white" style="margin-left:26%; font-size:16px; margin-top:-3.6%; position:absolute; background-color: red;">Sorry your company rejected by practical training unit ..</a>
   @else
   <a class="btn text-white" style="margin-left:29%; font-size:16px; margin-top:-3.6%; position:absolute; background-color: gray;">Waiting for acceptance from practical training unit ..</a>
   @endif

    <div class="form-group col-md-2 state-menu" style="margin-left:65%;  position:absolute; ">
        <select id="inputLocationCompany" class="form-select">
            @php
            $arr = [
            "accept" =>"Accepted",
            "reject" => "Rejected",
            "pending" => "Pending",
            "need_modification" => "Need Modification",
            "all" => "All",]
            @endphp

            <option disabled selected>Status..</option>

            @foreach($arr as $ar => $name)
            {{-- if old value --}}
            @if($ar == request()->status ??null)
            <option value="{{$ar}}" selected>{{$name}}</option>
            @else
            <option value="{{$ar}}">{{$name}}</option>
            @endif

            @endforeach
        </select>
    </div>
    @section("js")
    <script>
        $("#inputLocationCompany").change(function() {
            var location = $(this).val();
            window.location.href = "{{url('/filter/opportunityPageCompany')}}" + "?status=" + location;
        });

    </script>

    @endsection




    <hr>
    <!-- New-->
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
                <h6>{{ Carbon\Carbon::parse($opportunity->Start_at)->toFormattedDateString() }} - {{ Carbon\Carbon::parse($opportunity->end_at)->toFormattedDateString() }}</h6>
            </td>
            

          <td>
            @if($opportunity->status == 'pending')
              <h5 class="opportunityStateB2 text-warning" >Pending</h5>
            @elseif ($opportunity->status == 'accept')
              <h5 class="opportunityStateB2 text-success" >Accepted</h5>
            @elseif ($opportunity->status == 'need_modification')
            <h5 class="opportunityStateB2" style="color:#dadd28; ">Need Modification</h5>
            @elseif ($opportunity->status == 'reject')
            <h5 class="opportunityStateB2 text-danger" >Rejected</h5>
            @endif
          </td>
          <td style="padding-left:10%; padding-top:5% color:black; font-size: 1px;"class="second-col-Bushra">
                <h6>{{ $opportunity->numberOfTraineeAssigned.'/'.$opportunity->numberOfTrainee .' ' .'Trainees Assigned'}}</h6>
               
            </td>


            <td class="oppoArrow">
                <a href="{{ route('opportunityDetails.show' , $opportunity->id) }}"><span class="	fa fa-chevron-right" ></span></a>
              </td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="not-found">
        <img src="{{asset('img/paper.png')}}" alt="Company logo" class="logoCompany"> <br><br><br>
        <hr>
        <p>Company has No Opportunities yet</p>
    </div>
    @endif


</div>

@endsection
