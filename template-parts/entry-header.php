<div class="entry-header tc mb4">
<?php
if ( is_singular() ) {
  the_title( '<h1 class="entry-title f2 ma0 mb3 fw3">', '</h1>' );
} else {
  the_title( '<h2 class="entry-title f2 ma0 mb3 fw3"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
}
?>
<?php bnl_entry_meta(); ?>
</div>