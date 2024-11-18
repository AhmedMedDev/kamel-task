<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectRepository implements RepositoryInterface
{
    /**
     * @return Project[]
     */
    public function get(): array
    {
        return Project::filter()->paginate(6)->toArray();
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(array $data, Project|Model $project): bool
    {
        return $project->update($data);
    }

    public function delete(Project|Model $project): bool
    {
        return $project->delete();
    }
}
