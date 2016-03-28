<?php


snippet('header') ?>

  <main class="main" role="main">

    <div class="text">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </div>
    <div class="blackborder" style="  border:1px solid black;">
      Where is this div?
    <!-- warum geht nur inline style? -->
      wichtige fragen!
  wie forms
      wie scss
      wie db queries?
    </div>
    <hr>
    <?php

    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    echo $html2pdf;
    $html2pdf->writeHTML('<p>This is your first PDF File</p>');
    $html2pdf->Output('first_PDF_file.pdf','D');


    ?>



    <?php snippet('projects') ?>

  </main>

<?php snippet('footer') ?>