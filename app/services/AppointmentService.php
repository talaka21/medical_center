<?php
namespace App\Services;

use App\Enums\AppointmentStatus;
use App\Events\AppointmentBooked;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;

class AppointmentService
{
    protected $schedule;
    public function __construct()
    {
       $this->schedule = Config::get('schedule.time_slots', []);

    }
  public function bookAppointment($userId, $doctorId, $date, $time)
    {
$allowedTimes = config('schedule.time_slots', []);
        if(!in_array($time, $allowedTimes)){
            throw ValidationException::withMessages(
            ['time'=>__('the_selected_time_is_outside_the_alloew_workingh_ours.')]);}

        $exists = Appointment::where('doctor_id', $doctorId)
            ->where('date', $date)
            ->where('time', $time)
            ->exists();

        if ($exists) {
return [ 'success' => false,
    'message' => __('This_time_slot_is_already_booked.'),
    'code' => 422];}

        try {
            // إنشاء الموعد
            $appointment = Appointment::create([
                'user_id' => $userId,
                'doctor_id' => $doctorId,
                'date' => $date,
                'time' => $time,
                'status' => AppointmentStatus::Pending,
            ]);

            // إطلاق الحدث
            event(new AppointmentBooked($appointment));

           return [
    'success' => true,
    'message' => __('Appointment_booked_successfully.'),
    'data' => $appointment,
    'code' => 201
];

        } catch (\Exception $e) {
   return [
    'success' => false,
    'message' => __('An_error_occurred_while_booking_the_appointment.'),
    'data' => null,
    'error' => $e->getMessage(),
    'code' => 422,
];
}
    }

}
