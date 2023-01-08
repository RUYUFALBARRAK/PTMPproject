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

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/bushra.css" rel="stylesheet">
        <link href="css/Razan.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/58f913c205.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
{{--  TODO:      <script src="assets/js/main.js"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>

    <body class="antialiased">


    <!-- Confirmation modal-->

    <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="img/check.png" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"> </h1>

      <div class="modal-body" style="text-align: center; font-size:120%;">
        Your feedback was submitted successfully
      </div>

       <a href="#"> <button type="button" class="ok-but">OK</button> </a>

    </div>
  </div>
</div>


    <!-- File deleted success message -->
    <div class="modal fade" id="file_uploaded_success" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="img/check.png" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"> </h1>
                <div class="modal-body" style="text-align: center; font-size:120%;" id="file_uploaded_success__text"></div>
                <button type="button" class="ok-but" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="file_uploaded_error" tabindex="-1" aria-labelledby="error" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="img/Xicon.png" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"> </h1>
                <div class="modal-body" style="text-align:center; font-size:120%;" id="file_uploaded_error__text"></div>
                <button type="button" class="del-msg" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>

    <!-- File Deletion Confirmation modal-->
    <div class="modal fade" id="confirm_delete_file" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="img/check.png" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"></h1>
                <div class="modal-body" style="text-align: center; font-size:120%;">
                    Are you sure you want to delete this file?
                </div>
                <form action="{{ route('delete_doc') }}" method="post">
                    @csrf
                    <input type="hidden" name="delete_doc" value="1">
                    <input type="hidden" name="doc_id" id="delete_doc_confirmation_id" value="0">
                    <button type="submit" class="ok-but">Yes</button>
                </form>
                <button type="button" class="del-msg" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>


<!-- Error modal-->

<div class="modal fade" id="error" tabindex="-1" aria-labelledby="error" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="img/Xicon.png" alt="Confirmation" width="18%" height="18%" style="margin-left:40%; margin-top:-5%;"> </h1>

      <div class="modal-body" style="text-align:center; font-size:120%;">
        Your feedback can't be submitted <br>
        <span style="color:rgb(139, 137, 137); font-size:90%; margin-top: -10%;"> Make sure all required fields are filled</span>
      </div>

        <button type="button" class="del-msg" data-bs-dismiss="modal">OK</button>

    </div>
  </div>
</div>

      <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    <div class= heder>
      <img src="img/ksu_logo.png" alt="Ksu logo" width="5%" height="90%" class="ksuLogo">
          <p>KSU <br> Practical Training Management Portal </p>
     </div>
    @if(Session::has('loginId')||Session::has('logincompId'))
         <a href="/logout"> <span class="fa fa-sign-out"> Log out</span>  </a>
    @endif
    @yield('content')
    </body>
</html>
