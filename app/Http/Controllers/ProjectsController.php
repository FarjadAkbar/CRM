<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Clients;
use App\Models\Category;
use App\Models\User;
use App\Models\Status;
use App\Models\Invoices;
use App\Models\ProjectCategory;
use App\Models\LogoForm;
use App\Models\WebsiteForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermission('project-access')) abort(403);
        // if(Auth()->user()->hasRole('admin')){
        //     $projects = Projects::all();            
        // }
        // else 
        if(Auth()->user()->hasRole('employee')){
            $projects = Projects::where('status', '=', '1')->get();            
        }
        else{
            // $projects = Projects::whereIn('brand_id', Auth()->user()->brand_list())->get();
                $projects = Projects::all();            
        }
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asignproject($name, $id)
    {
        // $client = Clients::where('status', 1)->whereIn('brand_id', Auth()->user()->brand_list())->get();
        if (!Auth::user()->hasPermission('create-project')) abort(403);
        if($name=="logobreif"){
            $breif = LogoForm::where('id', '=', $id)->select('invoice_id')->first();
        }
        else{
            $breif = WebsiteForm::where('id', '=', $id)->select('invoice_id')->first();
        }
        $invoice = Invoices::find($breif->invoice_id);
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'employee');
            }
        )->get();
        $category = Category::whereIn('service_id', $invoice->services)->where('status', 1)->get();
        $status = Status::all();
        return view('admin.project.create', compact('invoice', 'category', 'users', 'status', 'name', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'client' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
        ]);
        $get_client = Clients::where('id', '=', $request->input('client'))->first();
        $request->request->add(['brand_id' => $get_client->brand->id]);
        $request->request->add(['client_id' => $request->input('client')]);
        $request->request->add(['user_id' => auth()->user()->id]);
        $product = Projects::create($request->all());
        $category = $request->input('category');
        for($i = 0; $i < count($category); $i++){
            $project_category = new ProjectCategory();
            $project_category->project_id = $product->id;
            $project_category->category_id = $category[$i];
            $project_category->save();
        }
        
        return redirect()->back()->with('success', 'Project created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $project)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasPermission('edit-project')) abort(403);
        $clients = Clients::where('status', 1)->whereIn('brand_id', Auth()->user()->brand_list())->get();
        $project = Projects::whereIn('brand_id', Auth()->user()->brand_list())->where('id', $id)->first();
        $category = Category::where('status', 1)->get();
        $status = Status::all();
        return view('admin.project.edit', compact('project', 'category', 'clients', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $project)
    {
        $request->validate([
            'name' => 'required',
            'client' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
        ]);
        $get_client = Clients::where('id', $request->input('client'))->first();
        $request->request->add(['brand_id' => $get_client->brand->id]);
        $request->request->add(['client_id' => $request->input('client')]);
        $request->request->add(['user_id' => auth()->user()->id]);
        $project->update($request->all());
        $category = $request->input('category');
        $project->project_category()->sync($category);
        return redirect()->back()->with('success', 'Project Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (!Auth::user()->hasPermission('delete-project')) abort(403);
        try {
            Projects::destroy($id);
            return back()->with('success', "Delete successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }
}