<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LogModelActivityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        protected $model, 
        protected $causedBy, 
        protected $eventName)
    {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        activity()
            ->performedOn($this->model)
            ->causedBy($this->causedBy)
            ->event($this->eventName)
            ->log($this->eventName);
    }
}