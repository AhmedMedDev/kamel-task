<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\PasswordService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function __construct(private PasswordService $passwordService)
    {}

    public function changePassword(Request $request): JsonResponse
    {
        $request = $request->validate([
            'old_password'  => 'required|string|min:4',
            'password'      => 'required|string|min:4|confirmed',
        ]);

        $this->passwordService->changePassword($request);

        return response()->json([
            'message' => 'password has been changed successfully'
        ]);
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $request = $request->validate([
            'code' =>'required|max:6|exists:verifications,code',
            'password' => 'required|string|min:4',
        ]);

        $this->passwordService->resetPassword($request);

        return response()->json([
            'message' => 'password has been changed successfully.'
        ]);
    }
}
