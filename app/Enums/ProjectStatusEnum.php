<?php

declare(strict_types=1);

namespace App\Enums;

enum ProjectStatusEnum: int
{
    case ACTIVE = 1;
    case COMPLETED = 2;
}