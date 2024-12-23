<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\UserLoginJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //index
    public function index(){
        $users = User::query()->latest()->get();
        UserLoginJob::dispatch(auth()->user());
        return view('user.home',compact('users'));
    }
}
