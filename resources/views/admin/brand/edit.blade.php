@extends('layouts.app')


@section('content')
{{-- <x-header title="Edit Brand" description="lorem ipsum" /> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Edit Brand</h6>
        <a href="{{ route('brand.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <div class="card-body">
        <form id="formAuthentication" class="mb-3" action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-md-4">
                    <x-input name="name" label="Name" type="text" placeholder="John" value="{{  $brand->name  }}"  />
                </div>
                <div class="col-md-4">
                    <x-input name="url" label="Url" type="url" placeholder="https://randallwilk.dev/" value="{{  $brand->url  }}" />
                </div>
                <div class="col-md-4">
                    <x-input name="logo" label="Logo" type="file" value="{{  old('logo')  }}" />
                </div>
                
                <div class="col-md-4">
                    <x-input name="email" label="Email Address" type="email" placeholder="john@doe.com" value="{{  $brand->email  }}" />
                </div>
                <div class="col-md-4">
                    <x-input name="phone" label="Phone" type="tel" placeholder="2980909203" value="{{  $brand->phone  }}" />
                </div>
                <div class="col-md-4">
                    <x-input name="tel" label="Tel" type="tel" placeholder="2980909203" value="{{  $brand->phone_tel  }}" />
                </div>
                
                <div class="col-md-4">
                    <x-input name="address" label="Address" type="text" placeholder="Street 200 USA" value="{{  $brand->address  }}" />
                </div>
                
                <div class="col-md-4">
                    <x-input name="address_link" label="Address" type="url" placeholder="https://randallwilk.dev/" value="{{  $brand->address_link  }}" />
                </div>

                <div class="col-md-4">
                    <x-select name="status" label="Status" :collection="$status" :selected="$brand->status"  />
                </div>


                     
                <div class="col-md-12 mb-4">
                    <label for="users" class="form-label">Assign To</label>                    
                    <select class="form-control" name="user[]" id="users">
                    @foreach ($users as $user)
                            <option value="{{$user->id }}"
                            @if (count($brand->users->pluck('id')) > 0))
                                @foreach ($brand->users->pluck('id') as $selecteduser)
                                {{ $selecteduser == $user->id ? 'selected' : '' }}
                                @endforeach
                            @endif    
                            >{{ $user->name }}</option>
                    @endforeach
                    </select>
                </div>

                <input type="hidden" name="previous_logo" value="{{ $brand->logo}}" />
                <div class="form-group col-md-2">
                    <img src="{{ url('image/'.$brand->logo) }}" class="img-thumbnail" alt="{{$brand->name}}"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection