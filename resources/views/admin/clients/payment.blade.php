@extends('layouts.app')


@section('content')

{{-- <x-header title="Generate Payment Link" description="lorem ipsum" /> --}}
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow">
                <div class="card-body">              
                    <div class="p-2">
                        <div class="row pt-3 mb-2">
                            <div class="col-md-6 pull-left">
                                <img src="{{  url('image/'.$invoice->brands->logo) }}" width="100" class="img-fluid">
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary">Print Invoice</button>
                            </div>
                        </div>
                        <div class="row pt-4">                            
                            <div class="col-md-6">
                                <h3 class="text-dark"><b>Invoice Info</b></h3>
                                <p class="lead">#{{ $invoice->invoice_number}}</p>                            
                            </div>

                            
                            <div class="col-md-6  text-right">
                                <h6 class="text-dark"><b>Invoice Status: </b>{{$invoice->payment_status == 0 ? 'Paid' : 'UnPaid'}}</h6>
                                <h6 class="text-dark"><b>Invoice Date: </b>{{$invoice->invoice_date}}</h6>
                            </div>
                        </div>
                        <hr />
                        <div class="row pt-4">                            
                            <div class="col-md-6">
                                <h4 class="text-dark"><b>Bill From</b></h4>
                                <p>{{ $invoice->clients->name}}<br>{{ $invoice->clients->email}} <br>{{ $invoice->clients->contact}}</p>                            
                            </div>

                            
                            <div class="col-md-6  text-right">
                                <h4 class="text-dark"><b>Bill To</b></h4>
                                <p>{{ $invoice->user->name}}<br>{{ $invoice->user->email}} <br>{{ $invoice->user->contact}}</p>          
                            </div>
                        </div>
                        
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>1</b></td>
                                    <td>{{ $invoice->packages->name}}</td>
                                    <td>{{ $invoice->brands->name}}</td>
                                    <td><span class="btn btn-success">{{ $invoice->services->name}}</span></td>
                                    <td class="text-capitalize">{{ str_replace('_', ' ', $invoice->payment_type) }}</td>
                                    <td>{{ $invoice->currencies->sign . $invoice->amount}}</td>
                                    <td><button type="button" class="btn btn-blue"  data-toggle="modal" data-target="#generate_link">Link</button></td>
                                </tr>
                                <tr class="bg-light">
                                    <td colspan="7">Description</td>
                                </tr>
                                <tr>
                                    <td colspan="7">{{$invoice->description}}</td>
                                </tr>
                            </tbody>
                            
                            <thead class='bg-light'>
                                <tr>
                                    <td>#</td>
                                    <td>Item Name</td>
                                    <td>Brand</td>
                                    <td>Service</td>
                                    <td>Payment Type</td>
                                    <td>Cost</td>
                                    <td>Link</td>
                                </tr>
                            </thead>
                        
                        </table>

                        <div class="row">
                            <div class="col-12 text-right">
                                <p class="text-dark lead">Sub Total: {{ $invoice->currencies->sign . $invoice->amount}}</p>
                                <h5 class="text-dark"><b>Grand Total: {{ $invoice->currencies->sign . $invoice->amount}}</b></h5>   
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade top-30" id="generate_link" tabindex="-1" role="dialog" aria-labelledby="generate_linkLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Link</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                           
                    <a href="#" target="_blank" > https://laratrust.readthedocs.io/</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
