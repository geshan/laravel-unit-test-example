<?php

namespace App\Services;

/**
 * For checkout with different payment methods
 *
 * Class Checkout
 * @package App\Services
 */
class Checkout
{
    /**
     * @var float
     */
    protected $cashOnDeliveryFee = 0.0;

    /**
     * @var float
     */
    protected $subTotal          = 0.0;

    /**
     * @var string
     */
    protected $paymentMethod;

    const CASH_ON_DELIVERY_FEE = 5.00;

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
            $this->cashOnDeliveryFee = self::CASH_ON_DELIVERY_FEE;
        }

        return $this->subTotal + $this->cashOnDeliveryFee;
    }
}