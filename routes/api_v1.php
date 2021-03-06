<?php

use Illuminate\Http\Request;
use \App\Http\Controllers\Api\V1\InstructorController;
use App\Http\Controllers\Api\V1\ArtController;
use App\Http\Controllers\Api\V1\SchoolController;
use App\Http\Controllers\Api\V1\ClientRequestController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'instructors' => InstructorController::class,
    'arts' => ArtController::class,
    'schools' => SchoolController::class,
    'requests' => ClientRequestController::class,
]);
