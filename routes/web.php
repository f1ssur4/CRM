<?php

use App\Http\Controllers\AdminController;
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

Route::post('/login', [UserController::class, 'login'])->name('user.login');


/*
 * доступ после аутентификации
 */
Route::middleware('auth')->group(function () {

    Route::get('/lessons', function () {
        return 123;
    })->name('lessons');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');


    /*
     * доступ только после аутентификации и авторизации
     */
    Route::middleware('authorize')->group(function () {

        Route::get('/create', function () {
            return view('create');
        })->name('user.create');

        Route::post('/admin/sessionData', [AdminController::class, 'addSessionData'])->name('admin.data');

        Route::post('/create', [AdminController::class, 'create'])->name('admin.create');

        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');

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
});


