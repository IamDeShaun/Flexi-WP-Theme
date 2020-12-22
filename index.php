<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flexi_Theme
 */

get_header();
?>
<div class="o-container u-margin-bottom-40">
<div class="o-row">
	<div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?>@medium">
	<main id="main" class="spacer site-main">
		<?php get_template_part('template-parts/loop', 'index'); ?>
	</main><!-- #main -->
	<?php the_posts_pagination( ); ?>
 <?php do_action('flexi-theme-action'); ?>

</div> <!-- End Column -->
<?php if (is_active_sidebar('primary-sidebar')) { ?>
<div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
 <?php get_sidebar(); ?>
 </div><!-- End Sidebar -->
<?php } ?>
</div><!-- End Row -->
</div> <!-- End Container -->
<?php get_footer(); ?>
