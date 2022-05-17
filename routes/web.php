<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('main');
})->name('/');


Route::name('user.')->group(function () {

    /*
     * Login
     */
    Route::get('/login', function () {
        if (!Auth::check()) {
            return view('login');
        }
        return redirect(\route('/'));
    })->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('login');

    /*
     * Create user
     */
    Route::get('/create', function () {
        return view('create');
    })->middleware('authorize')->name('create');

    Route::post('/create', [UserController::class, 'create']);

    /*
    * Logout
    */
    Route::get('/logout', function () {
        session()->flush();
        Auth::logout();
        return redirect(route('user.login'))->withErrors([
            'successLogout' => 'You are successful logout'
        ]);
    })->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');

    Route::get('/lessons', function () {
        //
    })->name('lessons');

    Route::get('/clients', function () {
        //
    })->name('clients');

    Route::get('/teachers', function () {
        //
    })->name('teachers');

    Route::get('/arts', function () {
        //
    })->name('arts');

    Route::get('/statistics', function () {
        //
    })->name('statistics');
});


