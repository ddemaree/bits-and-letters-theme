<div class="entry-header tc">
<?php
if ( is_singular() ) {
  the_title( '<h1 class="entry-title">', '</h1>' );
} else {
  the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
}
?>
<?php bnl_entry_meta(); ?>
</div>