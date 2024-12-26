<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::query()->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::query()->get();
        return view('roles.create',compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->permissions);

        $fileds = $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create($fileds);

        // $role->givePermissionTo($request->permissions);
        $role->syncPermissions($request->permissions); //arg=> array[]

        return to_route('roles.index')->with('success', 'Role Create Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role=Role::findOrFail($id);
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role= Role::findOrFail($id);
        $permissions = Permission::query()->get();
        return view('roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $role= Role::find($id);

        // $role->revokePermissionTo($role->permissions);
        $role->syncPermissions($request->permissions);

        $role->update([
            'name'=>$request->name
        ]);



        return to_route('roles.index')->with('success','Role Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::findOrFail($id)->delete();

        return to_route('roles.index')->with('success','Delete Success!');
    }

    public function ssd()
    {
        $roles = Role::query();

        return DataTables::of($roles)
            ->editColumn('created_at', function ($each) {
                return $each->created_at->format('j-F-Y');
            })
            ->addColumn('action', function ($each) {
                $detail = '<span> <a href=' . route('roles.show', $each->id) . ' class="btn btn-sm btn-info p-1  mx-1"/>Detail</span>';
                return '<div> '.$detail.' </div>';
            })
            ->addColumn('permissions', function($each) {
                return $each->permissions->map(function($permission) {
                    return '<small class=" my-1 badge badge-info p-1 mx-1">' . $permission->name . '</small>';
                })->implode(' ');
            })
            ->rawColumns(['action','permissions']) //for html tags
            ->make(true);
    }
}
