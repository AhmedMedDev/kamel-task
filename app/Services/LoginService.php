<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\LoginException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function login(array $request): array
    {
        $user = User::where('email', $request['email'])->first();

        throw_unless(Hash::check($request['password'], $user->password), LoginException::class);
    
        $accessToken = $user->createToken($request['device_name']);
    
        return [
            'user' => $user,
            'accessToken' => $accessToken
        ];
    }

    public function logout(Request $request): void
    {
        $token = $request->user()->token();
        $token->revoke();
    }
}
