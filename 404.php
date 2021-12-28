<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package evolve_starter
 */

get_header(); ?>
	
	<main id="primary" class="site-main">

		<div class="container container--subpage">

			<section class="error-404 not-found section">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'scp' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>It looks like nothing was found at this location. You can return to the <a href="<?php echo home_url(); ?>">homepage</a>, try one of the links below, or a search.</p>
						<?php

						the_widget( 'WP_Widget_Recent_Posts' );
						?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div>

	</main><!-- #primary -->

<?php
get_footer();
