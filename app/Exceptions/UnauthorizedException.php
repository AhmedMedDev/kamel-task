<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends Exception
{
    public function render($request): JsonResponse
    {
        return response()->json([
            'message' => 'Unauthorized'
        ], Response::HTTP_FORBIDDEN);
    }
}
