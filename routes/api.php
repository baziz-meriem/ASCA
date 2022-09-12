<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdhesionController;
use App\Http\Controllers\SignalementController;
use App\Http\Controllers\ContributionController;



Route::group(['prefix' => 'auth'], function () {
    Route::post('Register', [AuthController::class, 'Register']);
    Route::post('SignIn', [AuthController::class, 'SignIn']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
    });
});

//the token must have this scope to access the route
Route::group(['prefix' => 'citoyen', 'middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'scope:citoyen'], function () {
        Route::get('/citoyen-scope', function () {
            return response()->json([
                'message' => 'Citizen can access this',
                'status_code' => 200
            ], 200);
        });
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'scope:administrateur'], function () {
        Route::get('/admin-scope', function () {
            return response()->json([
                'message' => 'Admin can access this',
                'status_code' => 200
            ], 200);
        });
    });
});






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
//coppied Routes
// Signalement API Routes

/*Get BY User_Id */
Route::get('signalement/User/{id}', [SignalementController::class, "findByUser"]);
/* Get All Signalements */
Route::get('signalement', [SignalementController::class, "index"]);
/* ADD One Signalement */
Route::post('signalement', [SignalementController::class, 'store']);
/* Get Signalements by Id*/
Route::get('signalement/{signalement}', [SignalementController::class, "show"]);
/* update Signalement */
Route::patch('signalement/{signalement}', [SignalementController::class, "update"]);
/* Delete */
Route::delete('signalement/{signalement}', [SignalementController::class, 'destroy']);


/* Get All Users */
Route::get('users', [UserController::class, "index"]);
/* Get User By Id */
Route::get('users/{user}', [UserController::class, "show"]);
/*Get the user stats */
Route::get('user/stats/{user}', [UserController::class, "stats"]);
/* Update user infos */
Route::patch('user/{user}', [UserController::class, "update"]);
// Contribution API Routes

//Get All Contributions
Route::get('getOverview/Contribution', [ContributionController::class, "getContribution_overview"]);
//deleting from database
Route::delete("delete/Contribution/{id}", [ContributionController::class, 'delete']);
//updating the deleted field in the database
Route::put("updateTable/Contribution/{id}", [ContributionController::class, 'deleteTable']);
//storing newdata in database
Route::post('store/Contribution', [ContributionController::class, 'store']);
//duplicating databasedata
Route::post('duplicate/Contribution/{id}', [ContributionController::class, 'duplicate']);
//get database Forms data
Route::get("get/Contribution/{id}", [ContributionController::class, 'getContribution']);
//updating database  Forms data
Route::patch("update/Contribution/{id}", [ContributionController::class, 'update']);
// Get contributions of a specific user
Route::get("contribution/user/{user}", [ContributionController::class, 'getByUser']);

//for fetching all 3 tables data
Route::get("fetch/{id}", [ContributionController::class, 'fetch']);
//for real deletion from database
Route::delete("delete/Signalement/{id}", [SignalementController::class, 'delete']);
Route::delete("delete/Adhesion/{id}", [AdhesionController::class, 'delete']);
//updating the deleted field in the database
Route::put("updateTable/Adhesion/{id}", [AdhesionController::class, 'deleteTable']);
Route::put("updateTable/Signalement/{id}", [SignalementController::class, 'deleteTable']);
//duplicating databasedata
Route::post('duplicate/Adhesion/{id}', [AdhesionController::class, 'duplicate']);
Route::post('duplicate/Signalement/{id}', [SignalementController::class, 'duplicate']);

Route::get('adhesion/bureau/{id}', [AdhesionController::class, "findByBureau"]);
/* Get All Adhesions */
Route::get('adhesion', [AdhesionController::class, "index"]);
/* ADD One Adhesion */
Route::post('adhesion', [AdhesionController::class, 'store']);
/* Get Adhesion by Id*/
Route::get('adhesion/{adhesion}', [AdhesionController::class, "show"]);
/* update Adhesion */
Route::patch('adhesion/{adhesion}', [AdhesionController::class, "updateAdhesion"]);
/* Delete */
Route::delete('adhesion/{adhesion}', [AdhesionController::class, 'destroy']);
