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

    <div class="author-info measure-wide center">
      <hr class="bnl-separator separator mb4" />
      <div class="flex items-center mb4 ph2">
        <?php echo get_avatar(get_the_author_meta('ID'), 68, null, ('Photo of ' . get_the_author_meta('display_name')), array('class' => 'br-100 author-photo')); ?>
        <div class="ml3">
          <p class="ma0 mb1 f5 b lh-title"><?php the_author_meta('display_name'); ?></p>
          <p class="ma0 f6 bnl-serif gray lh-copy"><?php the_author_meta('description'); ?></p>
        </div>
      </div>

      <hr class="bnl-separator separator mb4" />

      <div class="bg-pink tc f3 pv3 measure-wide center mb4">
      <h3>FPO - PAGINATION</h3>
      <p>Next/previous post links</p>
      </div>
    </div>

  </div>
</main>

<?php
get_footer();
?>