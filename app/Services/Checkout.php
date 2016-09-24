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
    protected $subTotal = 0.0;

    /**
     * @var string
     */
    protected $paymentMethod;

    const ALLOWED_PAYMENT_METHODS = ['Cash', 'CreditCard', 'PayPal'];

    const PAYAPL_ALLLOWED_DOMAIN = '@gmail.com';

    const CASH_ON_DELIVERY_FEE = 5.00;

    /**
     * Calculates total, if payment method is cash 5.00 is added as
     * post payment fees.
     *
     * If payment method is invalid, will return 0.
     *
     * Payment method `PayPal` has a feature switch/flag, it is available ony for email ending in @gmail.com.
     *
     * @param $paymentMethod
     * @return float
     */
    public function calculateTotal($paymentMethod, $email)
    {
        $invalidOrderTotal = 0;

        if (!$this->isPaymentMethodValid($paymentMethod)) {
            return $invalidOrderTotal;
        }

        if ('PayPal' === $paymentMethod && !ends_with($email, self::PAYAPL_ALLLOWED_DOMAIN)) {
            return $invalidOrderTotal;
        }

        $this->subTotal = 95.00;
        if ('Cash' === $paymentMethod) {
            $this->cashOnDeliveryFee = self::CASH_ON_DELIVERY_FEE;
        }

        return $this->subTotal + $this->cashOnDeliveryFee;
    }

    protected function isPaymentMethodValid($paymentMethod)
    {
        return in_array($paymentMethod, self::ALLOWED_PAYMENT_METHODS, true);
    }
}
