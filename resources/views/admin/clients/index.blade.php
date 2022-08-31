@extends('layouts.app')

@section('content')

    {{-- <x-header title="Clients" description="lorem ipsum" /> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Clients List</h6>
            @permission('add-client')
                <a href="{{ route('clients.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add New</a>
            @endpermission
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            @permission('register-client')<th>Create Login</th>@endpermission
                            <th>Brand</th>
                            @permission('create-lead')
                            <th>Payment Link</th>
                            @endpermission
                            <th>Status</th>
                            @if(Auth::user()->hasPermission(['edit-client','show-client']))                            
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            @permission('register-client')<th>Create Login</th>@endpermission
                            <th>Brand</th>
                            @permission('create-lead')
                            <th>Payment Link</th>
                            @endpermission
                            <th>Status</th>
                            @if(Auth::user()->hasPermission(['edit-client','show-client']))                            
                            <th>Action</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td class="text-capitalize">{{ $client->name . ' ' . $client->last_name }}</td>
                                <td>{{ $client->email }}</td>
                                @permission('register-client')
                                <td>
                                    <button class="btn btn-primary"  data-toggle="modal" data-target="#passwordGenerate_{{$client->id}}" {{ $client->statuses->id != 1 ? 'disabled' : '' }}>Click Here</button>
                                </td>
                                @endpermission
                                <td>
                                    <span type="button" class="btn btn-blue">{{ $client->brand->name }}</span>
                                    <span type="button" class="btn btn-white">{{ $client->brand->url }}</span>
                                </td>
                                @permission('create-lead')
                                <td>
                                    <a href="{{ $client->statuses->id != 1 ? '#' : url($client->id .'/lead')}}" class="btn btn-primary" >Generate Payment</a>
                                </td>
                                @endpermission
                                <td>
                                    <span class="btn {{ $client->statuses->id == 1 ? 'btn-success' : 'btn-danger' }}">
                                        {{ $client->statuses->name }}
                                    </span>
                                </td>
                                @if(Auth::user()->hasPermission(['edit-client','show-client']))                            
                                <td>                                    
                                    @permission('edit-client')
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                    @endpermission
                                    
                                    @permission('show-client')
                                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-dark"><i class="fas fa-eye"></i> View</a>
                                    @endpermission
                                </td>
                                @endif
                            </tr>

                              <!-- Modal -->
                              @permission('register-client')
                              <div class="modal fade top-30" id="passwordGenerate_{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="passwordGenerate_{{$client->id}}Label" aria-hidden="true">
                                <form action="{{url('clientregister/' .$client->id)}}" method="post">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Enter Password</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <x-input name="password" label="Password" type="text" value="{{ Str::random(15) }}" placeholder="Password" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Ok</button>
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
