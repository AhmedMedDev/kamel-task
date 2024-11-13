<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendFirebaseNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected array $message)
    {}

    public function handle()
    {
        $response = Http::withHeaders([
            'Authorization' => 'key=YOUR_SECRET_KEY',
            'Content-Type' => 'application/json',
        ])->post('https://fcm.googleapis.com/fcm/send', $this->message);

        Log::info($response->json());
    }
}
