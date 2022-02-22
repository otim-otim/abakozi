<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
