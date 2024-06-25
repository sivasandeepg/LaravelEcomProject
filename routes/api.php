<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\FruitsController;
use App\Http\Controllers\TestingrController;  
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
 

Route::any('/test',[TestingrController::class,'testing_code']); 


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 
// save firebase login data
Route::any('firebase_login',[LoginController::class,'firebase_login']); 
 
// for testing session 
Route::any('setsen',[LoginController::class,'setsen']); 
  
// admin panel
Route::any('fruitsadd',[FruitsController::class,'fruitsadd'])->name('adminproducts.fruitsadd');
Route::any('fruite_list',[FruitsController::class,'fruite_list']); 

//website
Route::any('products',[FruitsController::class,'getProducts']);
