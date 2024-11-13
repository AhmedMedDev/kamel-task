<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\UserToken;

interface UserTokenRepositoryInterface
{
    /**
     * @return UserToken[]
     */
    public function getUserTokens(): array;
    public function create(array $data): UserToken;
    public function update(array $data, UserToken $userToken): bool;
    public function delete(UserToken $userToken): bool;
}
