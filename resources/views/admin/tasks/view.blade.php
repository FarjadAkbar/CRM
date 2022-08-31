@extends('layouts.app')


@section('content')
    {{-- <x-header title="Task Detail" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Task Detail</h6>
            {{-- <a href="{{ route('breif.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a> --}}
        </div>
        <div class="card-body">
            <h3><b>Task</b></h3>
            <hr>
            <table class="table table-bordered dataTable">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Brand</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->category->name }}</td>
                        <td>
                            <span
                                class="btn small {{ $task->status == '1' ? 'btn-success' : ($task->status == '2' ? 'btn-primary' : 'btn-danger') }}">
                                {{ $task->status == '1' ? 'Complete' : ($task->status == '2' ? 'Re-Open' : 'Open') }}
                            </span>
                        </td>
                        <td>{{ $task->user->name }}</td>
                        <td><span class="btn btn-blue">{{ $task->brand->name }}</span></td>
                        <td>{{ $task->duedate }}</td>
                    </tr>
                </tbody>
            </table>
            <x-breifview label="Files">
                @foreach ($task->clientfilesall as $file)
                    {{-- <div class="d"> --}}
                    <a href="{{ url('files/' . $file->name) }}" class="btn btn-success" alt="{{ $file->name }}"
                        download>Download</a>
                    {{-- </div> --}}
                @endforeach
            </x-breifview>

            @if (count($task->subtask) > 0)
                <h3><b>Sub Task</b></h3>
                <hr>
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <td>Description</td>
                            <td>Added By</td>
                            <td>Due Date</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($task->subtask as $subtask)
                            <tr>
                                <td>{{ $subtask->description }}</td>
                                <td>{{ $subtask->user->name }}</td>
                                <td>{{ $subtask->duedate }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
