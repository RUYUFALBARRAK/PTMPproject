@extends('company.mainPage')

@section('content-training')
    <div class="content">
        @if(count($download) > 0)
        <table class="table-balqees">
            <tr>
                <th colspan="2" class="th-balqees">Documents Template</th>
            </tr>
            @foreach($download as $download)
                <tr>
                    <td class="fist-col td-balqees">{{ $download->documentName }}</td>
                    <td class="td-balqees"><a href="{{ $download->getDocumentURL() }}"><span class="fa fa-download"></span></a></td>
                </tr>
            @endforeach
        </table>
        @else
            <div class="not-found">
                <img src="{{asset('img/paper.png')}}" alt="no doc" class="logoCompany"><br><hr>
                <p>There are no documents available now.</p>
            </div>
        @endif
    </div>
@endsection
