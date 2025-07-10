<?php
 namespace App\Services;

use App\Models\Appointment;
use App\Models\Doctor;

 class DoctorService extends BaseService
 {
     public function __construct()
    {
        $this->model= Doctor::class;
    }
     //* إرجاع المواعيد المحجوزة لطبيب معيّن
    public function getBookedAppointments( $id)
    {
        $doctor = $this->getModel($id);

        // التأكد من أن الطبيب موجود
        if (!$doctor) {
            return [];
        }

        // جلب المواعيد المحجوزة
        return Appointment::where('doctor_id', $id)
                          ->where('status', 'booked') // غيّرها حسب نوع الحالة في جدولك
                          ->with('patient') // إذا في علاقة مع المريض
                          ->latest()
                          ->get();
    }

    //* إرجاع جدول العمل الموحد لجميع الأطباء
     public function getWorkingSchedule()
{
    $workingDays = config('schedule.working_days');
    $startTime = config('schedule.start_item');
    $endTime = config('schedule.end_item');

    $schedule = [];

    foreach ($workingDays as $day) {
        $time = strtotime($startTime);
        $end = strtotime($endTime);

        $slots = [];

        while ($time < $end) {
            $slots[] = date('H:i', $time);
            $time = strtotime('+30 minutes', $time);
        }

        $schedule[] = [
            'day' => $day,
            'slots' => $slots,
        ];
    }

    return $schedule;

}

    }

