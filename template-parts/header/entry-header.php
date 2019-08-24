<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$discussion = ! is_page() && bitsandletters_can_show_post_thumbnail() ? bitsandletters_get_discussion_data() : null; ?>

<?php
// Show primary category
if( !is_page() ) {

			/* translators: used between list items, there is a space after the comma. */
			$categories = get_the_category();
			if ( $categories ) {
				$category = $categories[0];
				$cat_link = get_category_link($category->cat_ID);
				$cat_name = $category->cat_name;
				printf(
					'<div class="entry-category">
						<a href="%1$s">%2$s</a>
					</div>',
					$cat_link,
					$cat_name
				);
				// printf(
				// 	'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
				// 	bitsandletters_get_icon_svg( 'archive', 16 ),
				// 	__( 'Posted in', 'bitsandletters' ),
				// 	$categories_list
				// ); // WPCS: XSS OK.
			}
}
?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta">
	<?php bitsandletters_posted_on(); ?>
</div><!-- .entry-meta -->
<?php endif; ?>
