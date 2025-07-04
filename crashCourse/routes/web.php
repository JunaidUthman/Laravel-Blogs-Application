<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PostController;


Route::redirect('/' , 'posts');
Route::resource('posts' ,PostController::class ); // if we use the resource methode , all the default functions in
                                                    //in postController will have there own route automaticly without writing it manually

                                                    
Route::middleware('auth')->group(function(){ // only authunticated users can access to this

    Route::post('/logout' , [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard' , [dashboardController::class , 'index'])->name('dashboard');

});

Route::middleware('guest')->group(function(){ //only unauthunticated users can access to this

    Route::view('/register' ,'auth.register')->name('register');

    Route::post('/register' , [AuthController::class, 'register']);
        
    Route::view('/login' ,'auth.login')->name('login');
    Route::post('/login' , [AuthController::class, 'login']);
});




