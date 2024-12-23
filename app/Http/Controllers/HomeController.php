<?php

namespace App\Http\Controllers;

use App\Jobs\UserLoginJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //index
    public function index(){
        UserLoginJob::dispatch(auth()->user());
        return view('user.home');
    }
}
