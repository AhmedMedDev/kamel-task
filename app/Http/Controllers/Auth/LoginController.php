<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(private LoginService $loginService)
    {}

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|exists:users,email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $payload = $this->loginService->login($request->toArray());

        return response()->json([
            'message' => 'You have been successfully logged in!',
            'payload' => $payload
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $this->loginService->logout($request);

        return response()->json([
            'message' => 'You have been successfully logged out!'
        ]);
    }
}

