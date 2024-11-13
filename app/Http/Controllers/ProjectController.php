<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    public function __construct(private ProjectService $controllerService)
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'payload' => $this->controllerService->get()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate(Project::$createRules);

        $payload = $this->controllerService->store($request->toArray());

        return response()->json([
            'message' => 'created successfully',
            'payload' => $payload,
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Project $Project): JsonResponse
    {
        $request = $request->validate(Project::$updateRules);

        $this->controllerService->update($request, $Project);

        return response()->json([
            'message' => 'updated successfully',
        ]);
    }

    public function destroy(Project $Project): JsonResponse
    {
        $this->controllerService->delete($Project);

        return response()->json([
            'message' => 'deleted successfully',
        ]);
    }
}
