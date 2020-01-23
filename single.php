<?php
get_header();
?>

<main id="site-content" role="main">
<div class="center ph4 mw7">
<?php
if( have_posts() ) {
  $postCount = 0;
  while( have_posts() ) {
    $postCount++;

    the_post();

    get_template_part('template-parts/full-content');
  }
}
?>
</div>
</main>

<?php
get_footer();
?>