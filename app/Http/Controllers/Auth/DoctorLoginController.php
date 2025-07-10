<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Docotr\Auth\loginRequest;
use App\Http\Requests\Docotr\Auth\loginRequest as AuthLoginRequest;
use App\Http\Resources\Admin\Auth\loginResource;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DoctorLoginController extends ApiController
{
       public function login(LoginRequest $request)
    {
$ceradentials= $request->validated();
$Doctor= Doctor::where('email',$request->email)->first();
if (! $Doctor || ! Hash::check($request->password, $Doctor->password)) {
    return $this->sendResponce(LoginResource::make($Doctor),'User Logged in successfully');

}
 $Doctor->accessToken = $Doctor->createToken('Doctor_token')->plainTextToken;
 return $this->sendResponce(loginResource::make($Doctor),'Doctor logged in successfully');
}


 public function logout(loginRequest $request)
 {
$Doctor = auth ('Doctor')->user();
$Doctor->currentAccessToken()->delete();
 return $this->sendResponce(null,__('Doctor_logout_in_successfully'));
 }
}
