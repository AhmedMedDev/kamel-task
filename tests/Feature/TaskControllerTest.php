<?php

namespace Tests\Feature\Task;

use App\Models\Project;
use App\Models\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;

class TaskControllerTest extends TestCase
{
    // use RefreshDatabase;

    private array $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];

    private string $table = 'tasks';

    private string $endpoint = 'api/tasks';

    private string $model = Task::class;

    /** @test */
    public function a_user_can_view_tasks()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $model = $this->model::factory()->create();

        $response = $this->get($this->endpoint);

        $response->assertStatus(200);
        $response->assertSee($model->name);
    }

    /** @test */
    public function a_user_can_create_a_task()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $taskData = $this->model::factory()->make()->toArray();

        $response = $this->postJson($this->endpoint, $taskData, $this->headers);

        $response->assertStatus(201);
        $this->assertDatabaseHas($this->table, ['id' => $response->json()['payload']['id']]);
    }

    /** @test */
    public function a_user_can_update_a_task()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $task = $this->model::factory()->create();
        $taskData = $this->model::factory()->make()->toArray();

        $response = $this->putJson("$this->endpoint/{$task->id}", $taskData, $this->headers);

        $response->assertStatus(200);
        $this->assertDatabaseHas($this->table, [
            'id' => $task->id,
            'title' => $taskData['title']
        ]);
    }

    /** @test */
    public function a_user_can_delete_a_task()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $task = $this->model::factory()->create();

        $response = $this->deleteJson("$this->endpoint/{$task->id}", $this->headers);

        $response->assertStatus(200);
        $this->assertDatabaseMissing($this->table, ['id' => $task->id]);
    }

    /** @test */
    public function a_user_can_assign_a_task()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $project = Project::factory()->create(['user_id' => $user->id]);

        $task = $this->model::factory()->create([
            'user_id' => null,
            'project_id' => $project->id
        ]);

        $assignedUser = User::factory()->create();

        $response = $this->postJson("$this->endpoint/{$task->id}/assign", ['user_id' => $assignedUser->id], $this->headers);

        $response->assertStatus(200);
        $this->assertDatabaseHas($this->table, [
            'id' => $task->id,
            'user_id' => $assignedUser->id
        ]);
    }
}

