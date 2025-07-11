<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;


Route::post('login', [AdminLoginController::class, 'login']);

Route::middleware('auth:admin')->group(function () {
    Route::get('logout', [AdminLoginController::class, 'logout']);

    Route::post('spacialty', [AdminController::class, 'addSpacialty']);
    Route::put('spacialty/{id}', [AdminController::class, 'updateSpacialty']);
    Route::delete('spacialty/{id}', [AdminController::class, 'destroySpacialty']);
     Route::post('doctor', [AdminDoctorController::class, 'addDoctor']);
    Route::put('doctor/{id}', [AdminDoctorController::class, 'updateDoctor']);
    Route::delete('doctor/{id}', [AdminDoctorController::class, 'destroyDoctor']);
  });
