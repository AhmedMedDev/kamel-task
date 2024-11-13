<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\VerifyCauseEnum;
use App\Jobs\SendPhoneVerificationCodesJob;
use App\Models\BusinessUser;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function __construct()
    {}

    public function register(array $request)
    {
        $request['password'] = Hash::make($request['password']);

        $user = User::create($request);
        
        $accessToken = $user->createToken($request['device_name']);

        $code = str()->random(4);
        
        $user->verifications()->create([
            'code' => $code,
            'action' => VerifyCauseEnum::REGISTRATION->value,
        ]);

        // dispatch(new SendPhoneVerificationCodesJob($code, auth()->user()->phone));
    
        return [
            'user' => $user,
            'accessToken' => $accessToken
        ];
    }
}
