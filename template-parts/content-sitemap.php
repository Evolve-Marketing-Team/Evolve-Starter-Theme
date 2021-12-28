<?php
/**
 * Template part for displaying page content in sitemap-template.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package evolve_starter
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="sp-hero column jc-center ai-center">

		<div class="container">

			<div class="row jc-center ai-center sph-heading-row">

				<header class="sp-hero-heading">
					<?php the_title( '<h1>', '</h1>' ); ?>
				</header>

			</div>

		</div>
		
	</section>

	<section class="section">

		<div class="container">

			<div class="row">

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evolve_starter' ),
							'after'  => '</div>',
						)
					);
					?>

					<?php 
						wp_nav_menu(array(
							'menu'				=> 'sitemap-menu',
							'theme_location'	=> 'sitemap-menu',
							'menu_class'		=> 'sitemap-menu',
						)); 
					?>
				</div><!-- .entry-content -->

			</div>

		</div>

	</section>

</article><!-- #post-<?php the_ID(); ?> -->