<?php // Create a customer using a Stripe token

// If you're using Composer, use Composer's autoload:
require_once('vendor/autoload.php');

// Be sure to replace this with your actual test API key
// (switch to the live key later)
\Stripe\Stripe::setApiKey("sk_test_OtK2XhGGxwDaUkyHsSeUs3Ha");

try
{
    $customer = \Stripe\Customer::create(array(
        'email' => $_POST['stripeEmail'],
        'source'  => $_POST['stripeToken'],
        'plan' => 'gold5'
    ));
    var_dump( $_POST['stripeEmail']);
    exit;
}
catch(Exception $e)
{

    error_log("unable to sign up customer:" . $_POST['stripeEmail'].
        ", error:" . $e->getMessage());
}