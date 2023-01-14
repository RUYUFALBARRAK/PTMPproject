@extends('trainee.mainPage')

@section('content-training')
    <div class="content">
        @if(session('status'))
            <div class="alert alert-{{ session('theme') }}">{{ session('status') }}</div>
        @endif

        <h1>Current Announcements</h1>

            <marquee direction="up" scrollamount="2" behavior="scroll" class="homeMarquee" onmouseover="this.stop()" onmouseout="this.start()" style="height: 150px;">
                <table class="table-balqees">
                    <thead>
                        <tr>
                            <th class="fist-column th-balqees">Announcement title</th>
                            <th class="th-balqees">Publish data</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\announcement::all() as $announcement)
                        <tr>
                            <td class="fist-column td-balqees"><a href="javascript:void(0);" onclick="openAnnouncement('{{ $announcement->title }}', '{{ $announcement->content }}')">{{ $announcement->title }}</a></td>
                            <td class="td-balqees">{{ $announcement->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </marquee>


            {{--        <table class="table-balqees">--}}
{{--            <tr>--}}
{{--                <th class="fist-column th-balqees">Announcement title</th>--}}
{{--                <th class="th-balqees">Publish data</th>--}}
{{--                <th class="th-balqees">View</th>--}}
{{--            </tr>--}}
{{--            @foreach($announcements as $announcement)--}}
{{--                <tr>--}}
{{--                    <td class="fist-column td-balqees">{{ $announcement->title }}</td>--}}
{{--                    <td class="td-balqees">{{ $announcement->created_at }}</td>--}}
{{--                    <td class="td-balqees"><button type="button" class="btn btn-outline-primary" onclick="openAnnouncement('{{ $announcement->title }}', '{{ $announcement->content }}')">View</button></td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </table>--}}
    </div>
@endsection
