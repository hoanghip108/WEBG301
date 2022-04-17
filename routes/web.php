<?php

use App\Http\Controllers\PuppyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

Route::get('/login', [
    UserAuthController::class, 'index'
]);
Route::post('/login', [
    'uses' => 'App\Http\Controllers\UserAuthController@login',
    //    UserAuthController::class,'login',
    'as' => 'user.login'
]);
<<<<<<< HEAD
Route::prefix('homepage')->group(function () {
    Route::get('/Main', [PuppyController::class, 'index'])->name('puppy.index');
    Route::get('/create',[PuppyController::class,'create'])->name('puppy.create');
    Route::post('/create',[PuppyController::class,'store'])->name('puppy.store');
    Route::get('/delete/{id}', [PuppyController::class, 'confirm'])->name('puppy.confirm');
    Route::get('/update/{id}',[PuppyController::class,'edit'])->name('puppy.edit');
    Route::post('/update/{id}', [PuppyController::class, 'update'])->name('puppy.update');
});

=======
>>>>>>> d21c4e8aacedb8f10754ad98a4244cf73fdaac67

Route::get('/Main', [
    'uses' => 'App\Http\Controllers\PuppyController@index',
    'as' => 'puppy.index'
]);
Route::get('/register', [
    'uses' => 'App\Http\Controllers\RegisterController@index',
    'as' => 'user.register'
]);
