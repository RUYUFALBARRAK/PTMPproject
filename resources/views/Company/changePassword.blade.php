@extends('layouts.layout')

@section('content')

    <img src="img/background_ksu2.png" alt="ksu" class="back">
    <div class="container-sm">
        <img src="img/learning.png" alt="ksu" class="learning" width="30%" hight="30%">
        <h3>Change Password</h3>
        <p>Email: {{ $data->email }}</p>
        <hr>

        @if(session('status'))
            <div class="my-2 alert alert-{{ session('theme') }}">{{ session('status') }}</div>
        @endif

        <form class="row g-3 needs-validation" action="{{ route('do_change_password', $data->token) }}" method="post" novalidate>
            @csrf
            <div class="textField has-validation">
                <label for="validationTooltip01" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="validationTooltip01" name="password" placeholder="Enter your password agin " value="{{ old('password') }}" required>
                <div class="invalid-feedback">
                    @error('password') {{ $message }} @enderror
                </div>
            </div>

            <div class="textField has-validation">
                <label for="validationTooltip02" class="form-label">Confirm password</label>
                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="validationTooltip02" name="confirm_password" placeholder="Enter your password agin " value="{{ old('confirm_password') }}" required>
                <div class="invalid-feedback">
                    @error('confirm_password') {{ $message }} @enderror
                </div>
            </div>

            <input type="hidden" name="email" value="{{ $data->email }}">

            <div class="col-12">
                <button class="add-but-login" type="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection
