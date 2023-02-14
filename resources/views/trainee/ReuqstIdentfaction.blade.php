<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<div class="content">
    @if(Session::has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
<table class="table-balqees">
    <tr>
        <th colspan="2" style="text-align: center;" class="th-khawlah">Identification letter</th> 
    </tr>
    <tr>

        <td class="fist-col-khawlah td-khawlah">
            <a href="{{url('downloadFile/'.$regulationToTrainee)}}">
                <button type="button" class="Identification-req-but" > Download identification letter
                    <span class="fa fa-download" aria-hidden="true"></span>
            </button>
            </a>
        </td>


        <td  class="td-balqees-link" style="text-align: right;"> <a href="{{$regulationToTrainee?? '#'}}" style="color:grey" target="_blank">View Identification letter</a> </td>
    </tr>
    <tr>
        <td class ="fist-col-khawlah td-balqees file_name">uploaded file:
            @if($regulation)
                <a href="{{url($regulation)}}" target="_blank">Link</a>
                <a href="{{url('downloadFile/'.$regulation)}}"><span class="fa fa-download" aria-hidden="true"></span></a>
            @endif
        </td>
        <td  style="text-align: right;" class="td-balqees-link">
            <label style="color: #005eb9"  for="uploadedFileInput">Upload Identification letter
                <a href="#" class="fa fa-upload" style="font-size:16px;"></a>
            </label>
        </td>


    </tr>
    <tr>
    <td colspan="2" style="padding-left:90%;"class=" td-balqees">
        <form method="post" action="{{route('uploadRequestIdFile')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" id="uploadedFileInput" name="uploadedFileInput" style="display: none">
            <button type="submit"  style="" class="Identification-req-but" > Submit </button>
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
