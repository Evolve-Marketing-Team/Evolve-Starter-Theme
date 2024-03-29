<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package evolve_starter
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php 
			evolve_starter_posted_on(); 
			evolve_starter_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php
		// The default output of the_excerpt() is modified in custom function custom_trim_wp_excerpt() in template-functions.php. Review and modify if you need to adjust the ouput. 
			the_excerpt();
		?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php evolve_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
