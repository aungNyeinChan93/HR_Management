<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    //index
    public function index(){
        return view('company.index');
    }

    // create

public function create(){
    return view('company.create');
}
}
