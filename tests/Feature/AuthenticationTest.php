<?php

namespace Tests\Feature;

use App\Enums\VerifyCauseEnum;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class AuthenticationTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function test_registration_endpoint()
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'device_name' => 'test_device',
        ]);

        $response->assertStatus(201);
    }

    public function test_login_endpoint()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'test_device',
        ]);

        $response->assertStatus(200);
    }

    public function test_verify_account()
    {
        $user = User::factory()->create();
        $Verification = Verification::factory()->create(['user_id' => $user->id, 'action' => VerifyCauseEnum::REGISTRATION->value]);

        $response = $this->postJson('/api/auth/verify-account', [
            'code' => $Verification->code,
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_account()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->deleteJson('/api/auth/delete-account');

        $response->assertStatus(200);
    }

    public function test_change_password()
    {
        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/auth/change-password', [
            'old_password' => 'password',
            'password' => 'new_password',
            'password_confirmation' => 'new_password',
        ]);

        $response->assertStatus(200);
    }

    public function test_create_verifications_code()
    {
        $email = $this->faker->unique()->safeEmail;

        User::factory()->create(['email' => $email]);

        $response = $this->postJson('/api/auth/verifications', [
            'email' => $email,
            'action' => VerifyCauseEnum::FORGET_PASSWORD->value,
        ]);

        $response->assertStatus(200);
    }

    public function test_validate_verification_code()
    {
        $user = User::factory()->create();
        $Verification = Verification::factory()->create(['user_id' => $user->id, 'action' => VerifyCauseEnum::FORGET_PASSWORD->value]);

        $response = $this->postJson('/api/auth/verifications/validate', [
            'code' => $Verification->code,
            'action' => VerifyCauseEnum::FORGET_PASSWORD->value,
        ]);

        $response->assertStatus(200);
    }

    public function test_reset_password()
    {
        $user = User::factory()->create();
        $Verification = Verification::factory()->create(['user_id' => $user->id, 'action' => VerifyCauseEnum::FORGET_PASSWORD->value]);

        $response = $this->postJson('/api/auth/reset-password', [
            'code' => $Verification->code,
            'password' => 'new_password',
        ]);

        $response->assertStatus(200);
    }
}
