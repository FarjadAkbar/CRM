@extends('layouts.app')


@section('content')
    {{-- <x-header title="Users" description="" /> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
            <a href="{{ route('laratrust.roles-assignment.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i>
                Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="th">Id</th>
                            <th class="th">Name</th>
                            <th class="th">Email</th>
                            {{-- <th class="th">Category</th> --}}
                            <th class="th"># Roles</th>
                            <th class="th">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <tr>
                            <th class="th">Id</th>
                            <th class="th">Name</th>
                            <th class="th">Email</th>
                            {{-- <th class="th">Categroy</th> --}}
                            <th class="th"># Roles</th>
                            <th class="th">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->getKey() }}</td>
                                <td> {{ $user->name ?? 'The model doesn\'t have a `name` attribute' }}</td>
                                <td> {{ $user->email ?? 'The model doesn\'t have a `email` attribute' }}</td>
                                {{-- <td>
                                    @foreach ($user->category->pluck('name') as $category)
                                        <span type="button" class="badge badge-info">{{ $category }}</span>
                                    @endforeach
                                </td> --}}
                                <td>
                                    @foreach ($user->role->pluck('name') as $roles)
                                        {{ $roles }}
                                    @endforeach
                                    {{-- {{ $user->roles_count }} --}}
                                </td>
                                <td>
                                    @if (!$user->hasRole('admin'))
                                        <a href="{{ route('laratrust.roles-assignment.edit', ['roles_assignment' => $user->getKey(), 'model' => $modelKey]) }}"
                                            class="btn btn-primary"><i class="fa fa-pen"></i> Edit</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
