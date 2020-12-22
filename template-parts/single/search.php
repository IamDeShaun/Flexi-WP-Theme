<?php get_header();
?>
<div class="o-container u-margin-bottom-40">
<div class="o-row">
<div class="o-row__column o-row__column--span-12">
	<header class="archiveheader">
    <h1><?php
            printf( esc_html__('Search results for: %s', 'flexi-theme'), get_search_query())
    ?></h1>
	</header>
</div>
	<div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?>@medium">
	<main id="main" class="spacer site-main">

		<?php get_template_part('template-parts/loop', 'search'); ?>
	</main><!-- #main -->
	<?php the_posts_pagination(); ?>
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
