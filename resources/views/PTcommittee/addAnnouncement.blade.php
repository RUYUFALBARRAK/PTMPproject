@extends('PTcommittee.mainPage')


@section('content-training')
    <h1 class="h11">Add Announcement</h1>
    @if(session('status'))
        <div class="alert alert-{{ session('theme') }}">{{ session('status') }}</div>
    @endif

    <div class="content1">
        <form class="form-balqees" method="post" action="{{ $action === 'edit' ? route('do_edit_announcement', ['announcement' => $announcement]) : route('do_add_announcement') }}">
            @csrf
            <div class="has-validation mb-3">
                <label for="validationTooltip01" class="form-label">Announcement Title: *</label>
                <input type="text" id="validationTooltip01" class="form-control mb-0 @error('title') is-invalid @enderror" placeholder="add title of your announcement here" maxlength="40" name="title" value="{{ $action === 'edit' ? $announcement->title : old('title') }}">
                <div class="d-inline-block"><span id="announcement-title-length">0</span>/40</div>
            </div>
            <div class="has-validation mb-3">
                <label for="validationTooltip02" class="form-label">Announcement content: *</label>
                <textarea rows="5" id="validationTooltip02" class="form-control mb-0 @error('content') is-invalid @enderror" placeholder="add your announcement content here " maxlength="500" name="content">{{ $action === 'edit' ? $announcement->content : old('content') }}</textarea>
                <div class="d-inline-block"><span id="announcement-content-length">0</span>/500</div>
            </div>
            <div>
                <button class="add-but" style="margin-top:2%; text-decoration: none;" type="submit">{{ $action === 'edit' ? 'Modify' : 'Add' }}</button>
                <a href="{{ route('announcements') }}"><button class="can-but" type="button">Cancel</button></a>
            </div>
        </form>
    </div>

    <script>
        document.querySelector('#announcement-title-length').textContent = document.querySelector('#validationTooltip01').value.length;
        document.querySelector('#announcement-content-length').textContent = document.querySelector('#validationTooltip02').value.length;
        document.querySelector('#validationTooltip01').oninput = (e) => {
            $('#announcement-title-length').text($('#validationTooltip01').val().length);
        };
        document.querySelector('#validationTooltip02').oninput = (e) => {
            $('#announcement-content-length').text($('#validationTooltip02').val().length);
        };
    </script>
@endsection
