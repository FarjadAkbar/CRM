<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogoForm;
use App\Models\User;
use App\Models\Invoices;
use App\Models\Projects;
use App\Models\Clients;
use App\Models\ProjectCategory;

class LogoBreifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Auth::user()->hasPermission('brief-access')) abort(403);
        $breifs = LogoForm::all();

        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'team lead');
            }
        )->get();

        return view('admin.breif.logobreif.index', compact('breifs', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!Auth::user()->hasPermission('add-logobrief')) abort(403);
        $client = Clients::where('email', '=', Auth::user()->email)->select('id')->first();
        $invoice = Invoices::where('client_id', '=', $client->id)->where('service', '=', '3')->first();
        return view('admin.breif.logobreif.create', compact('invoice'));
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
        $request->validate([
            'title' => 'required',
            'logo_slogan' => 'required',
            'imagery' => 'required',
            'desired_design' => 'required',
            'colors_visual' => 'required',
            'intended_use' => 'required',
            'business_overview' => 'required',
            'target_audience' => 'required',
            // 'files' => 'clamav'
        ]);
        $files = [];
        if ($request->file('files')) {
            foreach ($request->file('files') as $key => $file) {
                $fileName = time() . rand(1, 99) . '.' . $file->extension();
                $file->move(public_path('files'), $fileName);
                // $files['name'] = $fileName;
                array_push($files, $fileName);
            }
        }

        LogoForm::create([
            'logo_name' => $request->title,
            'slogan' => $request->logo_slogan,
            'imagery' => $request->imagery,
            'desired_design' => $request->desired_design,
            'colors_visual' => $request->colors_visual,
            'intended_use' => $request->intended_use,
            'business_overview' => $request->business_overview,
            'target_audience' => $request->target_audience,
            'filesname' =>  json_encode($files),
            'additional_information' => $request->additional_information,
            'user_id' => $request->client_id,
            'invoice_id' => $request->invoice_id,
            'agent_id' => $request->agent_id,
            'brand_id' => $request->brand_id
        ]);


        return redirect()->back()->with('success', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (!Auth::user()->hasPermission('show-brief')) abort(403);
        $logobrief = LogoForm::find($id);
        return view('admin.breif.logobreif.view', compact('logobrief'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // if (!Auth::user()->hasPermission('edit-brief')) abort(403);
        // $brief = LogoForm::find($id);
        // $service = 'Logo';
        // return view('admin.breif.edit', compact('brief', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        // $request->validate([
        //     'title' => 'required',
        //     'logo_slogan' => 'required',
        //     // 'files' => 'clamav'
        // ]);

        // try {
        //     $logobrief = LogoForm::find($id);
        //     $logobrief->logo_name = $request->title;
        //     $logobrief->slogan = $request->logo_slogan;
        //     $logobrief->imagery = $request->imagery;
        //     $logobrief->desired_design = $request->desired_design;
        //     $logobrief->colors_visual = $request->colors_visual;
        //     $logobrief->intended_use = $request->intended_use;
        //     $logobrief->business_overview = $request->business_overview;
        //     $logobrief->target_audience = $request->target_audience;
        //     $logobrief->user_id = Auth::id();

        //     $logobrief->save();
        //     return back()->with('success', "Update successfully");
        // } catch (\Exception $e) {
        //     return back()->with('error', json_encode($e->getMessage()));
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}