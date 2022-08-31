<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WebsiteForm;
use App\Models\Clients;
use App\Models\User;
use App\Models\Invoices;
use App\Models\Projects;

class WebBreifController extends Controller
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
        $breifs = WebsiteForm::all();
        return view('admin.breif.webbreif.index', compact('breifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!Auth::user()->hasPermission('add-webbrief')) abort(403);
        $client = Clients::where('email', '=', Auth::user()->email)->select('id')->first();
        $invoice = Invoices::where('client_id', '=', $client->id)->where('service', '=', '1')->first();
        return view('admin.breif.webbreif.create', compact('invoice'));
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
            'purpose' => 'required',
            'objective' => 'required',
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

        WebsiteForm::create([
            'website_title' => $request->title,
            'purpose' => $request->purpose,
            'objective' => $request->objective,
            'project_target	' => $request->project_target,
            'brand_target' => $request->brand_target,
            'desired_reaction' => $request->desired_reaction,
            'competitor' => $request->competitor,
            'design' => $request->design,
            'functionality	' => $request->functionality,
            'postive_aspects' => $request->postive_aspects,
            'negative_aspects' => $request->negative_aspects,
            'traffic_levels' => $request->traffic_levels,
            'current_performance' => $request->current_performance,
            'currrent_hosting' => $request->currrent_hosting,
            'negative_hosting' => $request->negative_hosting,
            'filesname' =>  json_encode($files),
            'additional_information' => $request->additional_information,
            'user_id' => $request->client_id,
            'invoice_id' => $request->invoice_id,
            'brand_id' => $request->brand_id,
            'agent_id' => $request->agent_id,
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
        $brief = WebsiteForm::find($id);
        return view('admin.breif.webbreif.view', compact('brief'));
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
        // $brief = WebsiteForm::find($id);
        // $service = 'Web';
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
        // $request->validate([
        //     'title' => 'required',
        //      // 'files' => 'clamav'
        // ]);

        // try {
        //     $webbrief = WebsiteForm::find($id);
        //     $webbrief->website_title = $request->title;

        //     $webbrief->purpose = $request->purpose;
        //     $webbrief->objective = $request->objective;
        //     $webbrief->project_target = $request->project_target;
        //     $webbrief->brand_target = $request->brand_target;
        //     $webbrief->desired_reaction = $request->desired_reaction;
        //     $webbrief->competitor = $request->competitor;
        //     $webbrief->design = $request->design;
        //     $webbrief->functionality = $request->functionality;
        //     $webbrief->postive_aspects = $request->positive_aspects;
        //     $webbrief->negative_aspects = $request->negative_aspects;
        //     $webbrief->traffic_levels = $request->traffic_levels;
        //     $webbrief->current_performance = $request->current_performance;
        //     $webbrief->currrent_hosting = $request->currrent_hosting;
        //     $webbrief->negative_hosting = $request->negative_hosting;
        //     $webbrief->user_id = Auth::id();

        //     $webbrief->save();            
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