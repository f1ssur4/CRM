<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtController;
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

Route::view('/', 'main')->name('/');


Route::name('users.')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::view('/create', 'users.create-form')->name('create');

        Route::post('/create', [UserController::class, 'createUser'])->name('create');

    });

});


Route::name('tasks.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/tasks', [TaskController::class, 'index'])->name('list');

        Route::post('/tasks/ready', [TaskController::class, 'ready'])->name('ready');

        Route::middleware('high.authorize')->group(function () {

            Route::get('/tasks/add', [TaskController::class, 'formCreate'])->name('add');

            Route::post('/tasks/add', [TaskController::class, 'create'])->name('add');

        });

    });

});


Route::name('clients.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/clients', [ClientController::class, 'index'])->name('index');

        Route::match(['post', 'get'], '/clients/sort', [ClientController::class, 'sortBy'])->name('sort');

        Route::get('/clients/{id}', [ClientController::class, 'show'])->name('show');

        Route::post('/clients/update', [ClientController::class, 'update'])->name('update');

        Route::post('/clients/add-subscription', [ClientController::class, 'addSubscription'])->name('add-subs');

    });

});


Route::name('instructors.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/instructors', [InstructorController::class, 'index'])->name('index');

        Route::get('/instructors/{id}', [InstructorController::class, 'show'])->name('show');

        Route::post('/instructors/update', [InstructorController::class, 'update'])->name('update');

    });
});


Route::name('arts.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/arts', [ArtController::class, 'index'])->name('index');

        Route::get('/arts/{id}', [ArtController::class, 'show'])->name('show');


    });
});


Route::get('/statistics', function () {
    //
})->name('statistics');

Route::name('lessons.')->group(function () {

    Route::get('/lessons', function () {
        return 123;
    })->middleware('auth')->name('main');

});


