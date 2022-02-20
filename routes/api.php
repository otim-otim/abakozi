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

Route::post('/company/create',[CompanyController::class,'create']);
Route::get('/companies',[CompanyController::class,'index']);
Route::get('/company/{id}',[CompanyController::class,'getCompany']);
Route::put('/company/{id}',[CompanyController::class,'editCompany']);
Route::delete('/company/{id}',[CompanyController::class,'deleteCompany']);

Route::post('/employee/create',[EmployeeController::class,'create']);
Route::get('/employees',[EmployeeController::class,'index']);
Route::get('/employee/{id}',[EmployeeController::class,'getEmployee']);
Route::get('/company/{com}/employees/',[EmployeeController::class,'comEmployees']);
Route::put('/employee/{id}/edit',[EmployeeController::class,'edit']);
Route::delete('/employee/{id}/delete',[EmployeeController::class,'remove']);
