<?php
get_header();
the_post();
?>

<main id="site-content" role="main">
  <div class="wrapper">
    <?php
      get_template_part('template-parts/full-content');
    ?>

    <div class="bg-pink tc f3 pv3">
    <h3>FPO - SINGLE PAGE</h3>
    </div>

  </div>
</main>

<?php
get_footer();
?>