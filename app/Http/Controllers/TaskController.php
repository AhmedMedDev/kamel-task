<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function __construct(private TaskService $controllerService)
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
        $request->validate(Task::$createRules);

        $payload = $this->controllerService->store($request->toArray());

        return response()->json([
            'message' => 'created successfully',
            'payload' => $payload,
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Task $task): JsonResponse
    {
        $request = $request->validate(Task::$updateRules);

        $this->controllerService->update($request, $task);

        return response()->json([
            'message' => 'updated successfully',
        ]);
    }

    public function destroy(Task $Task): JsonResponse
    {
        $this->controllerService->delete($Task);

        return response()->json([
            'message' => 'deleted successfully',
        ]);
    }

    public function assignTask(Request $request, Task $task): JsonResponse
    {
        $request = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $this->controllerService->assignTask($request, $task);

        return response()->json([
            'message' => 'assigned successfully',
        ]);
    }
}
