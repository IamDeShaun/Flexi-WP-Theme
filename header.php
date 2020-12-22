<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flexi_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/e965d5823c.js" crossorigin="anonymous"></script>
	<script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'flexi-theme' ); ?></a>

	<header id="masthead" class="header primarynav">
		<div class="logo">
			<?php if(has_custom_logo( )) {
			the_custom_logo( );
				 
			} else { ?>
			
				<a href="<?php echo esc_url( home_url( '/' )); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
			<?php } ?>
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="flexi-nav-light">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<?php get_search_form( true); ?>
       
        <div class="menu-toggle">
            <i class="fas fa-bars fa-lg"></i>
            <i class="fas fa-times fa-lg"></i>
        </div>
	</header><!-- #masthead -->
