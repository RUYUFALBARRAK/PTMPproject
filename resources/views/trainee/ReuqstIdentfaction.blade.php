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
      
    </div>
</div>


@endsection