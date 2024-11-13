<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Project;
use App\Repositories\ProjectRepository;

class ProjectService
{
    public function __construct(
        private ProjectRepository $ProjectRepository){}

    /**
     * @return Project[]
     */
    public function get(): array
    {
        return $this->ProjectRepository->get();
    }

    public function store(array $data): Project
    {
        return $this->ProjectRepository->create($data);
    }

    public function update(array $request, Project $Project): bool
    {
        return $this->ProjectRepository->update($request, $Project);
    }

    public function delete(Project $Project): void
    {
        $this->ProjectRepository->delete($Project);
    }
}
