<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<div class="content">
    @if(Session::has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
<table class="table-balqees">
    <tr>
        <th style="text-align: center;" class="th-khawlah">Identification letter</th> <th class="th-khawlah"></th>
    </tr>
    <tr>
        <td class="fist-col-khawlah td-khawlah"><button type="button" class="Identification-req-but" > Requst identification letter </button>
</td>
        <td  style="text-align: center;" class="td-balqees-link"> <a href="{{$regulationToTrainee?? '#'}}" style="color:grey">View Identification letter<span class="fa fa-download"></span></a> </td>
    </tr>
    <tr>
        <td class ="fist-col-khawlah td-balqees file_name">uploaded file:
            @if($regulation)
                <a href="{{url($regulation)}}" target="_blank">Link</a>
            @endif
        </td>
        <td style="text-align: center;" class="td-balqees-link">
            <label style="color: #005eb9"  for="uploadedFileInput">Upload Identification letter
                <a href="#" class="fa fa-upload" style="font-size:16px;"></a>
            </label>
        </td>

</td>

    </tr>
    <tr>
    <td class ="fist-col-khawlah td-balqees"></td>
    <td class=" td-balqees">

        <form method="post" action="{{route('uploadRequestIdFile')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" id="uploadedFileInput" name="uploadedFileInput" style="display: none">
            <button type="submit" class="Identification-req-but" > Submit </button>
        </form>

    </td>
</tr>


</table>
</div>

<script>
    $('#uploadedFileInput').change(function() {
        var file = $('#uploadedFileInput')[0].files[0].name;
        $('.file_name').text("uploaded file: "+file);
    });
</script>

@endsection
