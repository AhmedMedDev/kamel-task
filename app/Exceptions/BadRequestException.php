<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BadRequestException extends Exception
{
    public function render($request): JsonResponse
    {
        return response()->json([
            'error' => 'The given data was invalid.'
        ], Response::HTTP_BAD_REQUEST);
    }
}
