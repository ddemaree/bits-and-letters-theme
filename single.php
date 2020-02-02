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

        the_post(); ?>

    <article <?php post_class('entry-wrapper'); ?> id="post-<?php the_ID(); ?>">
    <?php
        get_template_part('template-parts/entry-header');
        get_template_part('template-parts/featured-image');
        get_template_part('template-parts/full-content');
      }
    }
    ?>
    </article>
  </div>
</main>

<?php
get_footer();
?>