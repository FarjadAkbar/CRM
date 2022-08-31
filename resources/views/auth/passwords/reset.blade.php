@extends('layouts.app')

@section('content')
<p class="mb-4">Please sign-in to your account and start the adventure</p>

<form id="formAuthentication" class="mb-3" action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            placeholder="Enter your email or username" autofocus="" required>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
            placeholder="Enter password" autofocus="" required>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password-confirm" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
            placeholder="Enter Confirm Password" autofocus="" required>

    </div>

    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Reset Password</button>
    </div>
</form>

@endsection
