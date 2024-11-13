<?php

declare(strict_types=1);

namespace App\Enums;

enum AccountStatusEnum: int
{
    case UNDER_REVIEW   = 1;
    case ACTIVE   = 2;
    case SUSPENDED   = 3;
    case AUTOMATED = 4;
}