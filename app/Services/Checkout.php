<?php

namespace App\Services;


class Checkout
{
    protected $cashOnDeliveryFee = 0.0;
    protected $subTotal          = 0.0;

    /**
     * @var string
     */
    protected $paymentMethod;

    /**
     * Calculates total, if payment method is cash 5.00 is added as
     * post payment fees.
     *
     * @param $paymentMethod
     * @return float
     */
    public function calculateTotal($paymentMethod)
    {
        $this->subTotal = 95.00;
        if ('Cash' === $paymentMethod) {
            $this->cashOnDeliveryFee = 5.00;
        }

        return $this->subTotal + $this->cashOnDeliveryFee;
    }
}