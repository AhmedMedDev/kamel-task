<?php

namespace Database\Factories;

use App\Models\Verification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VerificationFactory extends Factory
{
    protected $model = Verification::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'code' => Str::random(6),
            'action' => $this->faker->randomElement([1,2]),
        ];
    }
}

