<?php

declare(strict_types=1);

namespace App\Observers;

use App\Jobs\LogModelActivityJob;
use Spatie\Activitylog\Models\Activity;

class ActivitiesObserver
{
    public function event(Object $model, string $eventName)
    {
        LogModelActivityJob::dispatch($model, auth()->user(), $eventName);
    }

    public function created($model)
    {
        $this->event($model, 'created');
    }

    public function updated($model)
    {
        $this->event($model, 'updated');
    }

    public function deleted($model)
    {
        $this->event($model, 'deleted');
    }
}
