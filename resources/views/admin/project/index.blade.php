@extends('layouts.app')

@section('content')
    {{-- <x-header title="Project" description="lorem ipsum" /> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Project List</h6>
            {{-- <a href="{{ route('project.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add New</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Brand</th>
                            <th>Amount</th>
                            <th>Status</th>
                            @if (Auth::user()->hasPermission(['messages-access', 'create-task', 'edit-project', 'show-brief']))
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Brand</th>
                            <th>Amount</th>
                            <th>Status</th>
                            @if (Auth::user()->hasPermission(['messages-access', 'create-task', 'edit-project', 'show-brief']))
                                <th>Action</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td class="text-capitalize">{{ $project->name }}</td>
                                <td>{{ $project->user->name }}<br /> {{ $project->user->email }}</td>
                                <td><span class="btn btn-blue">{{ $project->brand->name }}</span></td>
                                <td>{{ $project->cost }}</td>
                                <td><button
                                        class="btn btn-{{ $project->status == '1' ? 'success' : 'danger' }} ">{{ $project->status == '1' ? 'Active' : 'Deactive' }}
                                    </button>
                                </td>
                                @if (Auth::user()->hasPermission(['messages-access', 'create-task', 'edit-project', 'show-brief']))
                                    <td>
                                        @permission('messages-access')
                                            <a href="{{ route('messages.show', $project->client_id) }}" class="btn btn-white"><i
                                                    class="fas fa-comment"></i> Messages</a>
                                        @endpermission

                                        @permission('show-brief')
                                        <a href="{{ route("$project->breif_type.show", $project->breif_id) }}" class="btn btn-info"><i
                                            class="fas fa-copy"></i> View Brief</a>
                                        @endpermission

                                        @permission('create-task')
                                            <a href="{{ url('taskproject/' . $project->id) }}" class="btn btn-dark"><i
                                                    class="fa fa-plus"></i> Create Task</a>
                                        @endpermission
                                        @permission('edit-project')
                                            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-pen"></i> Edit</a>
                                        @endpermission
                                        @permission('delete-project')                                        
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$project->id}}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        @endpermission
                                    </td>
                                @endif
                            </tr>
                            @permission('delete-project')
 <!-- Modal -->
 <div class="modal fade top-30" id="delete_{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="delete_{{$project->id}}Label" aria-hidden="true">
    <form action="{{route('project.destroy', $project->id)}}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $project->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are You Really Want To Delete this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
            </div>
        </div>
    </form>
</div>
                            @endpermission
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
