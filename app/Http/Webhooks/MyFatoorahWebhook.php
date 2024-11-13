<?php

namespace App\Http\Webhooks;

use App\Exceptions\BadRequestException;
use App\Gateways\MyFatoorahGateway;
use App\Models\Order;
use App\Services\OrderService;
use App\Models\DeliveryOrder;
use Illuminate\Http\Request;

class MyFatoorahWebhook extends WebhookHandler
{
    public function __invoke(Request $request, OrderService $orderService)
    {
        $request->validate([
            'Id' => 'required',
            'paymentId' => 'required',
            'payment_id' => 'required',
        ]);

        $deliveryOrder = DeliveryOrder::where('payment_id', $request->payment_id)->firstOrFail();
        $order = $deliveryOrder->order;
        $credentials = $order->paymentGateway->credentials;

        $response = MyFatoorahGateway::handlePaymentResponse([
            'Id' => $request->Id,
            'paymentId' => $request->paymentId,
        ], $credentials);

        $orderService->handlePaymentCallback($order);

        return response()->json($response);
    }
}