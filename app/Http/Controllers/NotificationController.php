<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct(
        private NotificationService $notificationService
    ) {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return response()->json([
            'payload' => $this->notificationService->get()
        ]);
    }

    public function markAllAsRead()
    {
        $this->notificationService->markAllAsRead();

        return response()->json([
            'message' => 'marked all as read',
        ]);
    }

    public function markAsRead($notification)
    {
        $this->notificationService->markAsRead($notification);

        return response()->json([
            'message' => 'marked as read',
        ]);
    }

    public function destroy($notification)
    {
        $this->notificationService->delete($notification);

        return response()->json([
            'message' => 'deleted successfully',
        ]);
    }

    public function destroyAll()
    {
        $this->notificationService->deleteAll();

        return response()->json([
            'message' => 'deleted all successfully',
        ]);
    }
}
