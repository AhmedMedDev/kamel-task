<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskService
{
    public function __construct(
        private TaskRepository $taskRepository){}

    /**
     * @return Task[]
     */
    public function get(): array
    {
        return $this->taskRepository->get();
    }

    public function store(array $data): Task
    {
        return $this->taskRepository->create($data);
    }

    public function update(array $request, Task $task): bool
    {

        // if authenticated user is the project owner or the assigned user, abort
        abort_unless(
            auth()->id() === $task->project->user_id || auth()->id() === $task->user_id,
            403,
            'You are not allowed to update this task'
        );

        // project owner can update the whole task data
        // assigned user can only update the status

        if (auth()->id() === $task->project->user_id) {
            return $this->taskRepository->update($request, $task);
        }

        // if the authenticated user is not the project owner, then only status can be updated
        $request = array_filter($request, fn($key) => $key === 'status', ARRAY_FILTER_USE_KEY);

        return $this->taskRepository->update($request, $task);
    }

    public function delete(Task $task): void
    {
        $this->taskRepository->delete($task);
    }

    public function assignTask(array $data, Task $task): void
    {
        // ensure that the task is not already assigned
        abort_if($task->user_id === $data['user_id'], 400, 'Task is already assigned to this user');
        
        // ensure project -> user_id is owned by the authenticated user
        abort_unless($task->project->user_id === auth()->id(), 403, 'You are not allowed to assign task to this user');

        $task->update($data);
    }

    public function myAssignedTasks(): array
    {
        return $this->taskRepository->myAssignedTasks();
    }
}
