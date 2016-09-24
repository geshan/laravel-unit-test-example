<?php

namespace Test\Services;

use App\Services\Checkout;
use Test\TestCase;

/**
 * Tests for checkout service
 *
 * Class CheckoutTest
 * @package Test\Services
 */
class CheckoutTest extends TestCase
{
    /**
     *
     * @var Checkout
     */
    protected $checkout;

    public function setup()
    {
        $this->checkout = new Checkout();
    }

    /**
     * Data provider for testCalculateTotal
     * variables are in the order of
     * $paymentMethod, $expectedTotal
     *
     * @return type
     */
    public function paymentMethodProvider()
    {
        return [
            ['Cash', 'me@mydomain.com', 100.00],
            ['CreditCard', 'me@mydomain.com', 95.00],
            ['PayPal', 'myName@gmail.com', 95.00],
            ['PayPal', 'me@mydomain.com', 0.00]
        ];
    }

    /**
     * Test to check if the order total is calculated correctly
     * for given payment method.
     *
     * @param string $paymentMethod
     * @param float $expectedTotal
     *
     * @dataProvider paymentMethodProvider
     */
    public function testCalculateTotal($paymentMethod, $email, $expectedTotal)
    {
        $this->assertEquals(
            $this->checkout->calculateTotal($paymentMethod, $email),
            $expectedTotal,
            sprintf('Testing total calculation for %s.', $paymentMethod)
        );
    }
}