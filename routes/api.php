<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EmployeeController;
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

Route::get('/user/{engname}', [EmployeeController::class, 'user']);

Route::get('/userall', [EmployeeController::class, 'userall']);

Route::get('/id/{id}', [EmployeeController::class, 'id']);

Route::get('/organization', [EmployeeController::class, 'organization']);

Route::get('/user_org/{id}', [EmployeeController::class, 'user_org']);

Route::get('/organizationAll', [EmployeeController::class, 'organizationAll']);

Route::get('/organizationNowAll', [EmployeeController::class, 'organizationNowAll']);
