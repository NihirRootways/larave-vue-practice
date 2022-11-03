<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = RoleResource::collection(Role::get());
        return Inertia::render('Roles/Index',compact('roles'));
    }
    public function create()
    {
        return Inertia::render('Roles/Create');
    }
    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required', 'min:3','unique:roles,name']
        ]);
        Role::create([
            'name'=>$request->name,
        ]);
        return Redirect::route('role.index')->with('message', 'Role created successfully.');
    }
    public function edit(Role $role)
    {
        return Inertia::render('Roles/Edit', compact('role'));
    }
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'unique:roles,name,'.$role]
        ]);
        $role->update([
            'name' => $request->name,
        ]);
        return Redirect::route('role.index')->with('message', 'Role updated successfully.');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return Redirect::back()->with('message', 'Role deleted successfully.');
    }
}
