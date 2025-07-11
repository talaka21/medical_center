<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Services\DoctorService;

class DoctorController extends apiController
{
    protected $DoctorService;
    public function __construct(DoctorService $DoctorService )
    {
        $this->DoctorService =$DoctorService;

    }

 public function bookedAppointments($id)
    {
         $appointments = $this->DoctorService->getBookedAppointments($id);

        return $this->sendResponce($appointments, __('Booked_appointments_shown_successfully'));
    }
    public function workingSchedule()
    {
       $schedule = $this->DoctorService->getWorkingSchedule();

        return $this->sendResponce($schedule, __('Appointments_shown_successfully'));
    }

    
}
