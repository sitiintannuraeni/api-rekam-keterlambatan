<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LatesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware(['auth.check'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    
    // endpoint Users
    Route::get('/users', [UserController::class, 'getUsers']);
    Route::get('/users/{id}', [UserController::class, 'getUserById']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{jasdjs}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'delete']);
    // end Users

    // endpoint Rombels
    Route::get('/rombels', [RombelController::class, 'getRombels']);
    Route::get('/rombels/{id}', [RombelController::class, 'getRombelById']);
    Route::post('/rombels', [RombelController::class, 'store']);
    Route::match(['post', 'put'], '/rombels/{id}', [RombelController::class, 'update']);
    Route::delete('/rombels/{id}', [RombelController::class, 'delete']);
    // end Rombels

    // endpoint Rayons
    Route::get('/rayons', [RayonController::class, 'getRayons']);
    Route::get('/rayons/{id}', [RayonController::class, 'getRayonById']);
    Route::post('/rayons', [RayonController::class, 'store']);
    Route::match(['post', 'put'], '/rayons/{id}', [RayonController::class, 'update']);
    Route::delete('/rayons/{id}', [RayonController::class, 'delete']);
    // endpoint

    // endpoin Student
    Route::get('/students', [StudentController::class, 'getStudents']);
    Route::get('/students/{id}', [StudentController::class, 'getStudentsById']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'delete']);
    // endpoint

    // enddpoint Lates
    Route::get('/lates', [Latescontroller::class, 'getLates']);
    Route::get('/lates/{id}', [LatesController::class, 'getLatesById']);
    Route::post('/lates', [LatesController::class, 'store']);
    Route::put('/lates/{id}', [LatesController::class, 'update']);
    Route::delete('/lates/{id}', [LatesController::class, 'delete']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
