<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
    Route::get('departments/create',[DepartmentController::class,'create'])->name('departments.create');
    Route::post('departments/create',[DepartmentController::class,'store'])->name('departments.store');
    Route::get('departments/{department}',[DepartmentController::class,'show'])->name('departments.show');
    Route::get('departments/{department}/delete',[DepartmentController::class,'destory'])->name('departments.destory');
    Route::get('departments/dataTables/ssd',[DepartmentController::class,'ssd'])->name('departments.ssd');

    // roles
    Route::resource('roles',RoleController::class);
    Route::get('roles/dataTables/ssd',[RoleController::class,'ssd']);

    // permissions
    Route::resource('permissions',PermissionController::class);
    Route::get('permissions/dataTables/ssd',[PermissionController::class,'ssd']);
});

