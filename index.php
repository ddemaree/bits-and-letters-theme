<?php
get_header();
?>

<main id="site-content" role="main">
<div class="center entries-list mw7 pa4">
<?php
if( have_posts() ) {
  $postCount = 0;
  while( have_posts() ) {
    $postCount++;

    if($postCount > 1) { echo '<hr class="entry-separator mv4 b--light-gray">'; }

    the_post(); ?>
  <article <?php post_class('entries-list__card'); ?> id="post-<?php the_ID(); ?>">
    <?php 
    
    the_title( '<h2 class="entry-title entries-list__title f3 fw4 lh-title ma0"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); 

    bnl_entry_meta();

    if(has_excerpt()) {
      print( '<p class="entry-excerpt f4 lh-copy measure ma0 mv2 bnl-serif">' . get_the_excerpt() . '</p>' );
    }
    ?>
  </article>

    <?php
  }
}

get_template_part( 'template-parts/pagination' );
?>
</div>
</main>

<?php
get_footer();
?>