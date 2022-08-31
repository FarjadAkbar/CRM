<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Currencies;
use App\Models\Invoices;
use App\Models\Projects;
use App\Models\UserRole;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Auth::user()->hasPermission('dashboard-access')) abort(403);
        $paidinvoice = Invoices::groupBy('currency')->where('payment_status', '=', '1')->select('currency',  \DB::raw('sum(amount) as amount'))->get();
        $unpaidinvoice = Invoices::groupBy('currency')->where('payment_status', '=', '0')->select('currency',  \DB::raw('sum(amount) as amount'))->get();

        $category = Category::where('status', '=', '1')->count();
        $brand = Brands::where('status', '=', '1')->count();
        $currency = Currencies::count();
        $projects = Projects::where('status', '=', '1')->count();
        $leads = Invoices::count();
        $paidleads = Invoices::where('payment_status', '=', '1')->count();
        $unpaidleads = Invoices::where('payment_status', '=', '0')->count();
        $sales = UserRole::groupBy('role_id')->where('role_id', '=', '2')->count();
        $production = UserRole::groupBy('role_id')->where('role_id', '=', '3')->count();

       
        
        return view('home', compact(
            'paidinvoice',
            'unpaidinvoice',
            'category',
            'brand',
            'currency',
            'projects',
            'leads',
            'paidleads',
            'unpaidleads',
            'production',
            'sales'
        ));

    }


    public function edit($id){
        $user = User::find(auth()->user()->id);
        // dd( );
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        try{
            if($request->password !== ""){
                if($request->password == $request->confirm_password){
                    $user = User::find(auth()->user()->id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = $request->password;
                    $user->save();
                }
                else{
                    return back()->with('error', "Password not match");        
                }
            }
            return back()->with('success', "Client Password Updated");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
        
    }
    // public function markread($id){
    //     if($id){
    //         auth()->user()->notifications->where('id',$id)->markAsRead();
    //         return "success";
    //     }
    //     return "fail";
    // }
}