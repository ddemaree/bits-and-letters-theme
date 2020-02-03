<?php
/*
Template Name: Fancy Header
Template Post Type: page
*/

the_post();
get_header();
?>

<main id="site-content" role="main">
  <?php get_template_part('template-parts/fancy-header'); ?>

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