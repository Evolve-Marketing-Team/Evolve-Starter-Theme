<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evolve_starter
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'evolve_starter' ); ?></a>

		<header id="masthead" class="site-header">

			<div class="site-branding">

				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php elseif ( is_front_page()) : ?>

						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php else : ?>

					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

				<?php endif; ?>
			</div><!-- .site-branding -->

			<button id="hamburgerMenu" class="hamburger hamburger--spin" aria-controls="primary-menu" aria-label="Open Primary Menu" aria-expanded="false">

				<div class="hamburger-inner-wrapper">

					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>	

				</div>
			
			</button>

			<div class="nav-container">
			

				<nav id="desktop-navigation" class="desktop-navigation">

					<?php 
					if( function_exists( 'evolve_starter_desktop_nav' ) ) {
						evolve_starter_desktop_nav();
					}
				?>

				</nav><!-- #site-navigation -->

			</div><!-- .nav-container -->
			
		</header><!-- #masthead -->
		
		<?php 
		$enable_hmb = get_field('enable_message_bar', 'option');
		$message = get_field('message', 'option');
		
		if($enable_hmb == "1") : ?>
		<div class="header-message-bar">

			<div class="container">

				<div class="header-message"><?php echo $message; ?></div>

			</div>
		</div>
		<?php endif; ?>
