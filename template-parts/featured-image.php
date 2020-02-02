<?php if ( false && has_post_thumbnail() ): ?>
<figure class="featured-media relative flex flex-column items-center">
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