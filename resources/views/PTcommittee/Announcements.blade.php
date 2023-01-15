@extends('PTcommittee.mainPage')

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
                <th class="th-balqees">View</th>
                <th class="th-balqees">Modify</th>
                <th class="th-balqees">Delete</th>
            </tr>
            @if(count($announcements) > 0)
                @foreach($announcements as $announcement)
                    <tr>
                        <td class="fist-column td-balqees">{{ $announcement->title }}</td>
                        <td class="td-balqees">{{ $announcement->created_at }}</td>
                        <td class="td-balqees"><button type="button" class="btn btn-outline-primary" onclick="openAnnouncement('{{ $announcement->title }}', '{{ $announcement->content }}')">View</button></td>
                        <td class="td-balqees"><a href="{{ route('edit_announcement', ['announcement' => $announcement]) }}" class="btn btn-outline-warning">Modify</a></td>
                        <td class="td-balqees"><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_announcement" onclick="document.querySelector('#confirm_delete_announcement__id').value = '{{ $announcement->id }}'">Delete</button></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>There are no announcements available.</td>
                </tr>
            @endif
        </table>
        <br><br><br>
        <a href="{{ route('add_announcement') }}" class="add-but" type="submit">Add Announcement</a>
    </div>
@endsection
