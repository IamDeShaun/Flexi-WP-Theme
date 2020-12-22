<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flexi_Theme
 */

get_header();
?>
<div class="o-container u-margin-bottom-40">
		<div class="o-row">
				<div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
					<main id="primary" class="site-main">
								<?php get_template_part('loop','page'); ?>
					</main><!-- #main -->
				</div> <!-- End Column -->


				<div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
								<?php get_sidebar(); ?>
								</div><!-- End Sidebar -->

					</div> <!-- End Row -->
				</div><!-- End Container -->

<?php get_footer(); ?>
