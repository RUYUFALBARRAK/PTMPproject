@extends('trainee.mainPage')

@section('content-training')
    <div class="content">
        @if(session('status'))
            <div class="alert alert-{{ session('theme') }}">{{ session('status') }}</div>
        @endif

        <h1>Current Announcements</h1>
        <table class="table-balqees">
            <tr>
                <th class="fist-column th-balqees">Announcement title</th>
                <th class="th-balqees">Publish data</th>
                <th class="th-balqees">Open</th>
            </tr>
            @foreach($announcements as $announcement)
                <tr>
                    <td class="fist-column td-balqees">{{ $announcement->title }}</td>
                    <td class="td-balqees">{{ $announcement->created_at }}</td>
                    <td class="td-balqees"><button type="button" class="btn btn-outline-primary" onclick="openAnnouncement('{{ $announcement->title }}', '{{ $announcement->content }}')">Open</button></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
