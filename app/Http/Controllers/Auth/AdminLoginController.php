<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\loginRequest;
use App\Http\Resources\Admin\Auth\loginResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends ApiController
{
    public function login(loginRequest $request)
    {
$ceradentials= $request->validated();
$admin= Admin::where('email',$request->email)->first();
if (! $admin || ! Hash::check($request->password, $admin->password)) {
    return $this->sendResponce(LoginResource::make($admin),__('User_Logged_in_successfully'));

}
 $admin->accessToken = $admin->createToken('admin_token')->plainTextToken;
 return $this->sendResponce(loginResource::make($admin),__('admin_logged_in_successfully'));
}


 public function logout(loginRequest $request)
 {
$admin = auth ('admin')->user();
$admin->currentAccessToken()->delete();
 return $this->sendResponce(null,('admin_logout_in_successfully'));
 }
 }
