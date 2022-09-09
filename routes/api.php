<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::group(['prefix' => 'auth'],function(){
    Route::post('Register',[AuthController::class, 'Register']);
    Route::post('SignIn',[AuthController::class, 'SignIn']);

    Route::group(['middleware' => 'auth:api'],function (){
        Route::get('logout',[AuthController::class, 'logout']);

    });

});
Route::group(['prefix' => 'user'],function(){
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('create-category', function () {
            return response()->json([
                'message' => 'Admin access',
                'status_code' => 200
            ],200);
        })->middleware('scope:do-anything');//the access token must have this scope to access the route (only admin)
        Route::post('edit-category', function () {
            return response()->json([
                'message' => 'Everyone access',
                'status_code' => 200
            ],200);
        })->middleware('scope:do-anything,can-create');   // comma means or 
    });
});

Route::resource('categories','CategoryController');

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
