<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 14.03.2016
 * Time: 17:17
 */


require_once('/stripe-php-3.9.2/init.php');
snippet('header');

\Stripe\Stripe::setApiKey("sk_test_OtK2XhGGxwDaUkyHsSeUs3Ha");

$theCustomer = \Stripe\Customer::create(array(
    "description" => "Customer for test@example.com",
    "source" => "tok_17oE1BIUWfqu9gNF2MUQiker" // obtained with Stripe.js
));


/* how to save data in db*/

echo $theCustomer;

