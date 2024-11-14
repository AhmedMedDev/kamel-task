<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\VerifyCauseEnum;
use App\Exceptions\BadRequestException;
use App\Jobs\SendPhoneVerificationCodesJob;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordService
{
    public function changePassword(array $data): void
    {
        throw_if(!Hash::check($data['old_password'],
            auth()->user()->password), BadRequestException::class);

        auth()->user()->update(['password' => Hash::make($data['password'])]);
    }

    public function resetPassword(array $request): void
    {
        $verification = Verification::where([
            'code' => $request['code'],
            'action' => VerifyCauseEnum::FORGET_PASSWORD->value,
        ])->firstOrFail();

        DB::beginTransaction();
        $verification->user()->update(['password' => Hash::make($request['password'])]); // you should make this line dynamic according to action 
        $verification->user->verifications()->delete();
        DB::commit();
    }
}
