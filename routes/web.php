<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
Route::post('/tasks', [TaskController::class, 'store'])->name('addTask');
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::post('/tasks/{id}', [TaskController::class, 'destroy']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/', function () {
    return view('tasks');
});
