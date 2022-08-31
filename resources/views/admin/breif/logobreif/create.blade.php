@extends('layouts.app')


@section('content')
    {{-- <x-header title="Logo Breif" description="" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Logo Breif</h6>
            {{-- <a href="{{ route('logobreif.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a> --}}
        </div>
        <div class="card-body">
            @if ($invoice->payment_status != 1)
                <p class="lead text-center">Invoice Not Paid</p>
            @else
                <form id="formAuthentication" class="mb-3" action="{{ route('logobreif.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h4>Details</h4>
                    <div class="form-row">
                        <input type="hidden" name="invoice_id" id="invoice_id" value="{{ $invoice->id }}" />
                        <input type="hidden" name="agent_id" id="agent_id" value="{{ $invoice->sales_agent_id }}" />
                        <input type="hidden" name="client_id" id="client_id" value="{{ $invoice->client_id }}" />
                        <input type="hidden" name="brand_id" id="brand_id" value="{{ $invoice->brand }}" />                     
                        <div class="col-md-4">
                            <x-input name="name" label="Name" type="text" placeholder="KFC"
                                value="{{ Auth::user()->name }}" readonly />
                        </div>
                        <div class="col-md-4">
                            <x-input name="email" label="Email" type="email" placeholder="john@doe.com"
                                value="{{ Auth::user()->email }}" readonly />
                        </div>
                        <div class="col-md-4">
                            <x-input name="phone" label="Phone" type="text" placeholder="929023900"
                                value="{{ Auth::user()->contact }}" readonly />
                        </div>
                    </div>
                    <hr>
                    <h4>Creative</h4>
                    <div class="form-row">
                        <div class="col-md-4">
                            <x-input name="title" label="Logo Name" type="text" placeholder="KFC" value=""/>
                        </div>
                        <div class="col-md-4">
                            <x-input name="logo_slogan" label="Slogan" type="text" placeholder="Taste Delight" value=""/>
                        </div>
                        
                        <div class="col-md-12">
                            <x-input name="imagery" label="Imagery" type="text" placeholder="what imagery, if any, should be included in the logo?" value=""/>
                        </div>
                        <div class="col-md-12">
                            <x-input name="desired_design" label="Desired Design" type="text" placeholder="include reference images, if applicable" value=""/>
                        </div>
                        <div class="col-md-12">
                            <x-input name="colors_visual" label="Color & Visual" type="text" placeholder="colors & othter visual considerations" value=""/>
                        </div>
                        <div class="col-md-12">
                            <x-input name="intended_use" label="Intended Use" type="text" placeholder="signage, business cards, etc. " value=""/>
                        </div>
                        
                    </div>
                    <hr>
                    <h4>Business Information</h4>
                    <div class="form-row">                
                        <div class="col-md-12">
                            <x-text-area name="business_overview" label="Business Overview" placeholder="what do you do? what is unique about your business? " />
                        </div>
                    
                        <div class="col-md-12">
                            <x-text-area name="target_audience" label="Target Audience" placeholder="who are you trying to reach? " />
                        </div>
                    </div>
                    
                    <hr>
                    <h4>Other Info</h4>
                    <div class="form-row">
                        <div class="col-md-12">
                            <x-input name="files[]" id="inputImage" label="Attachment" type="file" multiple />
                        </div>

                        <div class="col-md-12">
                            <x-text-area name="additional_information" label="Additional Information"
                                placeholder="any other thing you want to say? "  />
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            @endif

        </div>
    </div>

@endsection
