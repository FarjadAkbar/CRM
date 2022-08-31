@extends('layouts.app')

@section('content')
{{-- <x-header title="Roles" description="" /> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Roles List</h6>
            <a href="{{route('laratrust.roles.create')}}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th class="th">Id</th>
                          <th class="th">Display Name</th>
                          <th class="th">Name</th>
                          <th class="th"># Permissions</th>
                          <th class="th"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <tr>
                            <th class="th">Id</th>
                            <th class="th">Display Name</th>
                            <th class="th">Name</th>
                            <th class="th"># Permissions</th>
                            <th class="th"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->getKey()}}</td>
                                    <td> {{$role->display_name}}</td>
                                    <td> {{$role->name}}</td>
                                    <td>{{$role->permissions_count}}</td>
                                    <td>
                                      @if (\Laratrust\Helper::roleIsEditable($role))
                                        <a href="{{route('laratrust.roles.edit', $role->getKey())}}" class="btn btn-primary"><i class="fa fa-pen"></i> Edit</a>
                                      @else
                                      <a href="{{route('laratrust.roles.show', $role->getKey())}}" class="btn btn-primary"><i class="fa fa-eye"></i>Details</a>
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


@section('content')
  <div class="flex flex-col">
    <a
      href="{{route('laratrust.roles.create')}}"
      class="self-end bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
    >
      + New Role
    </a>
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
          <thead>
            <tr>
              <th class="th">Id</th>
              <th class="th">Display Name</th>
              <th class="th">Name</th>
              <th class="th"># Permissions</th>
              <th class="th"></th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($roles as $role)
            <tr>
              <td class="td text-sm leading-5 text-gray-900">
                {{$role->getKey()}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$role->display_name}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$role->name}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$role->permissions_count}}
              </td>
              <td class="flex justify-end px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                @if (\Laratrust\Helper::roleIsEditable($role))
                <a href="{{route('laratrust.roles.edit', $role->getKey())}}" class="text-blue-600 hover:text-blue-900">Edit</a>
                @else
                <a href="{{route('laratrust.roles.show', $role->getKey())}}" class="text-blue-600 hover:text-blue-900">Details</a>
                @endif
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$role->getKey()}}" @if(!\Laratrust\Helper::roleIsDeletable($role)) disabled @endif>
                    <i class="fa fa-trash"></i> Delete
                </button>                
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade top-30" id="delete_{{$role->getKey()}}" tabindex="-1" role="dialog" aria-labelledby="delete_{{$role->getKey()}}Label" aria-hidden="true">
              <form action="{{route('laratrust.roles.destroy', $role->getKey())}}" method="post">
                  @csrf
                  @method('DELETE')
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{ $role->display_name}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <h5>Are You Really Want To Delete this?</h5>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </div>
                      </div>
                      </div>
                  </div>
              </form>
          </div>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{ $roles->links('laratrust::panel.pagination') }}
@endsection
