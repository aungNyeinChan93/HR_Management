<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::query()->latest()->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::query()->orderBy('title','asc')->get();
        return view('employees.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        dd($request->all());
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

    public function ssd()
    {
        $employees = User::query()->with('department')->latest();
        return DataTables::of($employees)
            ->addColumn('department name', function ($each) {
                return $each->department ? strtoupper($each->department->title) : "null";
            })
            ->editColumn("is_active", function ($each) {
                return $each->is_active == 1 ? '<span class="badge badge-success p-1 rounded">Present</span>' : '<span class="badge badge-success p-1 rounded">Leave</span>';
            })
            ->rawColumns(['is_active']) //for html tags
            ->make(true);
    }
}
