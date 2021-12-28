<?php
/**
 * Template part for displaying single posts.
 * 
 * if(has_post_thumbnail()){
 *						
 *	the_post_thumbnail('medium',  array('class' => 'single-post-image alignright')); }
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package evolve_starter
 */

$cat = get_the_category();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-content-single'); ?>>

	<section class="sp-hero post-page-hero column jc-center ai-center">

		<div class="container">

			<div class="row jc-center ai-center sph-heading-row">

				<header class="sp-hero-heading text-center">

					<div class="single-post-cat"><?php echo $cat[0]->name; ?></div>

					<?php the_title( '<h1 class="single-post-title">', '</h1>' ); ?>

					<?php
					evolve_starter_posted_on_date();
					?>

				</header><!-- .entry-header -->

			</div>

		</div>

	</section>

	<section class="single-content section">

		<div class="container container--content">

			<div class="row jc-center">

				<div class="content-cell">

					<figure class="featured-post-thumbnail">
						<?php the_post_thumbnail('post_featured_image',  array('class' => 'single-post-image')); ?> 
					</figure>

					<div class="entry-content">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'evolve_starter' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
						?>
					</div>
				</div>

			</div>

		</div>

	</section>

</article><!-- #post-<?php the_ID(); ?> -->
