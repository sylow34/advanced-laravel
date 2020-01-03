<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Mixins\StrMixins;
use App\Orders\OrderDetails;
use Illuminate\Support\Str;

class PayOrderController extends Controller
{
    public function __construct()
    {
        Str::mixin(new StrMixins());
    }

    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {

        dd(\Illuminate\Support\Str::refNumber('7664w202885261bb'));
        $order = $orderDetails->all();
        dd($paymentGateway->charge(2500));
    }
}
