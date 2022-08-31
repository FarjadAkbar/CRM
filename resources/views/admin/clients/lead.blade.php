@extends('layouts.app')

@section('content')
    {{-- <x-header title="Client Lead" description="lorem ipsum" /> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Client Leads</h6>
            <a href="{{ route('clients.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form id="formAuthentication" class="mb-3" action="{{route('lead.store')}}" method="POST">
                @csrf
                <input name="brand_id" label=""  type="hidden" value="{{  $client->brand->id  }}" />
                <input name="client_id" label=""  type="hidden" value="{{  $client->id  }}"  />
                <div class="form-row">
                    <div class="col-md-3">
                        <x-input name="name" label="Full Name" type="text" placeholder="John Doe" value="{{  $client->name . ' ' . $client->last_name  }}" readonly />
                    </div>
                    <div class="col-md-3">
                        <x-input name="email" label="Email" type="email" placeholder="john@doe.com" value="{{  $client->email  }}" readonly />
                    </div>

                    <div class="col-md-3">
                        <x-input name="contact" label="Contact" type="tel" placeholder="2343432" value="{{  $client->contact  }}"  readonly />
                    </div>

                    
                    <div class="col-md-3">
                        <x-input name="brand" label="Brand" type="text" placeholder="Doe" value="{{  $client->brand->name  }}" readonly />
                    </div>

                    
                    <div class="col-md-3">
                        <x-select name="service" label="Services" :collection="$services" />
                    </div>

                    
                    <div class="col-md-3">
                        <x-select name="packages" label="Packages" :collection="$packages"  />
                    </div>

                    
                    <div class="col-md-3">
                        <x-input name="package_name" label="Name for a custom package" type="text" placeholder="New Pack" value="{{  old('package_name')  }}"  />
                    </div>


                    <div class="col-md-3">
                        <x-select name="currency" label="Currency" :collection="$currencies" />
                    </div>
                    
                    
                    <div class="col-md-3">
                        <x-input name="amount" label="Amount" type="text" placeholder="Amount" value="{{  old('amount')  }}"  />
                    </div>
                    
                    <div class="col-md-3">
                        <label for="payment_type">Payment Type</label>
                        <select name="payment_type" id="payment_type" class="form-control @error('payment_type') is-invalid @enderror">                           
                            <option value="one_time_payment">One Time Payment</option>                          
                            <option value="milestone">Milestone</option>                          
                        </select>
                    </div>

                    <div class="col-md-12">
                        <x-text-area name="description" label="Desciption" type="text" placeholder="Desciption" value="{{  old('description')  }}"  />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ">
                    Create
                </button>
                
            </form>

        </div>
    </div>
@endsection
