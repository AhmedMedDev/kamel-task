<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function __construct(private AccountService $accountService)
    {}

    public function claimAccountDeletion(): JsonResponse
    {
        $this->accountService->claimAccountDeletion();

        return response()->json([
            'message' => 'verification code has been sent'
        ], Response::HTTP_CREATED);
    }

    public function deleteAccount(Request $request): JsonResponse
    {
        $this->accountService->deleteAccount(auth()->user());

        return response()->json([
            'message' => 'deleted successfully',
        ]);
    }
}

