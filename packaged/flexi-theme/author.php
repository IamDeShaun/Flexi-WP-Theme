<?php get_header(); ?>
<?php 
$author = get_query_var('author');
$author_id = get_the_author_meta('ID');
$author_posts = count_user_posts($author);
$author_display = get_the_author_meta( 'display_name', $author );
$author_description = get_the_author_meta( 'user_description', $author );
$author_website = get_the_author_meta( 'user_url', $author );
?>
<div class="o-container u-margin-bottom-40">
<div class="o-row">

<div class="main o-row__column o-row__column--span-12 o-row__column--span-4@medium">
  <header>
    <?php echo get_avatar($author, 128); ?>
    <h1 clss="u-margin-top-20"><strong><?php echo esc_html($author_display); ?></strong></h1>
    <div class="c-post-author__info">
    <?php
        /* translator: %s is the number of posts */
      printf( esc_html(_n( '%s post', '%s posts', $author_posts, 'flexi-theme')), number_format_i18n( $author_posts ));
      ?>
      <br />
      <?php if($author_website) { ?>
        <a target="_blank" href="<?php echo esc_url( $author_website ); ?>"><?php echo esc_html($author_website); ?></a>
      <?php } ?>
    </div>
    
      <p class="c-post-author__desc"><?php echo esc_html($author_description); ?></p>
  </header>
</div>
	<div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?>@medium">
	<main id="main" class="spacer site-main">

		<?php get_template_part('template-parts/loop', 'author'); ?>
	</main><!-- #main -->
	<?php the_posts_pagination(); ?>
 <?php do_action('flexi-theme-action'); ?>

</div> <!-- End Column -->
<div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
 
 </div><!-- End Sidebar -->

</div><!-- End Row -->
</div> <!-- End Container -->
<?php get_footer(); ?>
