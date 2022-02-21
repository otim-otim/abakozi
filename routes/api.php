<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::post('/company/add',[CompanyController::class,'store']);
Route::get('/companies',[CompanyController::class,'index']);
Route::get('/company/{id}',[CompanyController::class,'show']);
Route::put('/company/edit/{id}',[CompanyController::class,'update']);
Route::delete('/company/delete/{id}',[CompanyController::class,'destroy']);

Route::post('/company/{id}/employee/add',[EmployeeController::class,'store']);
Route::get('/employees',[EmployeeController::class,'index']);
Route::get('/employee/{id}',[EmployeeController::class,'show']);
Route::get('/company/{com}/employees/',[EmployeeController::class,'indexComEmployees']);
Route::put('/employee/{id}/edit',[EmployeeController::class,'update']);
Route::delete('/employee/{id}/delete',[EmployeeController::class,'destroy']);

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    
});
