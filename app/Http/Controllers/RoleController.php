<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:view role')->only(['index']);
    //     $this->middleware('permission:show role')->only(['show']);
    //     $this->middleware('permission:create role')->only(['create', 'store']);
    //     $this->middleware('permission:edit role')->only(['update', 'edit']);
    //     $this->middleware('permission:delete role')->only(['delete']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Role::all();
        $roles = Role::where('name', '!=', 'superadmin')->get();

        return view('pages.roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        // 1. Get all permissions from database
        $permissions = Permission::all();

        // 2. Group them by module (the last word in the name)
        $groupedPermissions = $permissions->groupBy(function ($item) {
            $parts = explode(' ', $item->name);
            return end($parts); // result: user, category, posts, etc.
        });

        return view('pages.roles.add', compact('groupedPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',

        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web', // default web
        ]);

        if ($role) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            // Assign permissions to role
            $role->givePermissionTo($permissions);

            return redirect()->route('roles.index')->with('success', 'Role added successfully.');
        } else {
            return redirect()->route('roles.index')->with('success', 'Failed to create role.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
{
    $role = Role::findOrFail($id);

    // Get current permission IDs for this role
    $roleHasPermissions = $role->permissions->pluck('id')->toArray();

    // Get all permissions and group them by module name (e.g. user, category)
    $groupedPermissions = Permission::all()->groupBy(function($permission) {
        $parts = explode(' ', $permission->name);
        return end($parts);
    });

    return view('pages.roles.edit', compact('role', 'groupedPermissions', 'roleHasPermissions'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $permissions = Permission::whereIn('id', $request->permissions)->get();

        // Remove permissions from role
        $role->syncPermissions();

        // Assign permissions to role
        $role->givePermissionTo($permissions);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found.');
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }


    public function showAssignRole()
    {
        // Except Superadmin Role and User Display all Roles & Users

        $users = User::whereNotIn('user_type', ['SuperAdmin'])->get();
        $roles = Role::where('name', '!=', 'superadmin')->get();

        // Display all Roles & Users
        // $users = User::all();
        // $roles = Role::all();

        return view('pages.roles.assign-role', compact('users', 'roles'));
    }



    public function assignRole(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|array',
            'role'    => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check invalid users
        $invalidUserIds = [];
        foreach ($request->user_id as $id) {
            if (!User::where('id', $id)->exists()) {
                $invalidUserIds[] = $id;
            }
        }

        if (!empty($invalidUserIds)) {
            return back()->with('error', "Invalid user IDs: " . implode(', ', $invalidUserIds));
        }

        // Fetch role normally from default DB
        $role = Role::where('name', $request->role)
            ->where('guard_name', 'web')
            ->first();


        if (!$role) {
            return back()->with('error', 'Role not found.');
        }

        foreach ($request->user_id as $id) {
            $user = User::find($id);

            if ($user) {
                // Assign role using Spatie if not already assigned
                if (!$user->hasRole($role->name)) {
                    $user->assignRole($role->name);
                }

                // Also update role_id in users table
                $user->role_id = $role->id;
                $user->save();
            }
        }
        return back()->with('success', 'Role assigned to selected users successfully');
    }
}
