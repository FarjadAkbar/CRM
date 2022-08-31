<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Currencies;
use App\Models\Packages;
use App\Models\Services;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PackagesController extends Controller
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
        $packages = Packages::all();
        return view('admin.package.index', compact('packages'));
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
        $currency = Currencies::select('id', 'name')->get();
        $brand = Brands::select('id', 'name')->get();
        return view('admin.package.create', compact('service', 'status', 'currency', 'brand'));
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
            'currency' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'addon' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'service' => 'required',
            'status' => 'required',
        ]);

        try {
            $package = new Packages();

            $package->name = $request["name"];
            $package->slug = Str::lower(str_replace('-', ' ', $request["name"]));
            $package->currencies_id = $request["currency"];
            $package->actual_price = $request["price"];
            $package->price = $request["price"];
            $package->cut_price = $request["price"];
            $package->details = $request["detail"];
            $package->addon = $request["addon"];
            $package->description = $request["description"];
            $package->brand_id = $request["brand"];
            $package->service_id = $request["service"];
            $package->status = $request["status"];

            $package->save();
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
        $package = Packages::find($id);
        $status = Status::select('id', 'name')->get();
        $service = Services::select('id', 'name')->get();
        $currency = Currencies::select('id', 'name')->get();
        $brand = Brands::select('id', 'name')->get();
        return view('admin.package.edit', compact('package', 'service', 'status', 'currency', 'brand'));
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
        $package = Packages::find($id);
        $status = Status::select('id', 'name')->get();
        $service = Services::select('id', 'name')->get();
        $currency = Currencies::select('id', 'name')->get();
        $brand = Brands::select('id', 'name')->get();
        return view('admin.package.edit', compact('package', 'service', 'status', 'currency', 'brand'));
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
            'currency' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'addon' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'service' => 'required',
            'status' => 'required',
        ]);


        try {
            $package = Packages::find($id);

            $package->name = $request["name"];
            $package->currencies_id = $request["currency"];
            $package->price = $request["price"];
            $package->details = $request["detail"];
            $package->addon = $request["addon"];
            $package->description = $request["description"];
            $package->brand_id = $request["brand"];
            $package->service_id = $request["service"];
            $package->status = $request["status"];

            $package->save();
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
            Packages::destroy($id);
            return back()->with('success', "Delete successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }
}