<?php

namespace App\Http\Controllers;

use App\Http\Requests\Doctor\DoctorRequest;
use App\Http\Requests\SpecialtyRequest;
use App\Models\Admin;
use App\Models\Doctor;
use App\Services\DoctorService;

class AdminDoctorController extends ApiController
{
    protected $DoctorService;
    public function __construct(DoctorService $DoctorService )
    {
        $this->DoctorService =$DoctorService;
    }
    /**
     * Display a listing of the resource.
     */
    public function addDoctor(DoctorRequest $request)
    {
      $data =  $request->validated();
      if (isset($data['name']) && is_array($data['name'])) {
    $data['name'] = json_encode($data['name']);
}
$Doctor = $this->DoctorService->create($data);
  return $this->sendResponce($Doctor ,__('Doctor_Created_successfully'));
    }



    public function update(DoctorRequest $request,  $id)
    {

         $data = $request->validated();
         if (isset($data['name']) && is_array($data['name'])) {
        $data['name'] = json_encode($data['name']);
    }
      $Doctor = $this->DoctorService->update($id, $data);
       return $this->sendResponce($Doctor ,__('Doctor_update_ successfully'));
    }

    public function destroy($id)
    {
      $this->DoctorService->delete($id);
        return $this->sendResponce(null, __('Specialty_deleted_successfully'));
}
}
