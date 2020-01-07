<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<?php
if ( is_singular() ) {
  the_title( '<h1 class="entry-title">', '</h1>' );
} else {
  the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
}
?>

<div class="entry-content">
  <?php
  if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
    the_excerpt();
  } else {
    the_content( __( 'Continue reading', 'twentytwenty' ) );
  }
  ?>
</div><!-- .entry-content -->
</article>