<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\auth\loginRequest;
use App\Http\Resources\Admin\Auth\loginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userLogin extends ApiController
{
    public function login(loginRequest $request)
    {
$ceradentials= $request->validated();
$user= User::where('email',$request->email)->first();
if (! $user || ! Hash::check($request->password, $user->password)) {
    return $this->sendResponce(loginResource::make($user),__('user_Logged_in_successfully'));

}
 $user->accessToken = $user->createToken('user_token')->plainTextToken;
 return $this->sendResponce(loginResource::make($user),__('user_logged_in_successfully'));
}


 public function logout( loginRequest $request)
 {
$user = auth ('user')->user();
$user->currentAccessToken()->delete();
 return $this->sendResponce(null,__('user_logout_in_successfully'));
 }
}
