<?php

namespace Test\Services;

use App\Services\Checkout;
use Test\TestCase;

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
            ['Cash', 100.00],
            ['Credit Card', 95.00]
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
    public function testCalculateTotal($paymentMethod, $expectedTotal)
    {
        $this->assertEquals(
            $this->checkout->calculateTotal($paymentMethod),
            $expectedTotal,
            sprintf('Testing total calculation for %s.', $paymentMethod)
        );
    }


}
