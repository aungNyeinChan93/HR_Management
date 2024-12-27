<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    //index
    public function index(){
        $company = CompanySetting::query()->first();
        return view('company.index',compact('company'));
    }

    // create
    public function create(){
        return view('company.create');

    }

    //store
    public function store(CreateCompanyRequest $createCompanyRequest){
        $data = $createCompanyRequest->all();
        if(auth()->user()->hasRole('CEO')){
            if(!CompanySetting::exists()){
                CompanySetting::create(attributes: $data);
            }else{
                return back();
            }
        }
        return to_route('company.index')->with('success','comapny create success!');
    }

    // edit
    public function edit($id){
        $company = CompanySetting::findOrFail($id);
        return view('company.edit',compact('company'));
    }

    // update
    public function update(CreateCompanyRequest $createCompanyRequest ,$id ){
        $company = CompanySetting::findOrFail($id);
        if(auth()->user()->hasRole('CEO')){
            $company->update($createCompanyRequest->all());
        }else{
            return back();
        }
        return to_route('company.index')->with('success','update');
    }

    // destory
    public function destory($id){

        $company = CompanySetting::findOrFail($id);
        if(auth()->user()->hasRole('CEO')){
            $company->delete();
        }else{
            return back();
        }
        return to_route('company.index');
    }
}
