<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Project;
use App\Repositories\ProjectRepository;

class ProjectService
{
    public function __construct(
        private ProjectRepository $projectRepository){}

    /**
     * @return Project[]
     */
    public function get(): array
    {
        return $this->projectRepository->get();
    }

    public function store(array $data): Project
    {
        return $this->projectRepository->create($data);
    }

    public function update(array $request, Project $project): bool
    {
        // abort if the project is not owned by the authenticated user
        abort_unless($project->user_id === auth()->id(), 403, 'You are not authorized to update this project');

        return $this->projectRepository->update($request, $project);
    }

    public function delete(Project $project): void
    {
        // abort if the project is not owned by the authenticated user
        abort_unless($project->user_id === auth()->id(), 403, 'You are not authorized to delete this project');
        
        $this->projectRepository->delete($project);
    }
}
