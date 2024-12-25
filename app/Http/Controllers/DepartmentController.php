<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    //index
    public function index(){
        $departments =Department::query()->get();
        return view('departments.index',compact('departments'));
    }

    // ssd
    public function ssd(){
        $departments =Department::query();
        return DataTables::of($departments)
        ->addColumn('action',function($each){
            $detail = '<a href='.route('departments.show',$each->id).'> <span class="btn btn-sm btn-primary mx-1">Detail</span></a>';
            $delete = '<a href='.route('departments.destory',$each->id).'> <span class="btn btn-sm btn-danger mx-1">Delete</span></a>';
            return $detail. $delete;
        })
        ->editColumn('created_at',function($each){
            return $each->created_at != "" ? $each->created_at->format('j-F-Y') :'- ';
        })
        ->rawColumns(['action'])
        ->make(true);

    }

    //show
    public function show(Department $department){
        dump($department->toArray());
    }

    //create
    public function create(){
        return view('departments.create');
    }

    // store
    public function store(Request $request){
        $fields = $request->validate([
            'title'=>'required',
        ]);

        Department::create($fields);

        return to_route('departments.index')->with('success','department create success!');
    }

    // destory
    public function destory($id){
        Department::findOrFail($id)->delete();
        return back()->with('success',"Department Delete Success!");
    }
}
