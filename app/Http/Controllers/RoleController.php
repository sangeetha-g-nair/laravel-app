<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()

    {

         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','show']]);

         $this->middleware('permission:role-create', ['only' => ['create','store']]);

         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $data = Role::all();
        return view('roles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::all();
        return view('roles.create', compact('permission'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|unique:roles,name' ,
            'permission' => 'required'

        ]);

    

        $input = $request->all();

        $role = Role::create(['name' => $request->input('name')]);

        $permissions = $request->input('permission');

        $permissions = array_map(function ($item) {
        return (int)$item;
        }, $permissions);
        
        if (!empty($permissions)){
        $role->syncPermissions($permissions);
        }

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')

                        ->with('success','role created successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
