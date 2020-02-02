<?php
get_header();
?>

<main id="site-content" role="main">
  <div class="wrapper">
    <?php
    if( have_posts() ) {
      $postCount = 0;
      while( have_posts() ) {
        $postCount++;

        the_post();
    
        get_template_part('template-parts/full-content');
      }
    }
    ?>

    <div class="bg-pink tc f3 pv3">
    <h3>FPO - SINGLE PAGE</h3>
    </div>

  </div>
</main>

<?php
get_footer();
?>