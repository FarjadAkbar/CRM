@extends('layouts.app')

@section('content')
<p class="mb-4">Please sign-in to your account and start the adventure</p>
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif


<form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
    @csrf
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
        <button class="btn btn-primary d-grid w-100" type="submit">Send Password Reset Link</button>
    </div>
</form>

@endsection
