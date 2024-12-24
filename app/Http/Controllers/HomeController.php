<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\UserLoginJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //home
    public function home(){
        $users = User::query()->latest()->get();
        UserLoginJob::dispatch();
        return view('users.home',compact('users'));
    }
}
