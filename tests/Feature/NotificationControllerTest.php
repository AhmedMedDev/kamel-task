<?php

namespace Tests\Feature\Notification;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class NotificationControllerTest extends TestCase
{
    // use RefreshDatabase;

    private array $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];

    private string $endpoint = 'api/notifications';


    /** @test */
    public function a_user_can_view_notifications()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $user->notify(new \App\Notifications\TaskAssignedNotification(\App\Models\Task::factory()->create()));

        $response = $this->get($this->endpoint);

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'payload');
    }

    /** @test */
    public function a_user_can_mark_all_notifications_as_read()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $user->notify(new \App\Notifications\TaskAssignedNotification(\App\Models\Task::factory()->create()));

        $notification = $user->notifications->first();

        $response = $this->post($this->endpoint);

        $response->assertStatus(200);
        $this->assertDatabaseHas('notifications', ['id' => $notification->id, 'read_at' => now()]);
    }

    /** @test */
    public function a_user_can_mark_a_notification_as_read()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $user->notify(new \App\Notifications\TaskAssignedNotification(\App\Models\Task::factory()->create()));

        $notification = $user->notifications->first();

        $response = $this->post($this->endpoint . '/' . $notification->id);

        $response->assertStatus(200);
        $this->assertDatabaseHas('notifications', ['id' => $notification->id, 'read_at' => now()]);
    }

    /** @test */
    public function a_user_can_delete_a_notification()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $user->notify(new \App\Notifications\TaskAssignedNotification(\App\Models\Task::factory()->create()));

        $notification = $user->notifications->first();

        $response = $this->delete($this->endpoint . '/' . $notification->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('notifications', ['id' => $notification->id]);
    }

    /** @test */
    public function a_user_can_delete_all_notifications()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $user->notify(new \App\Notifications\TaskAssignedNotification(\App\Models\Task::factory()->create()));

        $notification = $user->notifications->first();

        $response = $this->delete($this->endpoint);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('notifications', ['id' => $notification->id]);
    }
}

