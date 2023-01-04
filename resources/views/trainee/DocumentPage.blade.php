@extends('trainee.mainPage')
<!-- @extends('layouts.layout') -->


@section('content-training')
    <div class="content">
        <table class="table-balqees">
            <tr>
                <th colspan="2" class="th-balqees">Documents Template</th>
            </tr>
            @foreach($docs as $doc)
            <tr>
                <td class="fist-col td-balqees">{{ $doc->documentName }}</td>
                <td class="td-balqees"><a href="{{ $doc->getDocumentURL() }}"><span class="fa fa-download"></span></a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
