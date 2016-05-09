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
            ['/', 200],
            ['/place/cc', 200],
            ['/place/cod', 200],
            ['/non-existing', 404],
        ];
    }

    /**
    * This is kind of a smoke test
    *
    * @dataProvider providerAllUrisWithResponseCode
    **/
    public function testApplicationUriResponses($uri, $responseCode)
    {
      print sprintf('checking URI : %s - to be %d - %s', $uri, $responseCode, PHP_EOL);
      $response = $this->call('GET', $uri);

      $this->assertEquals($responseCode, $response->status());
    }
}
