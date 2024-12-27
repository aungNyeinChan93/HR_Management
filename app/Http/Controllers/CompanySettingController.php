<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index(){
        $company = CompanySetting::query()->first();
        return view('company.index',compact('company'));
    }


    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\View
     */
    public function create(){
        return view('company.create');

    }


    /**
     * Summary of store
     * @param \App\Http\Requests\CreateCompanyRequest $createCompanyRequest
     * @return \Illuminate\Http\RedirectResponse
     */
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


    /**
     * Summary of edit
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id){
        $company = CompanySetting::findOrFail($id);
        return view('company.edit',compact('company'));
    }


    /**
     * Summary of update
     * @param \App\Http\Requests\CreateCompanyRequest $createCompanyRequest
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateCompanyRequest $createCompanyRequest ,$id ){
        $company = CompanySetting::findOrFail($id);
        if(auth()->user()->hasRole('CEO')){
            $company->update($createCompanyRequest->all());
        }else{
            abort('403',"only CEO can update!");
        }
        return to_route('company.index')->with('success','update');
    }


    /**
     * Summary of destory
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destory($id){

        $company = CompanySetting::findOrFail($id);
        if(auth()->user()->hasRole('CEO')){
            $company->delete();
        }else{
            return back();
        }
        return to_route('company.index')->with('success',$company->company_name . 'delete success');
    }
}
