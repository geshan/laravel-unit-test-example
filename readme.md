## Laravel Unit testing example

[![Build Status](https://travis-ci.org/geshan/laravel-unit-test-example.svg?branch=master)](https://travis-ci.org/geshan/laravel-unit-test-example)

Usually I see tutorials to tests Laravel which are just functional tests, I think unit testing should be given priority too. Done for this blog [post](http://bit.ly/laravel-unit-test).

## Clone and Run

To clone and run this locally do the following:

* git clone git@github.com:geshan/laravel-unit-test-example.git
* cd laravel-unit-test-example
* cp .env.example .env
* run `composer install --prefer-dist`
* php artisan serve
* try `http://localhost:8000/place/Cash` on your browser you should see `Checkout for Cash with total 100`
* try `http://localhost:8000/place/CreditCard` on your browser you should see `Checkout for CreditCard with total 95`

## Run tests

PHPUnit is used to write the unit tests, to run the tests run the following command after composer install is done.

```
>./vendor/bin/phpunit
```

## Docker with virtual host

To run with docker and nginx proxy at virtual host laravel.dev do the following steps

1. Add `laravel.dev` to your `/etc/hosts` with `sudo echo '120.0.0.1 laravel.dev' >> /etc/hosts`
1. Run jwilder/nginx-proxy with `docker run -d -p 80:80 -v /var/run/docker.sock:/tmp/docker.sock:ro -v ~/projects/nginx-proxy/logs:/var/log/nginx jwilder/nginx-proxy` it will have logs in the `~/projects/nginx-proxy/logs` folder
1. Then start the container with docker-compose up (check the [docker-compose.yml](/docker-compose.yml) file for details)
1. Then point your browser to `http://laravel.dev/place/Cash` to see the desired output. (you might need to 777 your storage folder
  in case of errors)

### To include mysql

1. Run dydx/maria db `docker run -d -p 3306:3306 -v ~/Projects/data:/var/lib/data --name=mysql dydx/alpine-mariadb`
1. Uncomment the following in docker-compose.yml
```
 external_links:
   - mysql:mysql
```
1. username and password is homestead:secret, now your mysql host for laravel should be `mysql`
