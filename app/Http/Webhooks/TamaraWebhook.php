<?php

namespace App\Http\Webhooks;

use App\Enums\PaymentStatusEnum;
use App\Http\Webhooks\WebhookHandler;
use App\Models\Order;
use App\Services\OrderService;
use App\ThirdParties\HesabeKits\Misc\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TamaraWebhook extends WebhookHandler
{
    public function __invoke(Request $request, OrderService $service) {
        $request->validate([
            'order_reference_id' => 'required',
            'event_type' => 'required'
        ]);

        $order = Order::findOrFail($request->order_reference_id);
        $status = PaymentStatusEnum::PENDING;
        switch ($request->event_type) {
            case 'order_captured':
                $status = PaymentStatusEnum::PAID;
                break;
            case 'order_expired':
                $status = PaymentStatusEnum::FAILED;
                break;
            case 'order_declined':
                $status = PaymentStatusEnum::CANCELLED;
                break;
            case 'order_refunded':
                $status = PaymentStatusEnum::REFUNDED;
                break;
        }

        $service->handlePaymentCallback($order, $status);
        return $request->all();
    }

    public function registerWebhook(string $apiKey, bool $test = false): bool {
        $response = Http::withHeaders([
            'authorization' => 'Bearer' . $apiKey,
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->post($test ? Constants::TAMARA_API_URL_TEST : Constants::TAMARA_API_URL_PRODUCTION, [
            'url' => route('tamara-webhook'),
            'events' => [
                'order_captured', 'order_expired', 'order_declined', 'order_refunded'
            ]
        ]);

        return $response->successful();
    }
}
