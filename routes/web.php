<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
require_once __DIR__ . '/test.php';


// welcome page
Route::redirect('/',"welcome",302);

Route::get('welcome',function(){
    return view('welcome.index');
})->name('welcome.index');


Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // home
    Route::get('/home',[HomeController::class,'home'])->name('home');

    // users
    Route::get("users",[UserController::class,'index'])->name('users.index');
    Route::get("users/{user}",[UserController::class,'show'])->name('users.show');
    Route::delete("users/delete/{user}",[UserController::class,'destory'])->name('users.destory');

    // employees
    Route::resource('employees',EmployeeController::class);
    Route::get('employees/dataTables/ssd',[EmployeeController::class,'ssd']);

    // Departments
    Route::get('departments',[DepartmentController::class,'index'])->name('departments.index');
    Route::get('departments/{department}',[DepartmentController::class,'show'])->name('departments.show');
    Route::get('departments/dataTables/ssd',[DepartmentController::class,'ssd'])->name('departments.ssd');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

