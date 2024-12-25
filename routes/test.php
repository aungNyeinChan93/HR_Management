<?php


use App\Models\User;
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


    Route::get('name',function(){
        $user = User::find(10);
        dump($user->upperName());
    });
});

