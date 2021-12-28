<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package evolve_starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="sp-hero sp-hero--default column jc-center ai-center alignfull">

		<div class="container">

			<div class="row jc-center ai-center sph-heading-row">

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

			</div>

		</div>

	</section>

	
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evolve_starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
