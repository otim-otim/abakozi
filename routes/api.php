<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/company/add', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company/add', [CompanyController::class, 'store'])->name('company.store');
Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/{id}', [CompanyController::class, 'show'])->name('company.show');
Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/company/edit/{id}', [CompanyController::class, 'update'])->name('company.update');
Route::delete('/company/delete/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');

Route::get('/company/{id}/employee/add', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/company/{id}/employee/add', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/company/{com}/employees/', [EmployeeController::class, 'indexComEmployees'])->name('company.employees');
Route::put('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{id}/edit', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{id}/delete', [EmployeeController::class, 'destroy'])->name('employee.destroy');

Route::group(['middleware' => 'api','prefix'=>'auth'], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout']);
});
