<?php

use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatisticController;
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

Route::view('/workboard', 'workboard')->middleware(['auth', 'authorize'])->name('workboard');

Route::get('/info', [InfoController::class, 'index'])->middleware(['auth', 'authorize'])->name('info');



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

        Route::get('/clients/add', [ClientController::class, 'addView'])->name('add');

        Route::post('/clients/add', [ClientController::class, 'add'])->name('add');

        Route::get('/clients/search', [ClientController::class, 'search'])->name('search');

        Route::get('/clients/{id}', [ClientController::class, 'show'])->name('show');

        Route::post('/clients/update', [ClientController::class, 'update'])->name('update');

        Route::post('/clients/add-subscription', [ClientController::class, 'addSubscription'])->name('add-subs');

    });

});


Route::name('instructors.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/instructors', [InstructorController::class, 'index'])->name('index');

        Route::get('/instructors/add', [InstructorController::class, 'addView'])->name('add');

        Route::post('/instructors/add', [InstructorController::class, 'add'])->name('add');

        Route::get('/instructors/{id}', [InstructorController::class, 'show'])->name('show');

        Route::post('/instructors/update', [InstructorController::class, 'update'])->name('update');

    });
});


Route::name('arts.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/arts', [ArtController::class, 'index'])->name('index');

        Route::get('/arts/add', [ArtController::class, 'addView'])->name('add');

        Route::post('/arts/add', [ArtController::class, 'add'])->name('add');

        Route::get('/arts/{id}', [ArtController::class, 'show'])->name('show');


    });
});


Route::name('schools.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/schools/add', [SchoolController::class, 'addView'])->name('add');

        Route::post('/schools/add', [SchoolController::class, 'add'])->name('add');

    });
});


Route::name('statuses.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/statuses/add', [StatusController::class, 'addView'])->name('add');

        Route::post('/statuses/add', [StatusController::class, 'add'])->name('add');

    });
});


Route::name('subscriptions.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/subscriptions/add', [SubscriptionController::class, 'addView'])->name('add');

        Route::post('/subscriptions/add', [SubscriptionController::class, 'add'])->name('add');


    });
});


Route::name('lessons.')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::get('/lessons', [LessonController::class, 'index'])->name('index');

        Route::post('/lessons/add', [LessonController::class, 'add'])->middleware('authorize')->name('add');

        Route::post('/lessons/delete', [LessonController::class, 'deleteManually'])->middleware('authorize')->name('delete');


    });

});


Route::name('statistic.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/statistic', [StatisticController::class, 'index'])->name('index');

        Route::get('/statistic/convert', [StatisticController::class, 'convert'])->name('convert');

        Route::get('/statistic/clean-off', [StatisticController::class, 'cleanOff'])->name('clean-off');

    });
});


Route::name('requests.')->group(function () {
    Route::middleware(['auth', 'authorize'])->group(function () {

        Route::get('/requests', [ClientRequestController::class, 'index'])->name('index');

        Route::get('/requests/delete/{id}', [ClientRequestController::class, 'delete'])->name('delete');

    });
});







