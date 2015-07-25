<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function placeOrder(Request $request)
    {
        return view('welcome');
    }

}