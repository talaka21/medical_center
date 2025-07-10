<?php
namespace App\Services;


class BaseService
{
     protected $model;
    public function getmodel($id)
 {
     return $this->model::findOrFail($id);
 }


public function create($data)
{
     $modelInstance =$this->model::create($data);
        return  $modelInstance;
}
 public function update($id , $data)
 {

    $modelInstance=$this->getmodel($id);
    $modelInstance->update($data);
   return  $modelInstance;
}

public function delete($id)
{
  $modelInstance=$this->getmodel($id);
   $modelInstance->delete();
}
}
