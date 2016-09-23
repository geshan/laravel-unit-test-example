## Laravel Unit testing example

[![Build Status](https://travis-ci.org/geshan/laravel-unit-test-example.svg?branch=master)](https://travis-ci.org/geshan/laravel-unit-test-example)

Usually I see tutorials to tests Laravel which are just functional tests, I think unit testing should be given priority too. Done for this blog [post](http://bit.ly/laravel-unit-test).

## Clone and Run

To clone and run this locally do the following:

* git clone git@github.com:geshan/laravel-unit-test-example.git
* cd laravel-unit-test-example
* cp .env.example .env
* run `composer install --prefer-dist`
* cd public
* php -S localhost:8000
* try `http://localhost:8000/place/Cash` on your browser you should see `Checkout for Cash with total 100`
* try `http://localhost:8000/place/CreditCard` on your browser you should see `Checkout for CreditCard with total 95`

## Run tests

PHPUnit is used to write the unit tests, to run the tests run the following command after composer install is done.

```
>./vendor/bin/phpunit
```
