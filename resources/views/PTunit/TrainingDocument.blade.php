@extends('PTunit.mainPage')


@section('content-training')
    <div class="content">

        @if(session('status'))
        <div class="alert alert-{{ session('theme') }}">
            {{ session('status') }}
        </div>
        @endif

        <h2>Uplouded document</h2>
        <table class="table-balqees">
            <tr>
                <th class="fist-column th-balqees">File name</th>
                <th class="th-balqees">Date of added</th>
                <th class="th-balqees">For</th>
                <th class="th-balqees">Delete</th>
            </tr>
            @foreach($docs as $doc)
            <tr>
                <td class="fist-column td-balqees"><a href="{{ $doc->getDocumentURL() }}">{{ $doc->documentName }}</a></td>
                <td class="td-balqees">{{ $doc->created_at }}</td>
                <td class="td-balqees">{{ $doc->uploaded_for }}</td>
                <td class="td-balqees">
                    <form action="{{ route('delete_doc') }}" method="post">
                        @csrf
                        <input type="hidden" name="delete_doc" value="1">
                        <input type="hidden" name="doc_id" value="{{ $doc->id }}">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <br><br>
        <hr>
        <h3>Uploud new document</h3>
        <hr>
        <div class="warp">
            <form method="POST" action="{{ route('upload_doc') }}" enctype="multipart/form-data" id="upload-doc-form">
                @csrf

                <div class="has-validation">
                    <div class="form1" id="upload_file_clickable" onclick="document.querySelector('[name=uploudedfile]').click()">
                        <input type="file" name="uploudedfile" class="PTuploadedfile" hidden>
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Browse file to upload</p>
                    </div>
                </div>
                <div class="invalid-feedback" id="upload_file__err_msg"></div>

                <section class="prograss-area" style="display: none">
                    <div class="row">
                        <i class="fas fa-file-alt"></i>
                        <div class="cont">
                            <div class="detal">
                                <span class="name">filename</span>
                                <span class="precent">0</span>
                            </div>
                            <div class="prog-bar">
                                <div class="prog"></div>
                            </div>
                        </div>
                    </div>
                </section>

                <section style="display: none" id="file-success-block">
                    <div class="alert fs-2 file-text"></div>
                </section>

                <div class="file-state">
                    <label for="validationTooltip01" class="form-label">File uploaded for :* </label>
                    <div class="form-group col-md-2 has-validation">
                        <select id="inputState" class="form-select" name="doc_to">
                            <option :value="null" selected disabled>For..</option>
                            <option value="company">company</option>
                            <option value="trainee">trainee</option>
                            <option value="both">both</option>
                        </select>
                    </div>
                </div>
                <div class="invalid-feedback" id="doc_to__err_msg"></div>

                <!-- <a href="#" class="link2">Upload new file:<span class="glyphicon glyphicon-upload"></span></a> -->
                <button class="add-but-center" type="submit">Upload new file</button>
            </form>
        </div>
    </div>


    <script>
        var uploaded_filename = '';
        function resetInfo(show = false) {
            $('.prog-bar').css('display', (show ? 'block' : 'none'));
            $('.detal .precent').css('display', (show ? 'block' : 'none'));
        }
        function updateFileInfo(filename, percentage) {
            $('.detal .name').text(filename);
            $('.prog-bar .prog').css("width", percentage);
            $('.detal .precent').text(percentage);
        }
        $(function () {
            $(document).ready(function () {
                $('[name=uploudedfile]').on('change', (ev) => {
                    $('#file-success-block').hide();
                    resetInfo();
                    const files = ev.target.files;
                    console.log(files);
                    if(files) {
                        uploaded_filename = files[0].name;
                        $('.prograss-area').css('display', 'block');
                        updateFileInfo(uploaded_filename, '0%');
                        $('#upload_file__err_msg').text('');
                        $('#upload_file_clickable').removeClass('is-invalid');
                    }
                });
                $('#upload-doc-form').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                        $('#doc_to__err_msg').text('');
                        $('[name=doc_to]').removeClass('is-invalid');
                        $('#upload_file__err_msg').text('');
                        $('#upload_file_clickable').removeClass('is-invalid');
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        resetInfo(true);
                        var percentage = percentComplete;
                        var per = percentage+'%';
                        updateFileInfo(uploaded_filename, per);
                    },
                    complete: function (xhr) {
                        const res = xhr.responseJSON;
                        console.log(res);
                        resetInfo(false);
                        $('.prograss-area').hide();
                        $('#file-success-block').show();
                        $('#file-success-block .file-text').removeClass('alert-danger').removeClass('alert-success').addClass('alert-'+res.theme).html(res.message);
                        document.querySelector('[name=uploudedfile]').value = null;
                    },
                    error: function (xhr) {
                        const res = xhr.responseJSON;
                        console.log('err', xhr);
                        Array.from(res.message).forEach(msg => {
                            if(msg.includes('doc to') || msg.includes('doc_to')) {
                                $('[name=doc_to]').addClass('is-invalid');
                                $('#doc_to__err_msg').text(msg);
                            } else if(msg.includes('uploudedfile')) {
                                $('#upload_file_clickable').addClass('is-invalid');
                                $('#upload_file__err_msg').text(msg);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
