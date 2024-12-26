<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
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
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileds = $request->validate([
            'name' => 'required',
        ]);

        Role::create($fileds);

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
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role= Role::find($id);
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
        $roles = Role::query()->latest();

        return DataTables::of($roles)
            ->editColumn('created_at', function ($each) {
                return $each->created_at->format('j-F-Y');
            })
            ->addColumn('action', function ($each) {
                $detail = '<span> <a href=' . route('roles.show', $each->id) . ' class="btn btn-sm btn-info p-1  mx-1"/>Detail</span>';
                return '<div> '.$detail.' </div>';
            })
            ->rawColumns(['action']) //for html tags
            ->make(true);
    }
}
