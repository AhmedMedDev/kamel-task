<?php

declare(strict_types=1);

namespace App\Enums;

enum VerifyCauseEnum: int
{
    case REGISTRATION = 1;
    case FORGET_PASSWORD = 2;
}