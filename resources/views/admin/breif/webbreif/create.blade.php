@extends('layouts.app')


@section('content')
    {{-- <x-header title="Website Breif" description="" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Website Breif</h6>
            {{-- <a href="{{ route('logobreif.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a> --}}
        </div>
        <div class="card-body">
            @if ($invoice->payment_status != 1)
                <p class="lead text-center">Invoice Not Paid</p>
            @else
                <form id="formAuthentication" class="mb-3" action="{{ route('breif.store') }}" method="POST"
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
                    <hr><h4>Project Overview</h4>
                    <div class="form-row">
                        <div class="col-md-6">
                            <x-input name="title" label="Website Title" type="text" placeholder="website title"  />
                        </div>
                        <div class="col-md-6">
                            <x-input name="purpose" label="Purpose" type="text" placeholder="why would you like a new website?"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="objective" label="Objective" type="text" placeholder="ultimate impact?  i.e. sales, lead generation, traffic, online presence, etc. "  />
                        </div>
                    </div>
                    <hr>
                    <h4>Target Audience</h4>
                    <div class="form-row">
                        <div class="col-md-12">
                            <x-input name="project_target" label="Project Target" type="text" placeholder="why would you like a new website?"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="brand_target" label="Brand Target" type="text" placeholder="who does the brand speak to?"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="desired_reaction" label="Desired Reaction" type="text" placeholder="what actions do you wish your market to take?"  />
                        </div>
                    </div>
                    <hr>
                    <h4>Competative Analysis</h4>
                    <div class="form-row">
                        <div class="col-md-12">
                            <x-input name="competitor" label="Market / Niche Competitor Sites" type="text" placeholder="provide links to competitor sites and other important sites in your industry"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="design" label="Design" type="text" placeholder="provide links / explanations of design elements of websites you like"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="functionality" label="Funcationlity" type="text" placeholder="provide links / explanations of the functionality of websites you like"  />
                        </div>
                    </div>
                    <hr>
                    <h4>Current Website Review <small>(fill this form if you have current website)</small></h4>
                    <div class="form-row">                
                        <div class="col-md-12">
                            <x-input name="positive_aspects" label="Positive Aspects" type="text" placeholder="List positive aspects of current site"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="negative_aspects" label="Negative Aspects" type="text" placeholder="List negative aspects of current site"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="traffic_levels" label="Traffic" type="text" placeholder="Current traffic levels"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="current_performance" label="Performance" type="text" placeholder="Current performance levels"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="currrent_hosting" label="Hosting" type="text" placeholder="Current host and hosting package"  />
                        </div>
                        <div class="col-md-12">
                            <x-input name="negative_hosting" label="Negative Aspects of Hosting" type="text" placeholder="List any negative aspects of current hosting environment"  />
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
                                placeholder="any other thing you want to say? "
                                 />
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            @endif

        </div>
    </div>

@endsection
