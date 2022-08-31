@extends('layouts.app')


@section('content')
{{-- <x-header title="Add Package" description="lorem ipsum" /> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Create Package</h6>
        <a href="{{ route('package.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <div class="card-body">
        <form id="formAuthentication" class="mb-3" action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <x-input name="name" label="Name" type="text" placeholder="Pro Pack" value="{{  old('name')  }}"  />
                </div>
                
                <div class="col-md-4">
                    <x-select name="currency" label="Currency" :collection="$currency"  />
                </div>
                <div class="col-md-4">
                    <x-input name="price" label="Price" type="number" min="0" placeholder="1000" value="{{  old('price')  }}" />
                </div>
                <div class="col-md-4">
                    <x-input name="detail" label="Detail" type="text"  placeholder="Nullam sed euismod mauris. In volutpat cursus sollicitudin" value="{{  old('detail')  }}" />
                </div>
                
                <div class="col-md-4">
                    <x-input name="addon" label="Addon" type="text"  placeholder="Nullam sed euismod mauris. In volutpat cursus sollicitudin" value="{{  old('addon')  }}" />
                </div>

                <div class="col-md-4">
                    <x-input name="description" label="Description" type="text"  placeholder="Nullam sed euismod mauris. In volutpat cursus sollicitudin" value="{{  old('description')  }}" />
                </div>

                
                <div class="col-md-4">
                    <x-select name="brand" label="Brand" :collection="$brand"  />
                </div>
                
                <div class="col-md-4">
                    <x-select name="service" label="Service" :collection="$service"  />
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