<?php
 namespace App\Services;

use App\Models\Doctor;
use App\Models\Spacialty;
use Illuminate\Support\Facades\Config;

 class SpacialtyService extends BaseService
 {
     public function __construct()
    {
        $this->model= Spacialty::class;
    }public function getAllSpecialties()
    {
        return Spacialty::all();
    }
    public function getDoctorsBySpecialty($specialtyId)
    {
        return Doctor::where('specialty_id', $specialtyId)->with('user')->get();
    }
     public function getDoctorScheduleSlots($doctorId)
    {
        $startTime = Config::get('schedule.start_item');
        $endTime = Config::get('schedule.end_item');
        $appointmentDuration = 30; // دقائق

        $slots = $this->generateTimeSlots($startTime, $endTime, $appointmentDuration);

        return [
            'doctor_id' => $doctorId,
            'available_slots' => $slots,
        ];
    }
    private function generateTimeSlots($startTime, $endTime, $duration)
    {
        $slots = [];
        $current = strtotime($startTime);
        $end = strtotime($endTime);

        while ($current + $duration * 60 <= $end) {
            $slots[] = date('H:i', $current) . ' - ' . date('H:i', $current + $duration * 60);
            $current += $duration * 60;
        }
return $slots;
}

 }
