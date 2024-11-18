<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Notifications\TaskAssignedNotification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create a manager user
        $manager = \App\Models\User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@example.com',
        ]);

        // create a employee user
        $employee = \App\Models\User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@example.com',
        ]);

        // make the manager user create some projects
        $manager->projects()->createMany([
            [
                'title' => 'Project 1',
                'description' => 'Description 1',
                'due_date' => now()->addDays(7),
                'status' => 1,
            ],
            [
                'title' => 'Project 2',
                'description' => 'Description 2',
                'due_date' => now()->addDays(14),
                'status' => 1,
            ],
            [
                'title' => 'Project 3',
                'description' => 'Description 3',
                'due_date' => now()->addDays(21),
                'status' => 1,
            ],
        ]);

        // for each project, create some tasks
        $manager->projects->each(function ($project) {
            $project->tasks()->createMany([
                [
                    'title' => 'Task 1',
                    'description' => 'Description 1',
                    'status' => 1,
                ],
                [
                    'title' => 'Task 2',
                    'description' => 'Description 2',
                    'status' => 1,
                ],
                [
                    'title' => 'Task 3',
                    'description' => 'Description 3',
                    'status' => 1,
                ],
            ]);
        });

        // for random tasks, make user id as employee id
        \App\Models\Task::inRandomOrder()->take(5)->get()->each(function ($task) use ($employee) {
            $task->update(['user_id' => $employee->id]);
            $task->user->notify(new TaskAssignedNotification($task));
        });

    }
}
