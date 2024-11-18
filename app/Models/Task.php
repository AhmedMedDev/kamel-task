<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TaskStatusEnum;
use App\Notifications\TaskAssignedNotification;

class Task extends BaseModel
{
    protected $fillable = ['title', 'description', 'status', 'project_id', 'user_id'];

    // cast status to enum
    protected $casts = [
        'status' => TaskStatusEnum::class,
    ];

    public static array $createRules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|integer|in:1,2,3',
        'project_id' => 'required|integer|exists:projects,id',
        'user_id' => 'integer|exists:users,id|nullable',
    ];

    public static array $updateRules = [
        'title' => 'string|max:255',
        'description' => 'string',
        'status' => 'integer|in:1,2,3',
        'project_id' => 'integer|exists:projects,id',
        'user_id' => 'integer|exists:users,id|nullable',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // after updating if user_id is exists, then notifiy the user
    // boot method is called when the model is booted
    protected static function boot()
    {
        parent::boot();

        static::updated(function (Task $task) {
            if ($task->user_id) {
                $task->user->notify(new TaskAssignedNotification($task));
            }
        });

        // add global scope to get tasks belongs to the authenticated user via project->user_id
        static::addGlobalScope('project', fn($builder) => $builder->whereHas('project', fn($query) => $query->where('user_id', auth()->id())));

        // activity log
        static::created(function (Task $task) {
            ActivityLog::create([
                'user_id' => auth()->id(),
                'model' => 'App\Models\Task',
                'model_id' => $task->id,
                'activity' => 'Task ' . $task->title . ' created',
                'activity_type' => 'create',
            ]);
        });

        static::updated(function (Task $task) {
            ActivityLog::create([
                'user_id' => auth()->id(),
                'model' => 'App\Models\Task',
                'model_id' => $task->id,
                'activity' => 'Task ' . $task->title . ' updated',
                'activity_type' => 'update',
            ]);
        });

        static::deleted(function (Task $task) {
            ActivityLog::create([
                'user_id' => auth()->id(),
                'model' => 'App\Models\Task',
                'model_id' => $task->id,
                'activity' => 'Task ' . $task->title . ' deleted',
                'activity_type' => 'delete',
            ]);
        });
    }
}
