<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentFacultyController;
use App\Http\Controllers\UniversityController;
use Illuminate\Http\Request;
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



Route::resource('universities', UniversityController::class);
Route::resource('faculties', FacultyController::class);
Route::resource('students', StudentController::class);

Route::get('/faculties/{id}/students', [StudentFacultyController::class, 'index']);

Route::delete('/students/{id}/delete', [StudentFacultyController::class, 'delete']);

Route::post('/students/{id}/update', [StudentFacultyController::class, 'update']);
