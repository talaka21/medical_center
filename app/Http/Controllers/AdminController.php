<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpacialtyRequest;
use App\Http\Requests\SpecialtyRequest;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Spacialty;
use App\Services\SpacialtyService;

class AdminController extends ApiController
{
    protected $SpacialtyService;
    public function __construct(SpacialtyService $spacialtyService )
    {
        $this->SpacialtyService =$spacialtyService;
    }
    /**
     * Display a listing of the resource.
     */
    public function addSpacialty(SpacialtyRequest $request)
    {
      $data = $request->validated();
      if (isset($data['name']) && is_array($data['name'])) {
    $data['name'] = json_encode($data['name']);
}
$spacialty = $this->SpacialtyService->create($data);
  return $this->sendResponce($spacialty ,__('spacialty_Created_successfully'));
    }



    public function updateSpacialty(SpacialtyRequest $request,  $id)
    {

         $data = $request->validated();
         if (isset($data['name']) && is_array($data['name'])) {
        $data['name'] = json_encode($data['name']);
    }
      $spacialty = $this->SpacialtyService->update($id, $data);
       return $this->sendResponce($spacialty ,__('spacialty_update_ successfully'));
    }

    public function destroySpacialty($id)
    {
      $this->SpacialtyService->delete($id);
        return $this->sendResponce(null, __('Specialty_deleted_successfully'));
}
}
