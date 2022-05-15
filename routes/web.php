<?php

use App\Http\Controllers\TaskController;
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

Route::name('user.')->group(function () {

    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
});

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/lessons', function () {
    //
});

Route::get('/clients', function () {
    //
});

Route::get('/teachers', function () {
    //
});

Route::get('/arts', function () {
    //
});

Route::get('/statistics', function () {
    //
});

