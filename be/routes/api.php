<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JWTAuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\InternshipInformationController;
use App\Http\Controllers\API\ResearchTopicController;
use App\Http\Controllers\API\CurriculumVitaeController;
use App\Http\Controllers\API\LecturerController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\InternshipController;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('webauthenticate', [JWTAuthController::class, 'webauthenticate']);
Route::post('login', [JWTAuthController::class, 'loginAdmin']);

Route::get('/test', [CurriculumVitaeController::class, 'index']);

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('/me', [JWTAuthController::class, 'getUser']);
    Route::get('/cv', [CurriculumVitaeController::class, 'index']);
    // Route::prefix('/users')->group(function (){
    //     Route::get('/', [UserController::class, 'index']);
    //     Route::get('/{id}', [UserController::class, 'show']);
    //     Route::post('/', [UserController::class, 'store']);
    //     Route::delete('/{id}', [UserController::class, 'destroy']);
    // });
    // Route::prefix('/lecturers')->group(function (){
    //     Route::get('/', [LecturerController::class, 'index']);
    //     Route::get('/{id}', [LecturerController::class, 'show']);
    //     Route::post('/', [LecturerController::class, 'store']);
    // });

    Route::post('logout', [JWTAuthController::class, 'logout']);

});

Route::prefix('/users')->group(function (){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
Route::prefix('/lecturers')->group(function (){
    Route::get('/', [LecturerController::class, 'index']);
    Route::get('/{id}', [LecturerController::class, 'show']);
    Route::post('/', [LecturerController::class, 'store']);
});
Route::prefix('/students')->group(function (){
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/{id}', [StudentController::class, 'show']);
    Route::post('/', [StudentController::class, 'store']);
});
Route::prefix('/projects')->group(function (){
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/{id}', [ProjectController::class, 'show']);
    Route::post('/', [ProjectController::class, 'store']);
});
Route::prefix('/internships')->group(function (){
    Route::get('/', [InternshipController::class, 'index']);
    Route::get('/{id}', [InternshipController::class, 'show']);
    Route::post('/', [InternshipController::class, 'store']);
});

