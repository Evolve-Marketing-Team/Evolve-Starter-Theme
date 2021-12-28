<?php 
/**
 * Simple CTA block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param  ( int|string ) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'simple-cta-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'simple-cta section-small';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$bg = get_field('background');
$cta_heading = get_field('scta_heading');
$cta_content = get_field('scta_content');
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

	<div class="cta-content-container">

		<div class="row align-center-middle">
			<?php if($cta_content) : 
			$color = $cta_content['content_color'];
			$content = $cta_content['content'];
			$button = $cta_content['button'];
			?>

			<div class="cta-content" style="color: <?php echo $color; ?>;">
				<?php echo $content; ?>
			</div>

			<?php if($button) : 
			$url = $button['url'];
			$title = $button['title'];
			$target = $button['target'] ? $button['target'] : '_self'; 
			?>
			<div class="cta-btn">
			
				<a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn btn--black"><?php echo esc_html($title); ?></a>
			
			</div>
			<?php endif; ?>

			
			<?php endif; ?>

		</div>

	</div>

	<?php if ($bg) : 
	$color = $bg['background_color'];
	$enable_bg = $bg['enable_background_image'];
	$bg_image = $bg['background_image'];
	$bg_x = $bg['horizontal_x_position'];
	$bg_y = $bg['vertical_y_position'];
	?>
	<style type="text/css">
	
		#<?php echo $id; ?> {
			background-color: <?php echo $color; ?>;
		<?php if($enable_bg == "1") : ?>
		background-image: url('<?php echo $bg_image; ?>');
			background-position-x: <?php echo $bg_x; ?>;
			background-position-y: <?php echo $bg_y; ?>;
		<?php endif; ?>
		}
	
	</style>
	<?php endif; ?>
	
</section>