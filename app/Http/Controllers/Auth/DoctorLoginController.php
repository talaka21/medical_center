<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Doctor\Auth\LoginRequest;
use App\Http\Resources\Admin\Auth\loginResource;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DoctorLoginController extends ApiController
{
       public function login(LoginRequest $request)
    {
$credentials= $request->validated();
$Doctor= Doctor::where('email',$request->email)->first();
if (! $Doctor || ! Hash::check($request->password, $Doctor->password)) {
    return $this->sendResponce(null, 'Invalid credentials', 401);

}
 $Doctor->accessToken = $Doctor->createToken('Doctor_token')->plainTextToken;
 return $this->sendResponce(loginResource::make($Doctor),'Doctor Logged in successfully');
}


 public function logout(Request $request)
 {
$Doctor = auth ('doctor')->user();
$Doctor->currentAccessToken()->delete();
 return $this->sendResponce(null,__('Doctor_logout_in_successfully'));
 }
}
