<?php

namespace Test\Integrated;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }

    public function providerAllUrisWithResponseCode()
    {
        return [
            ['/', 200, 'Laravel 5'],
            ['/place/CreditCard', 200, 'Checkout for CreditCard with total 95'],
            ['/place/CreditCard/me@mydomain.com', 200, 'Checkout for CreditCard with total 95'],
            ['/place/Cash', 200, 'Checkout for Cash with total 100'],
            ['/place/Cash/me@mydomain.com', 200, 'Checkout for Cash with total 100'],
            ['/place/PayPal/myName@gmail.com', 200, 'Checkout for PayPal with total 95'],
            ['/place/PayPal/me@mydomain.com', 200, 'Payment method PayPal, is not valid.'],
            ['/place/iDeal/me@mydomain.com', 200, 'Payment method iDeal, is not valid.'],
            ['/non-existing', 404, 'the page you are looking for could not be found.'],
        ];
    }

    /**
    * This is kind of a smoke test
    *
    * @dataProvider providerAllUrisWithResponseCode
    **/
    public function testApplicationUriResponses($uri, $responseCode, $visibleText)
    {
        print sprintf('checking URI : %s - to be %d - %s', $uri, $responseCode, PHP_EOL);
        $response = $this->call('GET', $uri);

        $this->assertEquals($responseCode, $response->status());
        $this->see($visibleText);
    }
}
