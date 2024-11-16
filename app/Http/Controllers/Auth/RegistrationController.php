<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\RegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    public function __construct(private RegistrationService $registrationService)
    {}

    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $payload = $this->registrationService->register($request->toArray());

        return response()->json([
            'message' => 'completed successfully, proceed to next step',
            'payload' => $payload
        ], Response::HTTP_CREATED);
    }
}

