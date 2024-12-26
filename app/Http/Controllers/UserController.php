<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //index
    public function index(Request $request)
    {
        $users = User::with('department')->when($request->search, function ($query) use ($request) {
            $query->whereAny(['name', 'email'], 'like', '%' . $request->search . '%');
        })
        ->latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    //show
    public function show(User $user)
    {

        Alert::success('Test', 'Success Message');

        return view('users.show', compact("user"));
    }

    // destory
    public function destory(User $user)
    {

        Gate::authorize('delete', $user);

        if (file_exists(public_path('storage/' . $user->profile_image))) {
            File::delete(public_path('storage/' . $user->profile_image));
        }

        $user->delete();

        return to_route('users.index')->with('success', 'user delete success!');
    }
}
