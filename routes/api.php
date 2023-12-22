<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FavMedController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ClassificationController;
use App\Models\Med;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth Routes  
Route::group(['prefix' => 'auth'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login','login');
        Route::post('register','register');

        Route::post('loginWeb','loginWeb');
        Route::post('registerWeb','registerWeb');

        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::get('logout','logout');
            Route::get('user','user');
        });
    });
});

// Med Routes
Route::controller(MedController::class)->group(function () {
    Route::post('medStore', 'medStore');
    Route::post('medSearch', 'medSearch');
    Route::get('medShow/{id}', 'medShow')->middleware('auth');
});

//Order Routes
Route::controller(OrderController::class)->group(function () {
    Route::post('orderStore', 'orderStore');
    Route::get('orderShow/{id}', 'orderShow');
});

Route::post('favStore', [FavMedController::class, 'favStore']);

Route::get('companyShow',[CompanyController::class, 'companyShow']);

Route::get('classShow',[ClassificationController::class, 'classShow']);
