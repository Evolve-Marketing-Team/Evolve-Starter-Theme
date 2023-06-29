<?php 
/**
 * Accordions Render Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param  ( int|string ) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-section' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion-section';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

if( $is_preview ) {
$className .= ' is-admin';
}
?>


<div class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

	<?php if( have_rows( 'accordions' ) ) : ?>

	<div class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-slide-speed="500">
		
		<?php while( have_rows ( 'accordions') ) : the_row(); 
			$title = get_sub_field('title');
			$content  = get_sub_field('content');
		?>
		<div class="accordion__item" data-accordion-item>

			<a href="#" class="accordion__title"><?php echo esc_html($title); ?></a>

			<div class="accordion__content" data-tab-content>
				<?php echo $content; ?>
			</div>

		</div>

		<?php endwhile; ?>

	</div>
	<?php endif; ?>

	</div>

</div>