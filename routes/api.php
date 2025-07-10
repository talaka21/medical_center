<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\userLogin;
use App\Http\Controllers\Auth\userRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [userRegister::class, 'register']);
Route::post('login', [userLogin::class, 'login']);
Route::get('logout', [userlogin::class, 'logout'])->middleware('auth:user');

use App\Http\Controllers\SpacialtyController;

Route::get('/spacialties', [SpacialtyController::class, 'index']);
Route::get('/spacialties/{id}/doctors', [SpacialtyController::class, 'bySpecialty']);
Route::get('/doctors/{id}/schedule', [SpacialtyController::class, 'showDoctorSchedule']);

Route::post('/appointments', [AppointmentController::class, 'store'])->middleware('auth:user');;


