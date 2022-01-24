<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//ForApi

Route::get('/getnews',[\App\Http\Controllers\ForApiController::class,'index']);
Route::get('/getnews/{id}',[\App\Http\Controllers\ForApiController::class,'show']);

Route::post('/insert',[\App\Http\Controllers\ForApiController::class,'store']);

Route::post('/token',[\App\Http\Controllers\ForApiController::class,'register']);

