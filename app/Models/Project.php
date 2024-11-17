<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ProjectStatusEnum;

class Project extends BaseModel
{
    protected $fillable = ['title', 'description', 'due_date', 'status', 'user_id'];

    // cast status to enum
    protected $casts = [
        'status' => ProjectStatusEnum::class,
    ];

    public static array $createRules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'due_date' => 'required|date|after:today',
        'status' => 'required|integer|in:1,2',
    ];

    public static array $updateRules = [
        'title' => 'string|max:255',
        'description' => 'string',
        'due_date' => 'date|after:today',
        'status' => 'integer|in:1,2',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // at creation, set the user_id to the authenticated user
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (auth()->check()) $project->user_id = auth()->id();
        });

        // at fetching, only show projects of the authenticated user
        static::addGlobalScope('user', function ($builder) {
            if (auth()->check()) $builder->where('user_id', auth()->id());
        });
    }

}
