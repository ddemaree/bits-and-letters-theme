<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="pa4 tc">
  <?php
  // bnl_site_description();
  ?>
  <nav class="primary-menu-wrapper flex justify-between">
  <a href="/" class="header-icon flex dark-gray items-center">
    <?php get_template_part('template-parts/svg-icon'); ?>
    <div class="site-title ml3 f3 fw5"><?= get_bloginfo('name'); ?></div>
  </a>
  <?php if ( has_nav_menu( 'primary' ) ): ?>

  <pre><?php
    $items = wp_get_nav_menu_items('primary');
    print_r($items);
  ?></pre>
  <ul class="primary-menu list flex ma0">
    <?php
      wp_nav_menu(
        array(
          'container'  => '',
          'items_wrap' => '%3$s',
          'theme_location' => 'primary',
        )
      );
    ?>
  </ul>
  </nav>
  
  <?php endif; ?>
</header>