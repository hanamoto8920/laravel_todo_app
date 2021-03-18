<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

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

// ホーム
Route::get('home', [HomeController::class, 'top']);

// Todoサイト
// Route::resource('todo',TodoController::class);
Route::get('/todo/index', [TodoController::class, 'index']);
Route::get('/todo/create', [TodoController::class, 'create']);
Route::post('/todo/create', [TodoController::class, 'store']);
Route::get('/todo/edit', [TodoController::class, 'edit']);
Route::post('/todo/edit', [TodoController::class, 'update']);
Route::get('/todo/destroy', [TodoController::class, 'destroy']);
Route::post('/todo/destroy', [TodoController::class, 'delete']);