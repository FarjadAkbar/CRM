@extends('layouts.app')


@section('content')
{{-- <x-header title="Edit Package" description="lorem ipsum" /> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Edit Package</h6>
        <a href="{{ route('package.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <div class="card-body">
        <form id="formAuthentication" class="mb-3" action="{{ route('package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-md-4">
                    <x-input name="name" label="Name" type="text" placeholder="Pro Pack" value="{{  $package->name  }}"  />
                </div>
                
                <div class="col-md-4">
                    <x-select name="currency" label="Currency" :collection="$currency" :selected="$package->currencies_id" />
                </div>
                <div class="col-md-4">
                    <x-input name="price" label="Price" type="number" min="0" placeholder="1000" value="{{  $package->price  }}" />
                </div>
                <div class="col-md-4">
                    <x-input name="detail" label="Detail" type="text"  placeholder="Nullam sed euismod mauris. In volutpat cursus sollicitudin" value="{{  $package->details  }}" />
                </div>
                
                <div class="col-md-4">
                    <x-input name="addon" label="Addon" type="text"  placeholder="Nullam sed euismod mauris. In volutpat cursus sollicitudin" value="{{  $package->addon }}" />
                </div>

                <div class="col-md-4">
                    <x-input name="description" label="Description" type="text"  placeholder="Nullam sed euismod mauris. In volutpat cursus sollicitudin" value="{{  $package->description  }}" />
                </div>

                
                <div class="col-md-4">
                    <x-select name="brand" label="Brand" :collection="$brand" :selected="$package->brand_id"  />
                </div>
                
                <div class="col-md-4">
                    <x-select name="service" label="Service" :collection="$service"  :selected="$package->service_id"  />
                </div>


                <div class="col-md-4">
                    <x-select name="status" label="Status" :collection="$status" :selected="$package->status"  />
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection