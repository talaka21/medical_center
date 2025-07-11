<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Spacialty;
use App\Services\SpacialtyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SpacialtyController extends apiController
{
    protected $SpacialtyService;

    public function __construct(SpacialtyService $SpacialtyService)
    {
        $this->SpacialtyService = $SpacialtyService;
    }
    //عرض التخصصات المتوفر
  public function index()
{
    $spacialties = $this->SpacialtyService->getAllSpecialties();
        return $this->sendResponce($spacialties, __('specialties_listed_successfully'));
}
public function bySpecialty($SpacialtyId)
{
   $Spacialty = Spacialty::with('doctors')->findOrFail($SpacialtyId);

    // ترجع الأطباء المرتبطين بالتخصص مع معلوماتهم
    return response()->json($Spacialty->doctors);
}
public function showDoctorSchedule($doctorId)
{
    $schedule = $this->SpacialtyService->getDoctorScheduleSlots($doctorId);
    return $this->sendResponce($schedule, __('Schedule_generated_successfully'));
}

}
