<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Enums\VerifyCauseEnum;
use App\Http\Controllers\Controller;
use App\Services\VerificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class VerificationController extends Controller
{
    public function __construct(private VerificationService $verificationService)
    {}

    public function verifications(Request $request): JsonResponse
    {
        $request = $request->validate([
            'email' => 'required|exists:users,email',
            'action' => ['required', new Enum(VerifyCauseEnum::class)],
        ]);

        $this->verificationService->verifications($request);

        return response()->json([
            'message' => 'verification code has been sent'
        ]);
    }

    public function validateCode(Request $request): JsonResponse
    {
        $request = $request->validate([
            'code' => 'required|max:6|exists:verifications,code',
            'action' => ['required', new Enum(VerifyCauseEnum::class)],
        ]);

        $this->verificationService->validateCode($request);

        return response()->json([
            'message' => 'verification code has been sent'
        ]);
    }

    public function verifyAccount(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required|max:6|exists:verifications,code',
        ]);

        $this->verificationService->verifyAccount($request->toArray());

        return response()->json([
            'message' => 'Verification successful'
        ]);
    }
}

