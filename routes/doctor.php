<?php

use App\Http\Controllers\Auth\DoctorLoginController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
Route::post('login', [DoctorLoginController::class, 'login']);
Route::middleware('auth:doctor')->group(function (){
Route::get('logout', [DoctorLoginController::class, 'logout']);
Route::get('/doctors/appointments/{id}', [DoctorController::class, 'bookedAppointments']);
Route::get('/doctors/schedule', [DoctorController::class, 'workingSchedule']);
  });
