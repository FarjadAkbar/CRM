@extends('layouts.app')


@section('content')
{{-- <x-header title="{{ $model ? "Edit $type" : "New $type"}}" description="" /> --}}
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">{{ $model ? "Edit $type" : "New $type"}} Form</h6>
      <a href="{{route("laratrust.{$type}s.index")}}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
  </div>
  <div class="card-body">
      <form
        x-data="laratrustForm()"
        x-init="{!! $model ? '' : '$watch(\'displayName\', value => onChangeDisplayName(value))'!!}"
        method="POST"
        action="{{$model ? route("laratrust.{$type}s.update", $model->getKey()) : route("laratrust.{$type}s.store")}}"
      >
        @csrf
        @if ($model)
          @method('PUT')
        @endif
        <div class="form-row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="display_name" class="form-label">Name/Code</label>
              <input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="this-will-be-the-code-name" :value="name"  autocomplete="off" />
              @error('name')
                  <div class="alert alert-danger">{{ $message}} </div>
              @enderror
            </div>
              {{-- <x-input  name="display_name" label="Name/Code" type="text" placeholder="Edit user profile" value="{{$model->display_name ?? old('display_name')}}"  readonly autocomplete="off"/> --}}
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="display_name" class="form-label">Display Name</label>
              <input class="form-control @error('name') is-invalid @enderror" name="display_name" placeholder="Edit user profile" value="{{$model->display_name ?? old('display_name')}}" x-model="displayName" autocomplete="off" />
            </div>
          
            {{-- <x-input name="display_name" label="Display Name" type="text" placeholder="Edit user profile" value="{{$model->display_name ?? old('display_name')}}"  autocomplete="off"/> --}}
          </div>
          <div class="col-md-12">
            <x-text-area name="description" label="Description"  placeholder="Some description for the {{$type}}">{{$model->description ?? old('description')}}</x-text-area>
          </div>
          @if($type == 'role')
          <div class="col-md-12">
            <div class="mb-3">
              <label for="permission" class="form-label">Permissions</label>
              <select class="form-control @error('permissions') is-invalid @enderror" id="permissions"
                  name="permissions[]" autofocus=""  multiple="multiple">
                  @foreach ($permissions as $permission)
                      <option value="{{ $permission->getKey() }}" {{ $permission->assigned == $permission->getKey() ? "selected" : " " }}>{{$permission->display_name ?? $permission->name}}</option>
                  @endforeach
              </select>
          </div>
          </div>
        @endif
        </div>
        <button type="submit" class="btn btn-primary">{{ $model ? "Update $type" : "Create $type"}}</button>
      </form>
    </div>
  </div>
  <script>
    window.laratrustForm =  function() {
      return {
        displayName: '{{ $model->display_name ?? old('display_name') }}',
        name: '{{ $model->name ?? old('name') }}',
        toKebabCase(str) {
          return str &&
            str
              .match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
              .map(x => x.toLowerCase())
              .join('-')
              .trim();
        },
        onChangeDisplayName(value) {
          this.name = this.toKebabCase(value);
        }
      }
    }
  </script>
@endsection


