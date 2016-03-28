<?php snippet('header') ?>

  <main class="main" role="main" class="-border">
<p> Default </p>
    <div class="text">

      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </div>

  </main>

<?php snippet('footer') ?>