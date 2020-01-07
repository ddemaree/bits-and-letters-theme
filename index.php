<?php
get_header();
?>

<main id="site-content" role="main">
<?php
if( have_posts() ) {
  $postCount = 0;
  while( have_posts() ) {
    $postCount++;
    
    if($postCount > 1) { echo '<hr>'; }

    the_post();

    get_template_part('template-parts/content');
  }
}
?>
</main>

<?php
get_footer();
?>