<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<div class="content">
<table class="table-balqees">
    <tr>
        <th style="text-align: center;" class="th-khawlah">Identification letter</th> <th class="th-khawlah"></th>
    </tr>

  
<tr>

<td class ="fist-col-khawlah td-balqees"><a href="#" style="color:grey; font-size:20px;">View Identification letter<a href=<span style="font-size:20px;"class="fa fa-download"></span></td>
</tr>
    <!--
    <tr>
        <td class="fist-col-khawlah td-khawlah"><button type="button" class="Identification-req-but" > Requst identification letter </button>
</td>

<td  style="text-align: center;" class="td-balqees-link"> <a href="#" style="color:grey">View Identification letter<a> <a href=<span class="fa fa-download"></span></td>
  
    </tr>
    <tr>
        <td class ="fist-col-khawlah td-balqees">uploaded file:</td>
        <td style="text-align: center;" class="td-balqees-link"> <a href="#" >Upload Identification letter<a> <a href=<span class="fa fa-upload" style="font-size:16px;"></span></td>
</td>

    </tr>
    <tr>
    <td class ="fist-col-khawlah td-balqees"></td>
    <td class=" td-balqees"><button type="button" class="Identification-req-but" > Submit </button></td>
!-->



</table>
<form action="{{ route('upload_regulation') }}" enctype="multipart/form-data" method="POST" id="upload-doc-form">>

<h3 style="margin-top:5%;">Uploud regulation</h3>
        <hr>
        <div class="warp">
         
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

{{--                <section style="display: none" id="file-success-block">--}}
{{--                    <div class="alert fs-2 file-text"></div>--}}
{{--                </section>--}}

              
                </div>
                <div class="invalid-feedback" id="doc_to__err_msg"></div>

                <!-- <a href="#" class="link2">Upload new file:<span class="glyphicon glyphicon-upload"></span></a> -->
                <button class="add-but-center" type="submit">submit</button>
            
        </div>
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
                    // $('#file-success-block').hide();
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
                        // $('#file-success-block').show();
                        // $('#file-success-block .file-text').removeClass('alert-danger').removeClass('alert-success').addClass('alert-'+res.theme).html(res.message);
                        document.querySelector('[name=uploudedfile]').value = null;
                    },
                    success: function (res) {
                        $('#file_uploaded_success').modal('show');
                        $('#file_uploaded_success__text').text(res.message);
                        // setTimeout(() => {
                        //     $('#file-success-block').hide();
                        // }, 1);
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
                        $('#file_uploaded_error').modal('show');
                        $('#file_uploaded_error__text').text(res.message);
                        // setTimeout(() => {
                        //     $('#file-success-block').hide();
                        // }, 1);
                    }
                });
            });
        });
    </script>
@endsection