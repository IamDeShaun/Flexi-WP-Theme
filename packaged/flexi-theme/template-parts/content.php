<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flexi_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('c-post u-margin-bottom-20'); ?>>
	<div class="entry-header">
	<div class="c-post_thumbnail">
<?php flexi_theme_post_thumbnail('full'); ?>
</div>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				flexi_theme_posted_on();
				flexi_theme_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		</div><!-- .entry-header -->

<?php var_dump(get_post_meta( get_the_ID(), 'price' )) ?>
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'flexi-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flexi-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
