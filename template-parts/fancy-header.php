<header class="fancy-header <?= has_post_thumbnail() ? " has-image" : ""; ?>">
  <div class="fancy-header__inner tc flex flex-column items-center justify-center w-100<?= has_post_thumbnail() ? " absolute z-2 bottom-2" : ""; ?>">
    <h1 class="measure">Page Title Here</h1>
    <p class="measure">This is a subtitle</p>
  </div>

  <?php if(has_post_thumbnail()): ?>
  <figure class="fancy-header__image z-0">
    <?php the_post_thumbnail('full'); ?>
  </figure>
  <?php endif; ?>
</header>