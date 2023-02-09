@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">
    <form method="GET" action="{{url('/searchStudent')}}">
        <div style="width:50%" class="input-group">
            <input type="search" class="form-control rounded" name="query" placeholder="Search for trainee by name or ID..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-dark">Search</button>
        </div>
    </form>

    <div class="form-group col-md-2 state-menu">
        <select id="inputState" class="form-select">
            @php
            $array = [
            "Available",
            "Ongoing",
            "Completed"
            ];
            @endphp
            <option selected>Status..</option>
            @foreach($array as $item)
            @if(request()->input('status') == $item)
            <option value="{{$item}}" selected>{{$item}}</option>
            @else
            <option value="{{$item}}">{{$item}}</option>
            @endif
            @endforeach

        </select>
    </div>
    @section("js")
    <script>
        // on change of option refresh page
        $("#inputState").change(function() {
            var status = $(this).val();
            window.location.href = "{{url('/filter/listOfStudents')}}" + "?status=" + status;
        });

    </script>

    @endsection
    @if( count($students) == 0)
    <!-- in case for no review -->
    <br> <br><br>
    <hr style="margin-top: -20px; margin-bottom: 35px;">
    <div class="noReviews"> No students </div>
    @else

    <hr>

    <table class="list-of-company">
        <tr>
            <th style="padding-left:4%; text-align: left;">Name </th>
            <th>ID</th>

            <th style="text-align: right; padding-right:9%;">status</th>
            <th></th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td style="font-size: 16px;"> {{$student->trainee_id }} </td>
            <td style="padding-right:8%;">{{$student->status}}</td>
            <td>

                <a href="{{ route('detailsForCommittee',[$student->trainee_id]) }}"><span class="	fa fa-chevron-right"></span></a>
            </td>
        </tr>
        @endforeach

    </table>
    @endif

</div>
@endsection
