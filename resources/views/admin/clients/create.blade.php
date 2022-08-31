@extends('layouts.app')

@section('content')
    {{-- <x-header title="Add Clients" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Create Client</h6>
            <a href="{{ route('clients.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form id="formAuthentication" class="mb-3" action="{{ route('clients.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-4">
                        <x-input name="first_name" label="First Name" type="text" placeholder="John" value="{{  old('first_name')  }}"  />
                    </div>
                    <div class="col-md-4">
                        <x-input name="last_name" label="Last Name" type="text" placeholder="Doe" value="{{  old('last_name')  }}" />
                    </div>
                    <div class="col-md-4">
                        <x-input name="email" label="Email Address" type="email" placeholder="john@doe.com" value="{{  old('email')  }}" />
                    </div>
                    <div class="col-md-4">
                        <x-input name="contact" label="Contact Number" type="tel" placeholder="2980909203" value="{{  old('contact')  }}" />
                    </div>
                    <div class="col-md-4">
                        <x-select name="brand" label="Brand" :collection="$brands" />
                    </div>

                    <div class="col-md-4">
                        <x-select name="status" label="Status" :collection="$status"  />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
