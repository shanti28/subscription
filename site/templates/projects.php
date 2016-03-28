<?php snippet('header') ?>

  <main class="main blackborder" role="main">

    <div class="text">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </div>


    <?php snippet('stripeCustomerDataEntryForm') ?>

  </main>

<?php snippet('footer') ?>