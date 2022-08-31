@extends('layouts.app')

@section('content')
    {{-- <x-header title="Edit Invoice" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Edit Invoice</h6>
            <a href="{{ route('lead.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form id="formAuthentication" class="mb-3" action="{{ route('lead.update', $invoice->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-4">
                        <x-input name="package_name" label="Package Name" type="text" placeholder="Tets"
                            value="{{ $invoice->custom_package }}" />
                    </div>
                    <div class="col-md-4">
                        <x-select name="client_id" label="Clients" :collection="$clients" :selected="$invoice->client_id" />
                    </div>
                    <div class="col-md-4">
                        <x-select name="service" label="Service" :collection="$services" :selected="$invoice->service" />
                    </div>

                    <div class="col-md-4">
                        <x-select name="packages" label="Packages" :collection="$packages" :selected="$invoice->package" />
                    </div>


                    <div class="col-md-4">
                        <x-select name="currency" label="Currency" :collection="$currencies" :selected="$invoice->currency" />
                    </div>

                    <div class="col-md-4">
                        <x-input name="amount" label="Amount" type="number" placeholder="200"
                            value="{{ $invoice->amount }}" />
                    </div>

                    <div class="col-md-3">
                        <label for="payment_type">Payment Type</label>
                        <select name="payment_type" id="payment_type"
                            class="form-control @error('payment_type') is-invalid @enderror">
                            <option value="one_time_payment"
                                {{ $invoice->payment_type == 'one_time_payment' ? 'selected' : '' }}>One Time Payment
                            </option>
                            <option value="milestone" {{ $invoice->payment_type == 'milestone' ? 'selected' : '' }}>
                                Milestone</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="payment_status">Status</label>
                        <select name="payment_status" id="payment_status"
                            class="form-control @error('payment_type') is-invalid @enderror">
                            <option value="1" {{ $invoice->payment_status == '1' ? 'selected' : '' }}>Paid</option>
                            <option value="0" {{ $invoice->payment_status == '0' ? 'selected' : '' }}>UnPaid</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <x-text-area name="description" label="Desciption" placeholder="Desciption">
                            {{ $invoice->description }}</x-text-area>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
