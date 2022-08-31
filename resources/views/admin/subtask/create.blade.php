@extends('layouts.app')


@section('content')
    {{-- <x-header title="Add SUbtask" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Create Subtask</h6>
            @permission('create-subtask')
                <a href="{{ route('subtask.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
            @endpermission
        </div>
        <div class="card-body">
            <form id="formAuthentication" class="mb-3" action="{{ route('subtask.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-row">

                    <div class="col-md-6">
                        <x-select name="user" label="Assign To" :collection="$users" />
                    </div>
                    <input type="hidden" name="task" value="{{$id}}">
                    <div class="col-md-6">
                        <x-input name="due_date" label="Due Date" type="date" value="{{ old('due_date') }}" />
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
