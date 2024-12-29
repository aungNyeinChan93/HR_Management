<?php

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(middleware: 'auth:sanctum');


Route::get("users",function(){
    return response()->json([
        'status'=>'success',
        'users'=>User::query()->get(),
    ]);
});

Route::get("roles",function(){
    return response()->json([
        'status'=>'success',
        'roles'=> Role::query()->get(),
    ]);
});

