<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Flexi_Theme
 */

get_header();
?>
<div class="o-container u-margin-bottom-40">
	<div class="o-row">
				<div class="o-row__column o-row__column--span-12">
						<main id="main" class="spacer site-main">
							<h3><?php esc_html_e('Ooops nothing found on this page here buddy!')  ?></h3>
						</main><!-- #main -->
						<?php the_posts_pagination(); ?>
			</div> <!-- End Column -->
	</div><!-- End Row -->
</div> <!-- End Container -->
<?php get_footer(); ?>
