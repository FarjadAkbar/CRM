@extends('layouts.app')


@section('content')
    {{-- <x-header title="Add Task" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Create Task</h6>
            @permission('create-task')
                <a href="{{ route('task.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
            @endpermission
        </div>
        <div class="card-body">
            <form id="formAuthentication" class="mb-3" action="{{ route('task.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    @if (isset($id) != '')
                        <div class="col-md-6">
                            <input name="project_id" type="hidden" value="{{ $project->id }}" />
                            <x-input name="name" label="Name" type="text" placeholder="Mc-WEBSITE"
                                value="{{ $project->name }}" readonly />
                        </div>

                        <div class="col-md-6">
                            <input name="brand_id" type="hidden" value="{{ $project->brand_id }}" />
                            <x-input name="brand" label="Brand" type="text" placeholder="KFC"
                                value="{{ $project->brand->name }}" readonly />
                        </div>
                    @else
                        <div class="col-md-6">
                            <x-select name="project_id" label="Projects" :collection="$project" />
                        </div>
                    @endif


                    <div class="col-md-6">
                        <x-select name="category" label="Category" :collection="$project->project_category" />
                    </div>


                    <div class="col-md-6">
                        <x-input name="due_date" label="Due Date" type="date" value="{{ old('due_date') }}" />
                    </div>


                    <div class="col-md-12">
                        <x-textarea name="description" label="Description"
                            placeholder="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, accusamus?">
                        </x-textarea>
                    </div>

                    <div class="col-md-12">
                        <x-input name="files[]" id="inputImage" label="Upload File" type="file" multiple />
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

    <script>
        // Create a new list item when clicking on the "Add" button
        // $(document).ready( function() {


        // });
    </script>
@endsection
