<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TaskStatusEnum;

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
}
