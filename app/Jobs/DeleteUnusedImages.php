<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteUnusedImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        Image::where('imageable_type', 'App\Models\User')
            ->where('created_at', '<', Carbon::now()->subHours(5))
            ->delete();
    }
}
