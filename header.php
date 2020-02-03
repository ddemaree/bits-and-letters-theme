<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('template-parts/head-content'); ?>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header mb4 <?= (bnl_has_fancy_header() ? "has-fancy-header" : "") ?>" role="banner">
  <?php get_template_part('template-parts/site-navigation'); ?>
</header>