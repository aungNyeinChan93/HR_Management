<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index',compact('users'));
    }

    //show
    public function show(User $user){
    
        Alert::success('Test', 'Success Message');

        return view('users.show',compact("user"));
    }

    // destory
    public function destory(User $user){

        Gate::authorize('delete',$user);

        $user->delete();

        return to_route('users.index')->with('success','user delete success!');
    }
}
