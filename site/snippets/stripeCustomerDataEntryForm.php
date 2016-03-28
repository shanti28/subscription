<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 13.03.2016
 * Time: 20:17
 */


require_once('vendor/autoload.php');

?>


<style>

.blackborder{
    border:1px solid black;
}
</style>
<p class="smallfont"> Form is prefilled/ VISA  /</p>
<p class="smallfont">Mehr Kreditkarten zum testen:https://stripe.com/docs/testin</p>
<!--//TODO go to insert page
-->
<br>
<form action="theRoute" method="POST" id="payment-form" class="">
    <span class="payment-errors"></span>

    <div class="form-row " >
        <label>
            <span>Card Number</span>
            <input type="text" size="20" data-stripe="number" value="4242424242424242" class="blackborder"/>
        </label>
    </div>

    <div class="form-row">
        <label>
            <span>CVC</span>
            <input type="text" size="4" data-stripe="cvc" value="123" class="blackborder"/>
        </label>
    </div>

    <div class="form-row">
        <label>
            <span>Expiration (MM/YYYY)</span>
            <input type="text" size="2" data-stripe="exp-month" value="08" class="blackborder"/>
        </label>
        <span> / </span>
        <input type="text" size="4" data-stripe="exp-year" value="2018" class="blackborder"/>
    </div>
    <button type="submit" class="blackborder borderRadius">Submit Payment</button>
</form>

