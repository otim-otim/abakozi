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


Route::group(['middleware' => 'api','prefix'=>'auth'], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::group(['middleware' => 'api'], function ($router) {
// company api routes
    Route::post('/company/add', [CompanyController::class, 'store'])->name('api.company.store');
    Route::get('/companies', [CompanyController::class, 'index'])->name('api.company.index');
    Route::get('/company/{id}', [CompanyController::class, 'show'])->name('api.company.show');
    Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('api.company.edit');
    Route::put('/company/edit/{id}', [CompanyController::class, 'update'])->name('api.company.update');
    Route::delete('/company/delete/{id}', [CompanyController::class, 'destroy'])->name('api.company.destroy');

// employee api routes
    Route::post('/company/{id}/employee/add', [EmployeeController::class, 'store'])->name('api.employee.store');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('api.employee.index');
    Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('api.employee.show');
    Route::get('/company/{com}/employees/', [EmployeeController::class, 'indexComEmployees'])->name('api.company.employees');
    Route::put('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('api.employee.edit');
    Route::put('/employee/{id}/edit', [EmployeeController::class, 'update'])->name('api.employee.update');
    Route::delete('/employee/{id}/delete', [EmployeeController::class, 'destroy'])->name('api.employee.destroy');

});
