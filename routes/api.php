<?php

use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:api')->, function(){
//     Route::post('/users/signin', UserController::class,'signin');
//     Route::post('/users/signup', ShoppiUserControllerngController::class,'signup');
//     Route::post('/users', UserController::class,'index');
//     Route::get('/shopping', ShoppingController::class,'index');
//     Route::post('/shopping', ShoppingController::class,'create');
// }); 
// Route::resource('/users',UserController::class);
Route::get('/users', [UserController::class,'index']);
Route::post('/users/signin', [UserController::class,'signin']);
Route::post('/users/signup', [UserController::class,'signup']);

Route::get('/shopping', [ShoppingController::class,'index']);
Route::post('/shopping', [ShoppingController::class,'create']);
Route::get('/shopping/{id}', [ShoppingController::class,'index']);
Route::put('/shopping/{id}', [ShoppingController::class,'update']);
Route::delete('/shopping/{id}', [ShoppingController::class,'delete']);