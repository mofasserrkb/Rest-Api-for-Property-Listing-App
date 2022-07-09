<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
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
//public Route 
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/listings',[ListingController::class,'index']);
Route::get('/listings/{id}',[ListingController::class,'show']);
// Route::get('/listings/search/{propertyname}/{price}',[ListingController::class,'search']);
Route::post('/listings/search',[ListingController::class,'search']);


//protected Route
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::put('/listings/{id}',[ListingController::class,'update']); 
    Route::post('/listings',[ListingController::class,'store']);
    Route::delete('/listings/{id}',[ListingController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
}
);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
