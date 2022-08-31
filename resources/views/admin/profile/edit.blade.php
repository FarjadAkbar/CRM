@extends('layouts.app')

@section('content')
    {{-- <x-header title="Edit Clients" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
            <a href="{{ route('profile.index', auth()->user()->id) }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form id="formAuthentication" class="mb-3" action="{{ route('profile.update', auth()->user()->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-6">
                        <x-input name="name" label="User Name" type="text" placeholder="John" value="{{  auth()->user()->name  }}"  />
                    </div>
                    <div class="col-md-6">
                        <x-input name="email" label="Email" type="text" placeholder="user@example.com" value="{{  auth()->user()->email  }}" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="password" label="Password" type="password" placeholder=""  />
                    </div>
                    <div class="col-md-6">
                        <x-input name="confirm_password" label="Confirm Password" type="password" placeholder="" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
