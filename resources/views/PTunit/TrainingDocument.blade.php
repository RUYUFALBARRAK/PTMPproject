@extends('PTunit.mainPage')


@section('content-training')
    <div class="content">

        @if(session('status'))
        <div class="alert alert-{{ session('theme') }}">
            {{ session('status') }}
        </div>
        @endif

{{--        <h2>Uplouded document</h2>--}}
{{--        <table class="table-balqees">--}}
{{--            <tr>--}}
{{--                <th class="fist-column th-balqees">File name</th>--}}
{{--                <th class="th-balqees">Date of added</th>--}}
{{--                <th class="th-balqees">For</th>--}}
{{--                <th class="th-balqees">Delete</th>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="fist-column td-balqees"><a href=#>AttendanceDocument.docx </a></td>--}}
{{--                <td class="td-balqees">20/10/2022</td>--}}
{{--                <td class="td-balqees">Company</td>--}}
{{--                <td class="td-balqees">--}}
{{--                    <button type="button" class="btn btn-outline-danger">Delete</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="fist-column td-balqees"><a href=#>FollowupDocument.docx </a></td>--}}
{{--                <td class="td-balqees">25/10/2022</td>--}}
{{--                <td class="td-balqees">Company</td>--}}
{{--                <td class="td-balqees">--}}
{{--                    <button type="button" class="btn btn-outline-danger">Delete</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="fist-column td-balqees"><a href=#>EvaluationDocument.docx </a></td>--}}
{{--                <td class="td-balqees">25/10/2022</td>--}}
{{--                <td class="td-balqees">Company</td>--}}
{{--                <td class="td-balqees">--}}
{{--                    <button type="button" class="btn btn-outline-danger">Delete</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="fist-column td-balqees"><a href=#>EmployeeFeedback.docx </a></td>--}}
{{--                <td class="td-balqees">25/10/2022</td>--}}
{{--                <td class="td-balqees">Company</td>--}}
{{--                <td class="td-balqees">--}}
{{--                    <button type="button" class="btn btn-outline-danger">Delete</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="fist-column td-balqees"><a href=#>Trainee survey.docx </a></td>--}}
{{--                <td class="td-balqees">27/10/2022</td>--}}
{{--                <td class="td-balqees">Student</td>--}}
{{--                <td class="td-balqees">--}}
{{--                    <button type="button" class="btn btn-outline-danger">Delete</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="fist-column td-balqees"><a href=#>EffectiveDateNotice.docx </a></td>--}}
{{--                <td class="td-balqees">27/10/2022</td>--}}
{{--                <td class="td-balqees">Student</td>--}}
{{--                <td class="td-balqees">--}}
{{--                    <button type="button" class="btn btn-outline-danger">Delete</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        </table>--}}
        <br><br>
        <hr>
        <h3>Uploud new document</h3>
        <hr>
        <div class="warp">
            <form method="POST" action="{{ route('upload_doc') }}" enctype="multipart/form-data" id="upload-doc-form">
                @csrf

                <div class="form1" onclick="document.querySelector('[name=uploudedfile]').click()">
                    <input type="file" name="uploudedfile" class="PTuploadedfile" hidden>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Browse file to upload</p>
                </div>

                @error('uploudedfile')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <section class="prograss-area" style="display: none">
                    <div class="row">
                        <i class="fas fa-file-alt"></i>
                        <div class="cont">
                            <div class="detal">
                                <span class="name">s</span>
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
                    <div class="form-group col-md-2">
                        <select id="inputState" class="form-select" name="doc_to">
                            <option selected disabled>For..</option>
                            <option value="company">company</option>
                            <option value="trainee">trainee</option>
                            <option value="both">both</option>
                        </select>
                    </div>
                </div>
                @error('doc_to')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <!-- <a href="#" class="link2">Upload new file:<span class="glyphicon glyphicon-upload"></span></a> -->
                <button class="add-but-center" type="submit">Upload new file</button>
            </form>
        </div>
    </div>


    <script>
        let filename = '';
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
                        filename = files[0].name;
                        $('.prograss-area').css('display', 'block');
                        updateFileInfo(filename, '0%');
                    }
                });
                $('#upload-doc-form').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        resetInfo(true);
                        var percentage = percentComplete;
                        var per = percentage+'%';
                        updateFileInfo(filename, per);
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
                });
            });
        });
    </script>
@endsection
