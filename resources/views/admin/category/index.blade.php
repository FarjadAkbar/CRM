@extends('layouts.app')


@section('content')
    {{-- <x-header title="Category" description="lorem ipsum" /> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
            <a href="{{ route('category.create')}}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create Category</a>
        </div>
        <div class="card-body">              
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th rowspan="1" colspan="1">Sno.</th>
                        <th rowspan="1" colspan="1">Name</th>
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Sno.</th>
                        <th rowspan="1" colspan="1">Name</th>
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                </tfoot>
                <tbody>    
                    
                    @foreach ($categories as $category)
                        <tr class="odd">
                            <td>{{ $category->id}}</td>
                            <td class="text-capitalize">{{ $category->name }}</td>
                            <td><span class="btn small {{ $category->status == '1' ? 'btn-success': 'btn-warning' }}">{{ $category->status == '1' ? 'Active' : 'Deactive'}}</span></td>
                            <td> 
                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$category->id}}">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>

                            <!-- Modal -->
                            <div class="modal fade top-30" id="delete_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="delete_{{$category->id}}Label" aria-hidden="true">
                                <form action="{{route('category.destroy', $category->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $category->name}}</h5>
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




  
@endsection
