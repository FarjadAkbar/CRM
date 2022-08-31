@extends('layouts.app')
@section('content')
{{-- <x-header title="Permissions" description="" /> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Permission List</h6>
            <a href="{{route('laratrust.permissions.create')}}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th class="th">Id</th>
                          <th class="th">Name/Code</th>
                          <th class="th">Display Name</th>
                          <th class="th">Description</th>
                          <th class="thead"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <tr>
                            <th class="th">Id</th>
                            <th class="th">Name/Code</th>
                            <th class="th">Display Name</th>
                            <th class="th">Description</th>
                            <th class="th"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{$permission->getKey()}}</td>
                                    <td> {{$permission->name}}</td>
                                    <td>{{$permission->display_name}}</td>
                                   <td>{{$permission->description}}</td>
                                    <td>
                                        <a href="{{route('laratrust.permissions.edit', $permission->getKey())}}" class="btn btn-primary"><i class="fa fa-pen"></i> Edit</a>
                                    </td>
                                </tr>
                            @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
