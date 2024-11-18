<?php

declare(strict_types=1);

namespace App\Services;

use App\Jobs\SendPhoneVerificationCodesJob;
use App\Models\User;

class AccountService
{
    public function claimAccountDeletion(): void
    {
        $code = str()->random(4);
        
        auth()->user()->verifications()->create([
            'code' => $code,
            'action' => 'claim-account-deletion',
        ]);

        // dispatch(new SendPhoneVerificationCodesJob($code, auth()->user()->phone));
    }

    public function deleteAccount(User $user): bool
    {
        return $user->delete();
    }

    public function updateProfile(array $data, User $user): void
    {
        $user->update($data['user']);

        if ($user->userable_type == 'App\Models\BusinessUser') {
            $user->userable()->update($data['business_user']);
        }

        if ($user->userable_type == 'App\Models\Customer') {
            $user->userable()->update($data['customer']);
        }
    }

    public function getAllUsers(): array
    {
        return User::select('id', 'name')->get()->toArray();
    }
}
