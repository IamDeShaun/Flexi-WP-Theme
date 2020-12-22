<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Flexi_Theme
 */

get_header();
?>
		<div class="o-container u-margin-bottom-40">
					<div class="o-row">
					<div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?>@medium">
						<main id="primary" class="site-main">

							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );
								get_template_part('template-parts/single/author'); 
								get_template_part('template-parts/single/navigation'); 

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
						</main><!-- #main -->
					</div> <!-- End Column -->


					<?php if (is_active_sidebar('primary-sidebar')) { ?>
					<div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
									<?php get_sidebar(); ?>
									</div><!-- End Sidebar -->
									<?php } ?>

						</div> <!-- End Row -->
		</div><!-- End Container -->

<?php get_footer(); ?>
