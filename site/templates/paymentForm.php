<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 15.03.2016
 * Time: 10:20
 */

use /** @noinspection PhpUndefinedClassInspection */
    Stripe\Balance;

f::append('content/pay','blablub');

$balance =  Balance::retrieve();
echo $balance;

?>


<form action="pay" method="POST" id="payment-form" class="">

    <div >
        <label>
            <span>Card Number</span>
            <input type="text" size="20" value="4242424242424242"$value
    </div>

    <button type="submit" class="blackborder borderRadius">Submit Payment</button>
</form>


