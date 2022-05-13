<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TaskController;
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
    return view('layouts.main');
});

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/lessons', function () {
    return \App\Models\Lesson::all();
});

Route::get('/clients', function () {
    return \App\Models\Client::all();
});

Route::get('/teachers', function () {
    return \App\Models\Teacher::all();
});

Route::get('/arts', function () {
    return \App\Models\Art::all();
});

Route::get('/statistics', function () {
    return 'statistics';
});
