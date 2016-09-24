<?php

namespace App\Http\Controllers;

use App\Services\Checkout;

/**
 * Controller to enable placing orders
 *
 * Class CheckoutController
 * @package App\Http\Controllers
 */
class CheckoutController extends Controller
{
    /**
     * @var Checkout
     */
    protected $checkout;

    /**
     * Constructor
     *
     * @param Checkout $checkout
     */
    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    /**
     * Place order
     *
     * @param string $paymentMethod
     * @param string $email
     *
     * @return $this
     */
    public function placeOrder($paymentMethod, $email='test@mydomain.com')
    {
        $view = view('checkout')->with('paymentMethod', $paymentMethod);
        $view->with('orderTotal', $this->checkout->calculateTotal($paymentMethod, $email));

        return $view;
    }

}