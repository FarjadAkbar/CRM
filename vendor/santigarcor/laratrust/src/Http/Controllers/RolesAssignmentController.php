<?php

namespace Laratrust\Http\Controllers;

use Laratrust\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\UserCategory;
use App\Models\UserRole;

use Illuminate\Support\Facades\Auth;

class RolesAssignmentController
{
    protected $rolesModel;
    protected $permissionModel;
    protected $assignPermissions;

    public function __construct()
    {
        // if (!Auth::user()->hasPermission('setting-access')) abort(403);
        $this->rolesModel = Config::get('laratrust.models.role');
        $this->permissionModel = Config::get('laratrust.models.permission');
        $this->assignPermissions = Config::get('laratrust.panel.assign_permissions_to_user');
    }

    public function index(Request $request)
    {
        $modelsKeys = array_keys(Config::get('laratrust.user_models'));
        $modelKey = $request->get('model') ?? $modelsKeys[0] ?? null;
        $userModel = Config::get('laratrust.user_models')[$modelKey] ?? null;

        if (!$userModel) {
            abort(404);
        }


        return View::make('laratrust::panel.roles-assignment.index', [
            'models' => $modelsKeys,
            'modelKey' => $modelKey,
            'users' => $userModel::all(),
        ]);
    }

    public function create()
    {
        $roles = $this->rolesModel::orderBy('name')->get(['id', 'name', 'display_name']);
        // $category = $this->rolesModel::orderBy('name')->get(['id', 'name', 'display_name']);
        return View::make('laratrust::panel.roles-assignment.create', [
            'model' => null,
            'roles' => $roles,
            // 'permissions' => $this->permissionModel::all(['id', 'name']),
            'type' => 'role',
            'categories' => Category::where('status', '=', '1')->get(),
        ]);
    }

    public function store(Request $request)
    {
        if ($request->password != $request->confirm_password) {
            return back()->with('error', "Passwords do not match");
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'roles' => 'required',
            // 'category' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->category()->sync($request->category);
        $user->syncRoles($request->get('roles') ?? []);
        $modelKey = $user->getKey();
        Session::flash('laratrust-success', 'Roles and permissions assigned successfully');
        return redirect(route('laratrust.roles-assignment.index'));
    }

    public function edit(Request $request, $modelId)
    {
        $modelKey = $request->get('model');
        $userModel = Config::get('laratrust.user_models')[$modelKey] ?? null;

        if (!$userModel) {
            Session::flash('laratrust-error', 'Model was not specified in the request');
            return redirect(route('laratrust.roles-assignment.index'));
        }

        $user = $userModel::query()
            ->with(['roles:id,name', 'permissions:id,name'])
            ->findOrFail($modelId);

        $roles = $this->rolesModel::orderBy('name')->get(['id', 'name', 'display_name'])
            ->map(function ($role) use ($user) {
                $role->assigned = $user->roles
                    ->pluck('id')
                    ->contains($role->id);
                $role->isRemovable = Helper::roleIsRemovable($role);

                return $role;
            });
            
        return View::make('laratrust::panel.roles-assignment.edit', [
            'modelKey' => $modelKey,
            'roles' => $roles,
            // 'permissions' => $this->assignPermissions ? $permissions : null,
            'user' => $user,
            'categories' => Category::where('status', '=', '1')->get(),
        ]);
    }

    public function update(Request $request, $modelId)
    {

        $modelKey = $request->get('model');
        $userModel = Config::get('laratrust.user_models')[$modelKey] ?? null;

        if (!$userModel) {
            Session::flash('laratrust-error', 'Model was not specified in the request');
            return redirect()->back();
        }

        $user = $userModel::findOrFail($modelId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->syncRoles($request->get('roles') ?? []);
        $user->category()->sync($request->category);

        // $usercategory = UserCategory::where('user_id', '=', $modelId)->get();
        
        Session::flash('laratrust-success', 'Roles and permissions assigned successfully');
        return redirect(route('laratrust.roles-assignment.index', ['model' => $modelKey]));
    }
}