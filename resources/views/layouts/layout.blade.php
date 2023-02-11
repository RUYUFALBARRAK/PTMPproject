<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>practical training management portal </title>

    <!-- Fonts -->

    <!-- Bootstrap old version
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

        <link rel="icon" type="image/png" href="{{ asset('img/learning.png') }}">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bushra.css') }}" rel="stylesheet">
        <link href="{{ asset('css/Razan.css') }}" rel="stylesheet">
        <link href="{{ asset('css/media.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/58f913c205.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
{{--  TODO:      <script src="assets/js/main.js"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>

    <body class="antialiased">
        @include('sweetalert::alert')

    </style>



 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <h1 style=" text-indent:30%;" class="modal-title fs-5" id="exampleModalLabel"> <b style="font-size:130%;"> Are you sure? </b> </h1>
      <div class="modal-body" style="text-align: center; font-size:120%;">
      Do you really want to delete your feedback? This proccess cannot be undone
      </div>
    <form action="/traineeMainPage" method="POST">
    @csrf
    @method('DELETE')
    <button  data-bs-dismiss="modal" class="del-msg">Delete</button>
    <button type="button" class="can-but" data-bs-dismiss="modal">Cancel</button>
    </form>
    </div>
        </div>
        </div>
    <!-- view announcement modal -->
    <div class="modal fade" id="view_announcement_modal" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-title d-flex flex-row pt-4">
                    <div style="flex: 1 0;"></div>
                    <h1 class="fs-4 pt-0" id="view_announcement_modal__title"></h1>
                    <div style="flex: 1 0;"></div>
                    <button type="button" class="btn btn-outline-dark mx-3" data-bs-dismiss="modal">X</button>
                </div>
                <hr>
                <div class="modal-body" style="text-align: center; font-size:120%;" id="view_announcement_modal__content"></div>
            </div>
        </div>
    </div>

    <!-- send invatiton modal -->
    <div class="modal fade" id="view_invait_modal" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-title">
                    <h2 style="padding:10px; text-align: center;" id="invation">Invite a company</h2>
                    <hr>
                </div>
                <div class="modal-body">
                    <form action=" {{ route('invationcompany')}}" method="post">
                        @csrf
                        <div><input type="email" placeholder="Enter company email" class="form-control  @error('InvaitEmail') is-invalid @enderror" name="InvaitEmail" id="InvaitEmail"></div>
                        @if ($errors->has('InvaitEmail'))
                        <span class="text-danger">{{ $errors->first('InvaitEmail') }}</span>
                        @endif

                        <br><hr>
                    <button type="submit" class="ok-but">submit</button>
                 </form>
                </div>
            </div>
        </div>
    </div>


    <!-- File deleted success message -->
    <div class="modal fade" id="file_uploaded_success" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="{{ asset('img/check.png') }}" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"> </h1>
                <div class="modal-body" style="text-align: center; font-size:120%;" id="file_uploaded_success__text"></div>
                <button type="button" class="ok-but" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="file_uploaded_error" tabindex="-1" aria-labelledby="error" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="{{ asset('img/Xicon.png') }}" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"> </h1>
                <div class="modal-body" style="text-align:center; font-size:120%;" id="file_uploaded_error__text"></div>
                <button type="button" class="del-msg" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
    <!--delete company-->

 <div class="modal fade" id="Delete_company_Modal" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <h1 style=" text-indent:30%;" class="modal-title fs-5" id="deleteComp"> <b style="font-size:130%;"> Are you sure? </b> </h1>
      <div class="modal-body" style="text-align: center; font-size:120%;">
      This Company have Opportinity Are you Sure you Want to Delete it ? This proccess cannot be undo
      </div>
    <form action="/traineeMainPage" method="POST">
    @csrf
    @method('DELETE')
    <button  data-bs-dismiss="modal" class="del-msg">Delete</button>
    <button type="button" class="can-but" data-bs-dismiss="modal">Cancel</button>
    </form>
    </div>
  </div>
</div>
    <!-- File Deletion Confirmation modal-->
    <div class="modal fade" id="confirm_delete_file" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="img/check.png" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"></h1>--}}
                <div class="modal-body" style="text-align: center; font-size:120%;">
                    Are you sure you want to delete this file?
                </div>
                <div class="d-flex flex-row justify-content-center">
                    <form action="{{ route('delete_doc') }}" method="post" class="d-inline-block col-4 mx-2">
                        @csrf
                        <input type="hidden" name="delete_doc" value="1">
                        <input type="hidden" name="doc_id" id="delete_doc_confirmation_id" value="0">
                        <button type="submit" class="ok-but2 col-12">Yes</button>
                    </form>
                    <button type="button" class="del-msg2 col-4 mx-2" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Announcement Deletion Confirmation modal-->
    <div class="modal fade" id="confirm_delete_announcement" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" style="text-align: center; font-size:120%;">
                    Are you sure you want to delete this announcement?
                </div>
                <div class="d-flex flex-row justify-content-center">
                    <form action="{{ route('delete_announcement') }}" method="post" class="d-inline-block col-4 mx-2">
                        @csrf
                        <input type="hidden" name="delete_ann" value="1">
                        <input type="hidden" name="announcement_id" id="confirm_delete_announcement__id" value="0">
                        <button type="submit" class="ok-but2 col-12">Yes</button>
                    </form>
                    <button type="button" class="del-msg2 col-4 mx-2" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Error modal-->

    <div class="modal fade" id="error" tabindex="-1" aria-labelledby="error" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="{{ asset('img/Xicon.png') }}" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"> </h1>

                <div class="modal-body" style="text-align:center; font-size:120%;">
                    Your feedback can't be submitted <br>
                    <span style="color:rgb(139, 137, 137); font-size:90%; margin-top: -10%;"> Make sure all required fields are filled</span>
                </div>

                <button type="button" class="del-msg" data-bs-dismiss="modal">OK</button>

            </div>
        </div>
    </div>

    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>

    <div class=heder>
        <img src="{{ asset('img/ksu_logo.png') }}" alt="Ksu logo" width="5%" height="90%" class="ksuLogo">
        <p>KSU | CCIS <br> Practical Training Management Portal </p>
    </div>

  </div>
</div>

      <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>

    <div class= heder>
      <img src="{{ asset('img/ksu_logo.png') }}" alt="Ksu logo" width="5%" height="90%" class="ksuLogo">
          <p>KSU | CCIS <br> Practical Training Management Portal </p>
     </div>
    @if(Session::has('loginId')||Session::has('logincompId')||Session::has('logincommiteeId')||Session::has('loginunitId'))
         <a href="/logout"> <span class="fa fa-sign-out"> Log out</span>  </a>
    @endif
    @yield('content')

</body>

<script>
    function openAnnouncement(title, content) {
        $('#view_announcement_modal__title').text(title);
        $('#view_announcement_modal__content').text(content);
        $('#view_announcement_modal').modal('show');
    }

</script>
@yield("js")
</html>
