<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>'notLogin'],function (){
    Route::get('/admin',[\App\Http\Controllers\FirstController::class,'admin'])->name('admin');
});
Route::get('/reg',[\App\Http\Controllers\FirstController::class,'reg'])->name('reg');
Route::post('/reg/registered',[\App\Http\Controllers\FirstController::class,'registered'])->name('registered');


Route::get('/appguard',[\App\Http\Controllers\FirstController::class,'show']);
Route::get('/exomaple',[\App\Http\Controllers\FirstController::class,'see']);


Route::get('/index',[\App\Http\Controllers\FirstController::class,'new_index']);


//ForCache and Observers


Route::get('/cache',[\App\Http\Controllers\CacheController::class,'cache']);
