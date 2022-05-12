<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    return 'tasks';
});

Route::get('/lessons', function () {
    return 'lessons';
});

Route::get('/clients', function () {
    return 'clients-list';
});

Route::get('/teachers', function () {
    return 'teachers-list';
});

Route::get('/arts', function () {
    return 'arts';
});

Route::get('/statistics', function () {
    return 'statistics';
});
