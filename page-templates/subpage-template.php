<?php
/**
 * Template Name: Subpage Template 
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package evolve_starter
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container container--content">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'subpage' );

		endwhile; // End of the loop.
		?>

		</div><!-- container -->

	</main><!-- #main -->

<?php
get_footer();