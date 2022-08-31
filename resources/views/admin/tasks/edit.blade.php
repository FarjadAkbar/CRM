@extends('layouts.app')


@section('content')
    {{-- <x-header title="Edit Task" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Edit Task</h6>
            <a href="{{ route('task.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form id="formAuthentication" class="mb-3" action="{{ route('task.update', $task->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-6">
                        <x-input name="name" label="Name" type="text" placeholder="Mc-WEBSITE"
                            value="{{ $task->project->name }}" readonly />
                    </div>

                    <div class="col-md-6">
                        <input name="brand_id" type="hidden" value="{{ $task->project->brand_id }}" />
                        <x-input name="brand" label="Brand" type="text" placeholder="KFC"
                            value="{{ $task->project->brand->name }}" readonly />
                    </div>

                    <div class="col-md-4">
                        <x-select name="category" label="Category" :collection="$category" :selected="$task->category_id" />
                    </div>


                    <div class="col-md-4">
                        <x-input name="due_date" label="Due Date" type="date" value="{{ $task->duedate }}" />
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status"
                                autofocus="">
                                <option value="1" {{ $task->status == '1' ? 'selected' : '' }}>Complete</option>
                                <option value="2" {{ $task->status == '2' ? 'selected' : '' }}>Re-Open</option>
                                <option value="0" {{ $task->status == '0' ? 'selected' : '' }}>Open</option>
                            </select>

                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <x-textarea name="description" label="Description"
                            placeholder="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, accusamus?">
                            {{ $task->description }}</x-textarea>
                    </div>

                    <div class="col-md-12">
                        <x-input name="files[]" id="inputImage" label="Upload File" type="file" multiple />
                    </div>
                    <div class="col-md-12 mb-3">
                        @foreach ($task->clientfilesall as $file)
                            {{-- <div class="d"> --}}
                            <a href="{{ url('files/' . $file->name) }}" class="btn btn-light" alt="{{ $file->name }}"
                                download>Download</a>
                            {{-- </div> --}}
                        @endforeach
                    </div>   
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    </div>
@endsection
