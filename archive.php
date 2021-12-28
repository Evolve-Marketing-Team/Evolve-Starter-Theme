<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package evolve_starter
 */

get_header(); ?>

	<main id="primary" class="site-main">

	<?php
	if ( have_posts() ) : ?>

		<section class="sp-hero sp-hero--default column jc-center ai-center alignfull">

			<div class="container">

				<div class="row jc-center ai-center sph-heading-row">

					<?php the_archive_title( '<h1>', '</h1>' ); ?>

				</div>

			</div>

		</section>

		<section class="section post-section">

			<div class="container">

				<div class="row row--post">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</div><!-- .row -->

		</div><!-- .container -->

	</section><!-- .section -->

	</main><!-- #primary -->

<?php
get_footer();
