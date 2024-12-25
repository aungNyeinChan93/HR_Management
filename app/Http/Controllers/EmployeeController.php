<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreEmployeeRequest;

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
        $departments = Department::query()->orderBy('title', 'asc')->get();
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('employee_profileImage', 'public');
            $data['profile_image'] = $path;
        }

        $data['password'] = Hash::make($request->password);

        $user = User::create(attributes: $data);

        Alert::success('Success Employee Create', 'Success Message');

        return to_route('employees.index')->with('success', 'employee create success!');

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
        $employee = User::findOrFail($id);
        $departments = Department::query()->get();
        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEmployeeRequest $request, string $id)
    {
        $employee = User::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('profile_image')) {

            if (file_exists(public_path('storage/' . $employee->profile_image))) {
                File::delete(public_path('storage/' . $employee->profile_image)); //unlink
            }

            $path = $request->file('profile_image')->store('employee_profileImage', 'public');
            $data['profile_image'] = $path;

        } else {

            $data['profile_image'] = $employee->profile_image;

        }
        $data['password'] = Hash::make($request->password);

        $employee->update($data);

        return to_route('employees.index')->with('success', 'employee update success!');

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
            ->editColumn('created date', function ($each) {
                return $each->created_at ? $each->created_at->format('j-F-Y') : "";
            })
            ->editColumn('updated date', function ($each) {
                return $each->updated_at ? $each->updated_at->format('j-F-Y') : "";
            })
            ->addColumn('action', function ($each) {
                $edit = "<a href=" . route('employees.edit', $each->id) . " class='btn btn-sm btn-warning mx-1'>Edit</a>";
                $info = "<a href=" . route('employees.show', $each->id) . " class='btn btn-sm btn-info mx-1'>Detail</a>";
                return '<div class="d-flex ">' . $edit . $info . '</div>';
            })
            ->rawColumns(['is_active', 'action']) //for html tags
            ->make(true);
    }
}
