@extends('layouts.app')

@section('content')

    @extends('layouts.app')

@section('content')
    <p class="mb-4">Please sign-in to your account and start the adventure</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Enter your name or username" autofocus="">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Enter your email or username" autofocus="">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 form-password-toggle">
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="············" aria-describedby="password">
                {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="mb-3 form-password-toggle">
            <div class="input-group input-group-merge">
                <input type="password" id="new_password" class="form-control @error('password') is-invalid @enderror"
                    name="password_confirmation" placeholder="············" aria-describedby="password">
                {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
        </div>
    </form>

    <p class="text-center">
        <span>Already have an account?</span>
        <a href="{{ route('login') }}">
            <span>Sign In</span>
        </a>
    </p>
@endsection

@endsection
