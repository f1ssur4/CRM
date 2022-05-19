<?php

use App\Http\Controllers\LoginController;
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

/*
 * доступ всем
 */
Route::view('/', 'main')->name('/');


/*
 * доступ только не аутентифицированным
 */
Route::get('/login', function () {
    if (!Auth::check()) {
        return view('login');
    }
    return redirect(\route('/'));
})->name('user.login');

Route::post('/login', [LoginController::class, 'login'])->name('user.login');


/*
 * доступ после аутентификации
 */
Route::middleware('auth')->group(function () {

    Route::get('/lessons', function () {
        return 123;
    })->name('lessons');

    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');


    /*
     * доступ только после аутентификации и авторизации
     */
    Route::middleware('authorize')->group(function () {

        /*
         * доступ только для супер администратора. После аутентификации, авторизации и высшей авторизации
         */
        Route::middleware('high.authorize')->group(function () {
            Route::name('tasks.')->group(function () {

                Route::view('/add_tasks', 'create-tasks-form')->name('form');

                Route::post('/add_tasks', [TaskController::class, 'create'])->name('create');

            });
        });

        Route::view('/create', 'create')->name('user.create');

        Route::post('/create', [UserController::class, 'createUser'])->name('user.create');

        Route::get('/tasks', [TaskController::class, 'get'])->name('tasks');

        Route::get('/clients', function () {
            echo 12344;
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
});


