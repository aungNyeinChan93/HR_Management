<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
require_once __DIR__ . '/test.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// home
Route::get('/',[HomeController::class,'home'])->name('home');

// users
Route::get("users",[UserController::class,'index'])->name('users.index');
Route::delete("users/delete/{user}",[UserController::class,'destory'])->name('users.destory');

// employees
Route::resource('employees',EmployeeController::class);
Route::get('employees/dataTables/ssd',[EmployeeController::class,'ssd']);
