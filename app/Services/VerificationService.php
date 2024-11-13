<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\VerifyCauseEnum;
use App\Jobs\SendPhoneVerificationCodesJob;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificationService
{
    public function __construct()
    {}

    public function verifications(array $request): void
    {
        $user = User::where('email', $request['email'])->first();

        $code = str()->random(4);

        $user->verifications()->create([
            'code' => $code,
            'action' => $request['action'],
        ]);

        // dispatch(new SendPhoneVerificationCodesJob($code, auth()->user()->phone));
    }
    
    public function validateCode(array $request): void
    {
        Verification::where([
            'code' => $request['code'],
            'action' => $request['action'],
        ])->firstOrFail();
    }

    public function verifyAccount(array $request): void
    {
        $verification = Verification::where([
            'code' => $request['code'],
            'action' => VerifyCauseEnum::REGISTRATION->value,
        ])->firstOrFail();

        DB::beginTransaction();
        $verification->user()->update(['email_verified_at' => now()]);
        $verification->user->verifications()->delete();
        DB::commit();
    }
}
