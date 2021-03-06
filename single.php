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

<?php
	$layout = _flexi_theme_meta(get_the_ID(), '__flexi_post_layout', 'full' );
	$sidebar = is_active_sidebar( 'primary-sidebar' );
	if($layout === 'sidebar' && !$sidebar) {
			$layout = 'full';
	}
?>

<div class="o-container u-margin-bottom-40 o-single-post-<?php echo $layout; ?>">
		<div class="o-row">
						<div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $layout === 'sidebar' ? '8' : '12' ?>@medium">
								<main id="main" class="spacer site-main">
								<?php if(have_posts()) { ?>
												<?php while(have_posts()) { ?>
														<?php the_post(); ?>

														<?php get_template_part( 'template-parts/page/content' ); ?>
							
												<?php } ?>
										<?php } else { ?>
												<?php get_template_part( 'template-parts/post/content', 'none' ); ?>
										<?php } ?>
								</main><!-- #main -->

					</div> <!-- End Column -->
					<?php if( $layout === 'sidebar') { ?>
								<div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
								<?php get_sidebar(); ?>
								</div><!-- End Sidebar -->
								<?php } ?>
					</div><!-- End Row -->
		</div> <!-- End Container -->
<?php get_footer(); ?>

