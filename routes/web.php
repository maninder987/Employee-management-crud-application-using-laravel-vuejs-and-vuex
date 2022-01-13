<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

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

Route::get('/about', function () {
    return view('example');
});

Route::get('add-employee', [EmployeesController::class, 'create']);

Route::post('save-employee',  [EmployeesController::class, 'storeEmployee']);

Route::get('employees',  [EmployeesController::class, 'index']);

Route::post('get-employee-data', [EmployeesController::class, 'getEmployeeData']);

Route::get('edit-employee/{id}/edit', [EmployeesController::class, 'edit']);

Route::get('fetch-employee-data/{id}', [EmployeesController::class, 'getEmployeeDataById']);

Route::put('update-employee/{id}', [EmployeesController::class, 'update']);

Route::get('show-employee/{id}', [EmployeesController::class, 'show']);

Route::delete('delete-employee/{id}', [EmployeesController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
