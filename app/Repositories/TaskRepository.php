<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class TaskRepository implements RepositoryInterface
{
    /**
     * @return Task[]
     */
    public function get(): array
    {
        return Task::filter()->paginate(6)->toArray();
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(array $data, Task|Model $Task): bool
    {
        return $Task->update($data);
    }

    public function delete(Task|Model $Task): bool
    {
        return $Task->delete();
    }
}
