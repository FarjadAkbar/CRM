@extends('layouts.app')

@section('content')
    {{-- <x-header title="Project Edit" description="lorem ipsum" /> --}}

    <form id="formAuthentication" class="mb-3" action="{{ route('project.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">
            <div class="card-header py-2 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Edit Project</h6>
                <a href="{{ route('project.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <input name="cost" type="hidden" value="{{  $project->cost }}" readonly/>
                    <div class="col-md-6">
                        <x-select name="client" label="Client" :collection="$clients" :selected="$project->client_id"/>
                    </div>
                    <div class="col-md-6">
                        <x-select name="category[]" label="Category" :collection="$category" multiple="multiple"/>
                    </div>
                    

                    
                    
                    <div class="col-md-6">
                        <x-input name="name" label="Name" type="text" value="{{ $project->name }}" placeholder="Name" />
                    </div>
                    
                    <div class="col-md-6">
                        <x-select name="status" label="Status" :collection="$status" :selected="$project->status"/>
                    </div>

                    <div class="col-md-12">
                        <x-textarea name="description" label="Description"
                            placeholder="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, accusamus?">
                            {{ $project->description }}
                        </x-textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ">
                    Update
                </button>
            </div>
        </div>


    </form>
@endsection
