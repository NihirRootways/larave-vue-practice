<?php

namespace App\Http\Controllers;

use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = PermissionResource::collection(Permission::get());
        return Inertia::render('Permissions/Index',compact('permissions'));
    }
    public function create()
    {
        return Inertia::render('Permissions/Create');
    }
    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required', 'min:3','unique:permissions,name']
        ]);
        Permission::create([
            'name'=>$request->name,
        ]);
        return Redirect::route('permission.index')->with('message', 'Permission created successfully.');
    }
    public function edit(Permission $permission)
    {
        return Inertia::render('Permissions/Edit', compact('permission'));
    }
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'unique:permissions,name'.$request->id]
        ]);
        $permission->update([
            'name' => $request->name,
        ]);
        return Redirect::route('permission.index')->with('message', 'Permission updated successfully.');
    }
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return Redirect::back()->with('message', 'Permission deleted successfully.');
    }
}
