<?php

namespace Tests\Feature\Project;

use App\Models\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    private array $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];

    private string $table = 'projects';

    private string $endpoint = 'api/projects';

    private string $model = Project::class;

    /** @test */
    public function a_user_can_view_projects()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $model = $this->model::factory()->create();

        $response = $this->get($this->endpoint);

        $response->assertStatus(200);
        $response->assertSee($model->name);
    }

    /** @test */
    public function a_user_can_create_a_project()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $projectData = $this->model::factory()->make()->toArray();


        $response = $this->postJson($this->endpoint, $projectData, $this->headers);

        $response->assertStatus(201);
        $this->assertDatabaseHas($this->table, ['id' => $response->json()['payload']['id']]);
    }

    /** @test */
    public function a_user_can_update_a_project()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $project = $this->model::factory()->create();
        $projectData = $this->model::factory()->make()->toArray();

        $response = $this->putJson("$this->endpoint/{$project->id}", $projectData, $this->headers);

        $response->assertStatus(200);
        $this->assertDatabaseHas($this->table, [
            'id' => $project->id,
            'title' => $projectData['title']
        ]);
    }

    /** @test */
    public function a_user_can_delete_a_project()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $project = $this->model::factory()->create();

        $response = $this->deleteJson("$this->endpoint/{$project->id}", $this->headers);

        $response->assertStatus(200);
        $this->assertDatabaseMissing($this->table, ['id' => $project->id]);
    }
}
