<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class BrandsController extends Controller
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
        $brands = Brands::all();
        return view('admin.brand.index', compact('brands'));
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
        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'sales-manager')->orwhere('name', 'manager');
            }
        )->get();
        return view('admin.brand.create', compact('status', 'users'));
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
            'logo' => 'clamav',
            'email' => 'required|email',
            'phone' => 'required|max:16',
            'tel' => 'required|max:16',
            'address' => 'required',
            'status' => 'required',
        ]);

        try {
            $brand = new Brands();

            $brand->name = $request["name"];
            $brand->url = $request["url"];
            // $brand->logo = $request["logo"];
            $brand->email = $request["email"];
            $brand->phone = $request["phone"];
            $brand->phone_tel = $request["tel"];
            $brand->address = $request["address"];
            $brand->address_link = $request["address_link"];
            $brand->status = $request["status"];

            if ($request->file('logo')) {
                $file = $request->file('logo');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('image'), $filename);
                $brand->logo = $filename;
            }
            $brand->save();
            $brand->users()->sync($request->user);

            return back()->with('success', "Insert successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (!Auth::user()->hasPermission('general-access')) abort(403);
        $brand = Brands::find($id);
        $status = Status::select('id', 'name')->get();
        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'sales-manager')->orwhere('name', 'manager');
            }
        )->get();
        return view('admin.brand.view', compact('brand', 'status', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (!Auth::user()->hasPermission('general-access')) abort(403);
        $brand = Brands::find($id);
        $status = Status::select('id', 'name')->get();
        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'sales-manager')->orwhere('name', 'manager');
            }
        )->get();
        return view('admin.brand.edit', compact('brand', 'status', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:16',
            'tel' => 'required|max:16',
            'address' => 'required',
            'status' => 'required',
        ]);

        try {
            $brand = Brands::find($id);

            $brand->name = $request["name"];
            $brand->url = $request["url"];
            // $brand->logo = $request["logo"];
            $brand->email = $request["email"];
            $brand->phone = $request["phone"];
            $brand->phone_tel = $request["tel"];
            $brand->address = $request["address"];
            $brand->address_link = $request["address_link"];
            $brand->status = $request["status"];

            if ($request->file('logo')) {
                $file = $request->file('logo');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('image'), $filename);
                $brand->logo = $filename;

                $image_path = public_path("image/" . $request["previous_logo"]);  // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $brand->save();
            $brand->users()->sync($request->user);

            return back()->with('success', "Updated successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if (!Auth::user()->hasPermission('general-access')) abort(403);
        try {
            Brands::destroy($id);
            if (File::exists(public_path("image/" . $request["previous_logo"]))) {
                File::delete(public_path("image/" . $request["previous_logo"]));
            }
            return back()->with('success', "Delete successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }
}