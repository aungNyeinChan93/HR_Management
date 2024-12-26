<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::query()->get();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileds = $request->validate([
            'name' => 'required',
        ]);

        Permission::create($fileds);

        return to_route('permissions.index')->with('success', 'Permission Create Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission=Permission::findOrFail($id);
        return view('permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission= Permission::findOrFail($id);
        return view('permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $permission= Permission::find($id);
        $permission->update([
            'name'=>$request->name
        ]);
        return to_route('permissions.index')->with('success','Permisssion Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::findOrFail($id)->delete();

        return to_route('permissions.index')->with('success','Delete Success!');
    }

    public function ssd()
    {
        $permissions = Permission::query()->latest();

        return DataTables::of($permissions)
            ->editColumn('created_at', function ($each) {
                return $each->created_at->format('j-F-Y');
            })
            ->addColumn('action', function ($each) {
                $detail = '<span> <a href=' . route('permissions.show', $each->id) . ' class="btn btn-sm btn-info p-1  mx-1"/>Detail</span>';
                return '<div> '.$detail.' </div>';
            })
            ->rawColumns(['action']) //for html tags
            ->make(true);
    }
}
