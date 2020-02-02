<?php
get_header();
?>

<main id="site-content" role="main">

<div class="bg-pink tc f3 pv3">
<h3>FPO - HEADER AREA</h3>
<p>Site, category, tag, or search into</p>
</div>

<div class="center entries-list content-wrapper">
<?php
if( have_posts() ) {
  $postCount = 0;
  while( have_posts() ) {
    $postCount++;

    if($postCount > 1) bnl_separator('archives');

    the_post(); ?>
  <article <?php post_class('entries-list__card'); ?> id="post-<?php the_ID(); ?>">
    <?php 
    
    the_title( '<h2 class="entry-title entries-list__title f3 fw4 lh-title ma0"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); 

    bnl_entry_meta();

    if(has_excerpt()) {
      print( '<p class="entry-excerpt lh-copy measure ma0 mv2 bnl-serif">' . get_the_excerpt() . '</p>' );
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