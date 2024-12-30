<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Jobs\EmployeeCreateJob;
use App\Mail\EmployeeCreateMail;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

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
        $roles =Role::query()->get();
        $departments = Department::query()->orderBy('title', 'asc')->get();
        return view('employees.create', compact('departments','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        // dd(request()->all());
        $data = $request->except('roles');

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('employee_profileImage', 'public');
            $data['profile_image'] = $path;
        }

        $data['password'] = Hash::make($request->password);

        $user = User::create(attributes: $data);

        $user->syncRoles($request->roles);  //can use => assignRole and removeRole

        EmployeeCreateJob::dispatch($user);

        Alert::success('Success Employee Create', 'Success Message');

        return to_route('employees.index')->with('success', 'employee create success!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = User::with('department')->findOrFail($id);
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::query()->get();
        $employee = User::findOrFail($id);
        $departments = Department::query()->get();
        return view('employees.edit', compact('employee', 'departments','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $employee = User::findOrFail($id);

        $data = $request->except('roles');

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

        $employee->syncRoles($request->roles); // update roles

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
                // $delete = "<a href=" . route('employees.destory', $each->id) . " class='btn btn-sm btn-info mx-1'>Delete    </a>";
                return '<div class="d-flex ">' . $info . $edit .     '</div>';
            })
            ->addColumn("profile_image",function($each){
                return $each->profile_image ? '<img class="w-75 p-2 rounded img-fluid" src='.asset('storage/'.$each->profile_image).' /"> ' : '<img class="w-75 rounded p-2 img-fluid" src='.asset('images/default.png').'  />';
            })
            ->addColumn('roles',function($each){
                return $each->roles->map(function($role) {
                    return '<small class=" my-1 badge badge-danger p-1 mx-1">' . $role->name . '</small>';
                })->implode(' ');
            })
            ->rawColumns(['is_active', 'action','profile_image','roles']) //for html tags
            ->make(true);
    }
}
