@extends('layouts.app')

@section('content')
    {{-- <x-header title="Brefis" description="lorem ipsum" /> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Websites Briefs List</h6>
            @role('client')
                <a href="{{ route('breif.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add New</a>
            @endrole
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Invoice#</th>
                            <th>Title</th>
                            <th>Purpose</th>
                            <th>Client</th>
                            <th>Agent</th>
                            <th>Files</th>
                            @if (Auth::user()->hasPermission(['edit-brief', 'show-brief']))
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Invoice#</th>
                            <th>Title</th>
                            <th>Purpose</th>
                            <th>Client</th>
                            <th>Agent</th>
                            <th>Files</th>
                            @if (Auth::user()->hasPermission(['edit-brief', 'show-brief']))
                                <th>Action</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($breifs as $breif)
                            <tr>
                                <td>{{ $breif->id }}</td>
                                <td><span class="btn btn-dark">{{$breif->invoice->invoice_number}}</span></td>
                                <td class="text-capitalize">{{ $breif->website_title }}</td>
                                <td>{{ Str::limit($breif->purpose, 50)}}</td>
                                <td>{{ $breif->client->name }}</td>
                                <td>{{ $breif->agent->name }}</td>
                                <td>
                                    @php
                                        $filesname = json_decode($breif->filesname)
                                    @endphp 
                                    @if(is_array($filesname))
                                        {{ count($filesname)}}
                                    {{-- @else
                                        1 --}}
                                    @endif   
                                </td>
                                @if (Auth::user()->hasPermission(['edit-brief', 'show-brief']))
                                    <td>
                                        @permission('project-assign')
                                            <a href="{{ url("create/webbreif/$breif->id")}}" class="btn btn-info">
                                                <i class="fa fa-user"></i> Assign
                                            </a>
                                        @endpermission    
                                        {{-- @permission('edit-brief')
                                            <a href="{{ route('webbreif.edit', $breif->id) }}" class="btn btn-primary"><i
                                                    class="fas fa-pen"></i> Edit</a>
                                        @endpermission --}}
                                        @permission('show-brief')
                                            <a href="{{ route('webbreif.show', $breif->id) }}" class="btn btn-dark"><i
                                                    class="fas fa-eye"></i> View</a>
                                        @endpermission
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
