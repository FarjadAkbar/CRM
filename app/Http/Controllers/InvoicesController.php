<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Currencies;
use App\Models\Brands;
use App\Models\Clients;
use App\Models\Packages;
use App\Models\Services;
use App\Models\Projects;
use App\Mail\MailTemplate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Auth::user()->hasPermission('lead-access')) abort(403);
        $invoices = Invoices::where('brand', '!=', '')->get();
        return view('admin.invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        if (!Auth::user()->hasPermission('create-lead')) abort(403);
        $request->validate([
            'client_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'brand' => 'required',
            'brand_id' => 'required',
            'service' => 'required',
            'packages' => 'required',
            'package_name' => 'required',
            'currency' => 'required',
            'amount' => 'required',
            'payment_type' => 'required',
        ]);

        try {
            // Mail::to($request['email'])->send(new WelcomeMail());
            // Mail::to('demosites2244@gmail.com')->send(new WelcomeMail());
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'brand' => $request->brand_id,
                'service' => $request->service,
                'package' => $request->packages,
                'currency' => $request->currency,
                'client_id' => $request->client_id,
                'invoice_number' =>  rand(999, 10000000),
                'sales_agent_id' =>  Auth::id(),
                'description' => $request->description,
                'amount' => $request->amount,
                'payment_type' => $request->payment_type,
                'custom_package' => $request->package_name
            ];
            $invoice = Invoices::create($details);

            Mail::to($request['email'])->send(new MailTemplate("
            Hello! 
            Welcome to ".env("APP_NAME")." - ".$request->name." 
            Invoice is generated successfully.
            invoice no# " .$request->invoice_number."
            If you have any questions do not hesitate to reach out at ".env("APP_EMAIL")));
            
            return back()->with('success', "Insert successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices, $id)
    {
        //
        if (!Auth::user()->hasPermission('show-lead')) abort(403);
        $invoice = Invoices::find($id);
        return view('admin.clients.payment', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (!Auth::user()->hasPermission('edit-lead')) abort(403);
        $invoice = Invoices::find($id);
        // dd($invoice);

        $currencies = Currencies::select('id', 'name')->get();
        $clients = Clients::select('id', 'name')->get();
        $packages = Packages::select('id', 'name')->get();
        $services = Services::select('id', 'name')->get();
        return view('admin.invoices.edit', compact('invoice', 'currencies', 'services', 'packages', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'client_id' => 'required',
            'service' => 'required',
            'packages' => 'required',
            'package_name' => 'required',
            'currency' => 'required',
            'amount' => 'required',
            'payment_type' => 'required',
        ]);
        try {
            $invoice = Invoices::find($id);
            $client = Clients::find($request->client_id);

            $invoice->name = $client->name;
            $invoice->email = $client->email;
            $invoice->contact = $client->contact;
            $invoice->brand = $client->brand_brand_id;
            $invoice->service = $request->service;
            $invoice->custom_package = $request->packages;
            $invoice->currency = $request->currency;
            $invoice->client_id = $request->client_id;
            // $invoice->invoice_number = rand(999, 10000000);
            $invoice->sales_agent_id = Auth::id();
            $invoice->description = $request->description;
            $invoice->amount = $request->amount;
            $invoice->payment_type    = $request->payment_type;
            $invoice->custom_package    = $request->package_name;
            $invoice->payment_status  = $request->payment_status;
            $invoice->save();
            return back()->with('success', "Updated successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoices, $id)
    {
        //
    }

    
    public function leadstatus($id, $status){
        try {
            if($status == '1'){
                $status = '0';
            }
            else{
                $status = '1';
            }
            $invoices = Invoices::find($id);
            $invoices->payment_status = $status;
            $invoices->save();
            return back()->with('success', "Update successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }
}