<?php

declare(strict_types=1);

namespace App\Enums;

enum TaskStatusEnum: int
{
    case TO_DO = 1;
    case IN_PROGRESS = 2;
    case DONE = 3;
}