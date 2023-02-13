@extends('layouts.layout')

@section('content')

    <img src="{{asset('img/background_ksu2.png')}}" alt="ksu" class="back">
    <div class="container-sm">
        <img src="{{asset('img/learning.png')}}" alt="ksu" class="learning" width="30%" hight="30%">
        <h3>Forget Password</h3>
        <hr>
        @if(session('status'))
            <div class="my-2 alert alert-{{ session('theme') }}">{{ session('status') }}</div>
        @endif
        <form class="row g-3 needs-validation" method="post" action="{{ route('do_forget_password') }}" novalidate>
            @csrf
            <div class="textField has-validation">
                <label for="validationTooltip01" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="validationTooltip01" name="email" placeholder="Enter your email  " value="{{ old('email') }}" required>
                <div class="invalid-feedback">
                    @error('email') {{ $message }} @enderror
                </div>
            </div>

            <div class="textField has-validation">
                <label for="validationTooltip02" class="form-label">Confirm email</label>
                <input type="email" class="form-control @error('confirm_email') is-invalid @enderror" id="validationTooltip02" name="confirm_email" placeholder="Enter your email agin " value="{{ old('confirm_email') }}" required>
                <div class="invalid-feedback">
                    @error('confirm_email') {{ $message }} @enderror
                </div>
            </div>

            <div class="col-12">
                <button class="add-but-login" type="submit">Send Email</button>
            </div>

            <p>Are you A company and you don’t have an account? <a class="link" href="registerCompany">Sign up</a></p>
            <p>Are you A company and you already have an account? <a class="link" href="loginCompany">Sign in</a></p>
            <p>Are you a Student or KSU Staff ? <a class="link" href="login">Sign In</a></p>
        </form>
    </div>

@endsection
