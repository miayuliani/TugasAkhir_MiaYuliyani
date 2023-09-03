<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/user/add_data', [AuthController::class, 'add_data']);
Route::post('/data_user/user_add_data', [AuthController::class, 'user_add_data']);

// dashboard
Route::get('/', [DashboardController::class, 'index']);
Route::post('/data_admin/admin_get_data_all', [DashboardController::class, 'admin_get_data_all']);
Route::post('/data_admin/admin_add_data', [DashboardController::class, 'admin_add_data']);
Route::post('/data_admin/admin_delete_data', [DashboardController::class, 'admin_delete_data']);
Route::post('/data_admin/admin_view_data', [DashboardController::class, 'admin_view_data']);
