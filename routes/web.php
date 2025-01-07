<?php

use App\Http\Controllers\ToDoListController;
use App\Http\Controllers\UserController;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);


Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware(\App\Http\Middleware\GuestLoginMiddleware::class);
    Route::post('/login', 'doLogin')->middleware(\App\Http\Middleware\GuestLoginMiddleware::class);
    Route::post('/logout', 'doLogout')->middleware(\App\Http\Middleware\MemberOnlyMiddleware::class);

});

Route::controller(ToDoListController::class)->middleware(\App\Http\Middleware\MemberOnlyMiddleware::class)->group(function () {

    Route::get('/todolist', 'todoList');
    Route::post('/todolist', 'addToDoList');
    Route::post('/todolist/{id}', 'removeToDoList');

});

