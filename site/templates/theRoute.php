<?php
/**
 * Created by PhpStorm
 * User: Simon
 * Date: 13.03.2016
 * Time: 22:43
 */


require_once('vendor/autoload.php');

use /** @noinspection PhpUndefinedClassInspection */
    Stripe\Balance;
use /** @noinspection PhpUndefinedClassInspection */
    Stripe\Customer;
use /** @noinspection PhpUndefinedClassInspection */
    Stripe\Error\Base;
use /** @noinspection PhpUndefinedClassInspection */
    Stripe\Error\Card;
use /** @noinspection PhpUndefinedClassInspection */
    Stripe\Error\InvalidRequest;
use /** @noinspection PhpUndefinedClassInspection */
    Stripe\Error\RateLimit;

?>


<?php snippet('header') ?>
    <main class="main" role="main">
        <div class="text">
            <h1><?php echo $page->title()->html() ?></h1>
            <?php echo $page->text()->kirbytext() ?>
        </div>
        <?php

        try {

            $token = $_POST['stripeToken'];
            echo $token;



            /** @noinspection PhpUndefinedClassInspection */
            /** @var TYPE_NAME $balance */
            $balance =  Balance::retrieve();


            debug_zval_dump($balance);
            var_dump($balance);

            if (isset($balance)) {
                echo $balance;
            }else{



                echo 'cooooooo';


            }
            /** @noinspection PhpUndefinedClassInspection */
            $customer = Customer::create(array(


                    "source" => $token,
                    "description" => "First Customer")
            );



            // YOUR CODE: Save the customer ID and other info in a database for later!
            // wahrscheinlich wäre nicht blöd hier das user plugin von kirby zu erweitern
                //cheat sheet  $users->create($data = array())
                //jetzt nur mal array auslesen
                echo $customer;


            \Stripe\Charge::create(array(
                    "amount" => 1000, // amount in cents, again
                    "currency" => "eur",
                    "customer" => $customer->id)
            );


            //auslesen

        } /** @noinspection PhpUndefinedClassInspection */ catch(Card $e) {
            // Since it's a decline, \Stripe\Error\Card will be caught
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");



            /**
             * @params  ratelimit
             *
             */
        } /** @noinspection PhpUndefinedClassInspection */ catch (RateLimit $e) {
            // Too many requests made to the API too quickly
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
        } /** @noinspection PhpUndefinedClassInspection */ catch (InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
        } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
        } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
        } /** @noinspection PhpUndefinedClassInspection */ catch (Base $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
        }

        ?>


        <div class="blackborder" style="  border:1px solid black;">
<?php
/*
        TODO create FORM  to let user or admin() create(adjust?) payment plans ?
            require_once('vendor/autoload.php');
            header('content-type:application/json');

            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey("sk_test_whjkrxk5hN8TVKhtYKEaI34C");
             $thePlan =  \Stripe\Plan::create(array(
                "amount" => 2000,
                "interval" => "month",
                "name" => "Amazing Gold Plan",
                "currency" => "eur",
                "id" => "gold")
                );
    */




?>
        </div>

        <hr>
        <hr>


    </main>

<?php snippet('footer') ?>