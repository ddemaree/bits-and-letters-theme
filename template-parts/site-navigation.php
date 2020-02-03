  <nav class="primary-menu-wrapper flex justify-between">

    <a href="/" class="header-icon flex items-center">
      <div class="f5">
        <?php get_template_part('template-parts/svg-icon'); ?>
      </div>
      <div class="site-title ml2 f5 fw5"><?= get_bloginfo('name'); ?></div>
    </a>
    
    <?php if ( has_nav_menu( 'primary' ) ): ?>
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
    <?php endif; ?>

  </nav>