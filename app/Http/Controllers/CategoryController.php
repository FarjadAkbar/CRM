<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Services;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Auth::user()->hasPermission('general-access')) abort(403);
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!Auth::user()->hasPermission('general-access')) abort(403);
        $status = Status::select('id', 'name')->get();
        $service = Services::select('id', 'name')->get();
        return view('admin.category.create', compact('service', 'status'));
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
            'name' => 'required',
            'status' => 'required',
        ]);

        try {
            $category = new Category();

            $category->name = $request["name"];
            $category->status = $request["status"];

            $category->save();
            return back()->with('success', "Insert successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (!Auth::user()->hasPermission('general-access')) abort(403);
        $category = Category::find($id);
        $service = Services::select('id', 'name')->get();
        $status = Status::select('id', 'name')->get();
        return view('admin.category.edit', compact('category', 'service', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        try {
            $category = Category::find($id);

            $category->name = $request["name"];
            $category->status = $request["status"];

            $category->save();
            return back()->with('success', "Updated successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (!Auth::user()->hasPermission('general-access')) abort(403);
        try {
            Category::destroy($id);
            return back()->with('success', "Delete successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }
}