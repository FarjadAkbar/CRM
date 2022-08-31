@extends('layouts.app')


@section('content')
    <!-- Page Heading -->
    {{-- <x-header title="View Client Info" description="lorem ipsum" /> --}}
    <div class="row">
        <div class="col-md-6">
            <!-- DataTales Example -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary text-capitalize">{{ $client->name }} Detail</h6>
                </div>
                <div class="card-body">              
                    <table class="table table-bordered">
                        <tr>
                            <td><b>Name</b></td>
                            <td class="text-capitalize">{{ $client->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>{{ $client->email }}</td>
                        </tr>
                        <tr>
                            <td><b>Brand</b></td>
                            <td class="text-capitalizes">{{ $client->brand->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        @foreach ($clientpaid as $cpi)
        <div class="col-md-2 col-sm-6">
            <div class="card shadow">
                <div class="card-body text-center lead text-info">
                    <i class="fa fa-desktop mb-3"></i>
                    <p class="text-black">Paid Invoices</p>      
                    <h4>{{ $cpi->currencies->sign . $cpi->amount }}</h4>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($clientunpaid as $cupi)
            <div class="col-md-2 col-sm-6">
                <div class="card shadow">
                    <div class="card-body text-center lead text-info">
                        <i class="fa fa-desktop mb-3"></i>
                        <p class="text-black">UnPaid Invoices</p>      
                        <h4>{{ $cupi->currencies->sign . $cupi->amount }}</h4>
                    </div>
                </div>
            </div>
        @endforeach

  
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Invoices</h6>
                    <a class="btn btn-success" href="{{ url('file-export/'.$client->id) }}">Excel Report</a>
                </div>
                <div class="card-body">              
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="1" colspan="1">ID</th>
                                <th rowspan="1" colspan="1">Package Name</th>
                                <th rowspan="1" colspan="1">User Name</th>
                                <th rowspan="1" colspan="1">Agent Name</th>
                                <th rowspan="1" colspan="1">Brand</th>
                                <th rowspan="1" colspan="1">Amount</th>
                                <th rowspan="1" colspan="1">Status</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">ID</th>
                                <th rowspan="1" colspan="1">Package Name</th>
                                <th rowspan="1" colspan="1">User Name</th>
                                <th rowspan="1" colspan="1">Agent Name</th>
                                <th rowspan="1" colspan="1">Brand</th>
                                <th rowspan="1" colspan="1">Amount</th>
                                <th rowspan="1" colspan="1">Status</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                        </tfoot>

                        
                        <tbody>  
                            @forelse ($client->leads as $lead)
                                <tr>
                                    <td><div class="btn btn-info"># {{ $lead->invoice_number}}</div></td>
                                    <td>{{ $lead->name }}</td>
                                    <td class="small">{{$client->name}}<br /> {{$client->email}}</td>
                                    <td class="small">{{$lead->user->name}}<br /> {{$lead->user->email}}</td>
                                    <td>{{$client->brand->name}}</td>
                                    <td>{{ $lead->currencies->sign . $lead->amount }}</td>
                                    <td>
                                        <a href="{{ url('leadstaatus/'.$lead->id.'/'.$lead->payment_status) }}" class="btn btn-{{ $lead->payment_status == '1' ? 'success' : 'danger' }} ">{{ $lead->payment_status == '1' ? 'Paid' : 'UnPaid' }} </a>
                                    </td>
                                    <td>
                                        <a href="{{route('lead.show', $lead->id)}}" class="btn btn-secondary"><i class="fa fa-eye"></i> View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr colspan="5">
                                    <td>No Data Found</td>
                                </tr>
                            @endforelse                                                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
