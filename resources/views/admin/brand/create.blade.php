@extends('layouts.app')


@section('content')
{{-- <x-header title="Add Brand" description="lorem ipsum" /> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Create Brand</h6>
        <a href="{{ route('brand.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <div class="card-body">
        <form id="formAuthentication" class="mb-3" action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <x-input name="name" label="Name" type="text" placeholder="John" value="{{  old('name')  }}"  />
                </div>
                <div class="col-md-4">
                    <x-input name="url" label="Url" type="url" placeholder="https://randallwilk.dev/" value="{{  old('url')  }}" />
                </div>
                <div class="col-md-4">
                    <x-input name="logo" label="Logo" type="file" value="{{  old('logo')  }}" />
                </div>
                
                <div class="col-md-4">
                    <x-input name="email" label="Email Address" type="email" placeholder="john@doe.com" value="{{  old('email')  }}" />
                </div>
                <div class="col-md-4">
                    <x-input name="phone" label="Phone" type="tel" placeholder="2980909203" value="{{  old('phone')  }}" />
                </div>
                <div class="col-md-4">
                    <x-input name="tel" label="Tel" type="tel" placeholder="2980909203" value="{{  old('tel')  }}" />
                </div>
                
                <div class="col-md-4">
                    <x-input name="address" label="Address" type="text" placeholder="Street 200 USA" value="{{  old('address')  }}" />
                </div>
                
                <div class="col-md-4">
                    <x-input name="address_link" label="Address" type="url" placeholder="https://randallwilk.dev/" value="{{  old('address_link')  }}" />
                </div>

                <div class="col-md-4">
                    <x-select name="status" label="Status" :collection="$status"  />
                </div>

                
                <div class="col-md-12">
                    <x-select name="user[]" label="User" :collection="$users" multiple="multiple" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

@endsection