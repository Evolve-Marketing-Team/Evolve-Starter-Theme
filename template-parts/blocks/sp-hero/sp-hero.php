<?php 
/**
 * HP Hero Render Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param  ( int|string ) $post_id The post ID this block is saved to.
 */
	// Create id attribute allowing for custom "anchor" value.
	$id = 'sp-hero-' . $block['id'];
	if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'sp-hero';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}

	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}

	if( $is_preview ) {
    $className .= ' is-admin';
}

$hero_type = get_field('hero_type');
$color_setup = get_field('color_setup');
$heading = get_field('heading') ?: 'Your heading goes here';
$subheading = get_field('subheading');
$image = get_field('image');
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

	<?php if ($hero_type == "image") : ?>

	<div class="sp-hero-image-row" data-equalizer data-equalize-on="large">

		<div class="sp-hero__content small-order-2 large-order-1" data-equalizer-watch>	
	
			<h1 class="sp-hero__heading"><?php echo $heading; ?> </h1>

			<?php if ( $subheading ) : ?>
			<div class="sp-hero__subheading"><?php echo $subheading; ?></div>
			<?php endif; ?>
			
		</div>

		<div class="sp-hero__image small-order-1 large-order-2" data-equalizer-watch>
			
			<?php if ( $image ) {
				echo wp_get_attachment_image($image, 'full');
			} ?>
		
		</div>

	</div>

	<?php endif; ?>

	<?php if ( $hero_type == "simple" ) : ?>

	<div class="container">
	
		<div class="sp-hero-simple-row">

			<div class="sp-hero__content">

				<h1 class="sp-hero__heading"><?php echo $heading; ?> </h1>

				<?php if ( $subheading ) : ?>
				<div class="sp-hero__subheading"><?php echo $subheading; ?></div>
				<?php endif; ?>

			</div>
			
		</div>

	</div>

	<?php endif; ?>

	<?php if ( $color_setup ) : 
	$bg_color = $color_setup['background_color'];
	$text_color = $color_setup['text_color'];
	?>
	<style type="text/css">
		#<?php echo $id; ?> {
			background-color: <?php echo $bg_color; ?>;
			color: <?php echo $text_color; ?>;
		}

	</style>
	<?php endif; ?>

</section>