<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">


  <!-- jquery lib??-->
  <link rel="icon" href="/assets/images/favicon.ico" type="image/vnd.microsoft.icon">
  <?php echo css('assets/css/main.css') ?>
  <title><?= html($page->title()) ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style><?php include($kirby->roots->assets.DS.''.DS.'outdatedbrowser.min.css'); ?></style>

  <!-- libs-->

  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
<!-- diese zwei dinge setzten... key ist mein eigener kann im dashboard aktualisiert werden.
  Was tun wenn er aktualisiert wird.
  -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
    // This identifies your website in the createToken call below
    Stripe.setPublishableKey('pk_test_RJ7qro5kVA5VHFfwzHxIwfY3');
    // ...
    </script>
  <script>



    $(document).ready(function() {
      console.log("doc ready ");

      $('#payment-form').submit(function(event) {
        var $form = $(this);

        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);

        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from submitting with the default action
        return false;
      });

      function stripeResponseHandler(status, response) {
        var $form = $('#payment-form');

        if (response.error) {
          console.log("response error");
          // Show the errors on the form
          $form.find('.payment-errors').text(response.error.message);
          $form.find('button').prop('disabled', false);
        } else {
          console.log("response success");
          // response contains id and card, which contains additional card details
          var token = response.id;
          // Insert the token into the form so it gets submitted to the server
          $form.append($('<input type="hidden" name="stripeToken" />').val(token));
          // and submit
          $form.get(0).submit();
        }




      };




      // Watch for a form submission:
      /*2012
      $("#payment-form").submit(function(event) {



        console.log("payment form submitted");

        //VALIDATION FUNCTIONS

        var error = false;
        var reportError;
// Get the values:
        var ccNum = $('.card-number').val(),
            cvcNum = $('.card-cvc').val(),
            expMonth = $('.card-expiry-month').val(),
            expYear = $('.card-expiry-year').val();
        console.log(ccNum);

// Validate the number:
        if (!Stripe.card.validateCardNumber(ccNum)) {
          console.log("invalid number");
          error = true;
          reportError('The credit card number appears to be invalid.');
        }

// Validate the CVC:
        if (!Stripe.card.validateCVC(cvcNum)) {
          console.log("cvc invalid ");
          error = true;
          reportError('The CVC number appears to be invalid.');
        }

// Validate the expiration:
        if (!Stripe.card.validateExpiry(expMonth, expYear)) {
          console.log("The expiration date appears to be invalid.");
          error = true;
          reportError('The expiration date appears to be invalid.');
        }


        if (!error) {
          console.log("no error- creating token");
          // Get the Stripe token:
          Stripe.card.createToken({
            number: ccNum,
            cvc: cvcNum,
            exp_month: expMonth,
            exp_year: expYear
          }, stripeResponseHandler);
        }

      }); // form submission
 */
    }); // document ready.
  </script>


</head>
<body>
  <header class="header " role="banner">
    <a class="logo" href="<?php echo url() ?>">
      <img src="<?php echo url('assets/images/logo.svg') ?>" alt="<?php echo $site->title()->html() ?>" />
    </a>
    <?php snippet('menu') ?>


  </header>