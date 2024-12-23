<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index',compact('users'));
    }

    // destory
    public function destory(User $user){
        Gate::authorize('delete',$user);
        $user->delete();
        return to_route('users.index')->with('success','user delete success!');
    }
}
