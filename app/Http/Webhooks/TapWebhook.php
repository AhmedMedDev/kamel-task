<?php

namespace App\Http\Webhooks;

use App\Exceptions\BadRequestException;
use App\Gateways\TapGateway;
use App\Models\DeliveryOrder;
use App\Models\Order;
use App\Services\OrderService;
use App\Services\TapService;
use Illuminate\Http\Request;

class TapWebhook extends WebhookHandler
{
    public function __invoke(Request $request, OrderService $orderService)
    {
        $request->validate([
            'tap_id' => 'required',
        ]);

        $deliveryOrder = DeliveryOrder::where('payment_id', $request->tap_id)->firstOrFail();
        $order = $deliveryOrder->order;
        $credentials = $order->paymentGateway->credentials;

        throw_if($order->paymentGateway->paymentGateway->name !== config('tap.name'), BadRequestException::class);

        $response = TapGateway::handlePaymentResponse([
            'tap_id' => $request->tap_id
        ], $credentials);

        $orderService->handlePaymentCallback($order);

        return response()->json($response);
    }
}