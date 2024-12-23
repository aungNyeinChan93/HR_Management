<?php


use App\Jobs\TestJob;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('test.home');
// })->name('home');

Route::group(['prefix'=>'test'],function(){

    Route::get('job/{name}',function($name){
       TestJob::dispatch($name);
       dump('Job dispatched');
    });
});
