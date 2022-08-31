@extends('layouts.app')


@section('content')
    {{-- <x-header title="Add SUbtask" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Create Project</h6>
            @permission('create-project')
                <a href="{{ route('project.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
            @endpermission
        </div>
        <div class="card-body">
            <form id="formAuthentication" class="mb-3" action="{{ route('project.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <input name="cost" type="hidden" value="{{  $invoice->currencies->sign . $invoice->amount }}" readonly/>
                    <input name="client" type="hidden"  value="{{ $invoice->clients->id }}" readonly/>
                    <input name="breif_id" type="hidden"  value="{{ $id }}" readonly/>
                    <input name="breif_type" type="hidden"  value="{{ $name }}" readonly/>
                    <div class="col-md-6">
                        <x-input name="client_name" label="Client" type="text" value="{{ $invoice->user->name }}" readonly/>
                    </div>
                    <div class="col-md-6">
                        <x-select name="category[]" label="Category" :collection="$category" multiple="multiple"/>
                    </div>
                    
                    <div class="col-md-6">
                        <x-input name="name" label="Name" type="text" value="{{ old('name') }}" placeholder="Name" />
                    </div>
                    <div class="col-md-6">
                        <x-select name="status" label="Status" :collection="$status"/>
                    </div>

                    <div class="col-md-12">
                        <x-textarea name="description" label="Description"
                            placeholder="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, accusamus?">
                        </x-textarea>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

    @endsection

