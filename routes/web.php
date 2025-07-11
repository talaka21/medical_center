<?php


use Illuminate\Support\Facades\Route;
use App\Models\Appointment;
use App\Jobs\SendAppointmentReminder;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-dispatch', function () {
    // حدد ID لحجز حقيقي موجود عندك في جدول appointments
    $appointment = Appointment::find(20); // 👈 عدل ID حسب حالتك

    if (!$appointment || !$appointment->user || !$appointment->user->email) {
        return '❌ Appointment أو user أو email غير موجود.';
    }

    // Dispatch Job لتذكير الموعد
    SendAppointmentReminder::dispatch($appointment);

    return '✅ Reminder job dispatched!';
});
