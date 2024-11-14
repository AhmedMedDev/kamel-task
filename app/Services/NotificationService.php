<?php

declare(strict_types=1);

namespace App\Services;

class NotificationService
{
    public function __construct()
    {}

    public function get(): array
    {
        return auth()->user()->notifications->toArray();
    }

    public function markAllAsRead(): void
    {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function markAsRead($notification): void
    {
        $notification = auth()->user()->notifications()->find($notification);

        $notification->markAsRead();
    }

    public function delete($notification): void
    {
        $notification = auth()->user()->notifications()->find($notification);

        $notification->delete();
    }

    public function deleteAll(): void
    {
        auth()->user()->notifications()->delete();
    }
}
