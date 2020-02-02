<?php

$prev_page_text = '<span class="pagination__arrow pagination__arrow--left" aria-hidden="true">&larr;&nbsp;</span>Newer posts';
$next_page_text = 'Older posts<span class="pagination__arrow pagination__arrow--right" aria-hidden="true">&nbsp;&rarr;</span>';

$prev_page_link = get_previous_posts_link($prev_page_text);
$next_page_link = get_next_posts_link($next_page_text);

if($prev_page_link || $next_page_link):

	bnl_separator('archives'); ?>

<nav class="pagination pagination--archives f4 mv5 flex justify-between">
	<div class="pagination__link pagination__link--previous">
		<?= $prev_page_link ? $prev_page_link : bnl_get_pagination_placeholder($prev_page_text) ?>
	</div>
	<div class="pagination__link pagination__link--next">
		<?= $next_page_link ? $next_page_link : bnl_get_pagination_placeholder($next_page_text) ?>
	</div>
</nav>
<?php endif; ?>