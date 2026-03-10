<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('employees', [EmployeeController::class, 'employeesPage']);
Route::any('view_employees', [EmployeeController::class, 'index']);
Route::any('employee-view/{id}', [EmployeeController::class, 'showEmployee']);
Route::any('tasks_store', [TaskController::class, 'savetasks']);
