@extends('PTcommittee.mainPage')

@section('content-training')
    <div class="content">
        @if(session('status'))
            <div class="alert alert-{{ session('theme') }}">{{ session('status') }}</div>
        @endif

        <h2>Current Announcements</h2><hr>
            @if(count($announcements) > 0)
                <table class="table-balqees">
                    <tr>
                        <th class="fist-column th-balqees">Announcement title</th>
                        <th class="th-balqees">Publish data</th>
                        <th class="th-balqees">View</th>
                        <th class="th-balqees">Modify</th>
                        <th class="th-balqees">Delete</th>
                    </tr>
                    @foreach($announcements as $announcement)
                        <tr>
                            <td class="fist-column td-balqees">{{ $announcement->title }}</td>
                            <td class="td-balqees">{{ $announcement->created_at }}</td>
                            <td class="td-balqees"><button type="button" class="btn btn-outline-primary" onclick="openAnnouncement('{{ $announcement->title }}', '{{ $announcement->content }}')">View</button></td>
                            <td class="td-balqees"><a href="{{ route('edit_announcement', ['announcement' => $announcement]) }}" class="btn btn-outline-warning">Modify</a></td>
                            <td class="td-balqees">
                        <form action="{{ route('delete_announcement') }}" method="post" >
                        @csrf
                        <input type="hidden" name="delete_ann" value="1">
                        <input type="hidden" name="announcement_id"  value="{{$announcement->id}}">
                        <button type="button" class="btn btn-outline-danger show_confirm" >Delete</button>
                         </form>
                        </td>

                        </tr>
                    @endforeach
                </table>
                    <script>
            $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `The Announcement will be deleted`,
                    text: "If you delete this, you can not undo this process.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The Announcement has been deleted!", {
                                icon: "success",
                            });
                            form.submit();
                        }
                    });
            });


</script>
            @else
                <div class="not-found">
                    <br>
                    <img src="{{asset('img/paper.png')}}" alt="" class="logoCompany"><br> <hr>
                    <p>There are no announcements available now.</p>
                </div>
            @endif
        <br><br><br>
        <a href="{{ route('add_announcement') }}" > <button type="button" type="submit" class="add-but" class="fas fa-edit"> Add Announcement </button></a>
    </div>
@endsection
