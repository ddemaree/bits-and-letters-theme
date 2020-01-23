<article <?php post_class('entry-wrapper flex flex-column items-center'); ?> id="post-<?php the_ID(); ?>">

<div class="entry-header tc mb4">
<?php
if ( is_singular() ) {
  the_title( '<h1 class="entry-title">', '</h1>' );
} else {
  the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
}
?>
<?php bnl_entry_meta(); ?>
</div>

<?php if ( has_post_thumbnail() ): ?>
<figure class="featured-media relative">
  <?php
  the_post_thumbnail('full');

  $caption = get_the_post_thumbnail_caption();

  if ( $caption ) {
    ?>

    <figcaption class="wp-caption-text"><?php echo esc_html( $caption ); ?></figcaption>

    <?php
  }
  ?>
</figure><!-- .featured-media -->
<?php endif; ?>

<div class="entry-content flex flex-column">
  <?php
  if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
    the_excerpt();
  } else {
    the_content( __( 'Continue reading', 'twentytwenty' ) );
  }
  ?>
</div><!-- .entry-content -->
</article>