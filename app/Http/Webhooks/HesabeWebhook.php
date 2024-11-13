<?php

namespace App\Http\Webhooks;

use App\Gateways\HesabeGateway;
use App\Models\DeliveryOrder;
use App\Models\Order;
use App\Services\HesabeWebhookService;
use App\ThirdParties\HesabeKits\Misc\Constants;
use Illuminate\Http\Request;
use App\Exceptions\BadRequestException;
use App\Services\OrderService;

class HesabeWebhook extends WebhookHandler
{
    public function __invoke(Request $request, OrderService $orderService)
    {
        $request->validate([
            'data' => 'required',
            'payment_id' => 'required',
        ]);

        $deliveryOrder = DeliveryOrder::where('payment_id', $request->payment_id)->firstOrFail();
        $order = $deliveryOrder->order;
        $credentials = $order->paymentGateway->credentials;

        $response = HesabeGateway::handlePaymentResponse($request->data, $credentials);

        $orderService->handlePaymentCallback($order);

        return response()->json($response);
    }
}