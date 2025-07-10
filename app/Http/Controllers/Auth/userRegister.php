<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\auth\registerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class userRegister extends ApiController
{
    public function Register(registerRequest $request){
$user = User::create($request->validated());
$Token=$user->createToken('user_Token')->plainTextToken;
return $this->sendResponce(['access_Token'=>$Token],__('user_register_succefully'));

}
}
