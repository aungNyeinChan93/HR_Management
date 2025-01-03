<?php


use App\Models\Department;
use App\Models\User;
use App\Jobs\TestJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('test.home');
// })->name('home');

Route::group(['prefix' => 'test'], function () {

    Route::get('job/{name}', function ($name) {
        TestJob::dispatch($name);
        dump('Job dispatched');
    });


    Route::get('name', function () {
        $user = User::find(10);
        dump($user->upperName());
    });


    Route::get('roles/HR', function () {
        if (auth()->user()) {
            if (!auth()->user()->hasRole('HR')) {
                abort(403);
            }
            return "welcome";
        } else {
            return redirect('/login');
        }
    });

    Route::get('permissions/edit_employees', function () {
        try {
            if (!auth()->user()?->can('edit_employees')) {
                abort(403);
            }
            return "welcome";

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    });

    Route::get('roles/middleware', function () {
        return 'welcome';
    })->middleware(['role:HR']);

    Route::get('permissions/SSS', function () {
        if (!auth()->user()->can('SSS')) {
            abort(403, 'danger alert!!!');
        }
        return 'welcome to SSS service!';
    });

    Route::get('permissions/SSS/middleware', function () {
        return 'welcome to SSS service! {middleware}';
    })->middleware(['permission:SSS']);


    Route::get('permissions/promotion', function () {
        if (auth()->user()->can('promotion')) {
            dump('promotion frature success');
        } else {
            abort('403', 'only sale team can manage');
        }
        dd('promotion feature!');
    })->name('promotion')->middleware('can:promotion');


    //api
    Route::get('testAll', function () {
        $users = DB::table('users')->select('name', 'email', 'password')->get();
        return view('test.all', compact('users'));
    });

    // fetch and render by blade
    Route::get("departments", action: function (): string {
        $departments = Department::query()->get();
        return view('test.department', compact('departments'))->render();
    });

    // fetch api
    Route::get('users', function () {
        try {
            $res = file_get_contents('http://localhost:8000/api/users');
            $users = json_decode($res);
            return view('test.users', compact($users))->render();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    });

    //double api
    Route::get('roles', function () {
        $res = Http::timeout(60)->get('http://localhost:8000/api/roles');
        $roles = $res->json();
        return $roles;
    });

    // external api
    // Route::get("products",function(){
    //     $res = Http::timeout(60)->get('https://fakestoreapi.com/products');
    //     $products = $res->json();
    //     return view('test.products',compact('products'))->render();
    // });

    // testForm
    Route::get('form',function(){
        return view('test.form');
    })->name('testForm');

});


