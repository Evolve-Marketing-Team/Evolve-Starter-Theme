<?php 
/**
 * Teamn cards Block Render Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param  ( int|string ) $post_id The post ID this block is saved to.
 */
	// Create id attribute allowing for custom "anchor" value.
	$id = 'bio-cards-' . $block['id'];
	if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'section column ai-center';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	if( $is_preview ) {
    $className .= ' is-admin';
}
$bcs_bg_color = get_field('bcs_bg_color');
$bcs_enable_headings = get_field('bcs_enable_headings');
$bcs_heading = get_field('bcs_heading');
$bcs_subheading = get_field('bcs_subheading');
$bcs_enable_button = get_field('bcs_enable_button');
$bcs_button = get_field('bcs_button');

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>" style="background-color: <?php echo $bcs_bg_color; ?>;">

	<div class="container">

		<?php if($bcs_enable_headings == "1") : ?>
	
		<div class="row row--section-intro">

			<?php if($bcs_heading) : ?>
			<h2 class="section-heading"><?php echo $bcs_heading; ?></h2>
			<?php endif; ?>

			<?php if($bcs_subheading) : ?>
			<div class="section-subheading"><?php echo $bcs_subheading; ?></div>
			<?php endif; ?>

		</div>
		<?php endif; //end $bcs_enable_headings?>

		<?php if( have_rows( 'team_bio_cards' ) ) : ?>
		<div class="row">

			<?php while( have_rows( 'team_bio_cards' ) ) : the_row(); 
			$image = get_sub_field('image'); 
			$name = get_sub_field('name');
			$title = get_sub_field('title');
			$content = get_sub_field('content');
			$link_title = get_sub_field('link_title');
			$enable_email = get_sub_field('enable_email');
			$email = get_sub_field('email');
			$email_title = get_sub_field('email_title');
			$tbc_id = wp_unique_id( 'tbc-modal-' );
			?>

			<div class="tb-card-cell">
			
				<div class="tb-card">
					<?php echo wp_get_attachment_image($image, 'full'); ?>
				
					<div class="tb-card-section">
					
						<h3 class="tb-card-name"><?php echo $name; ?></h3>

						<?php if($title) : ?>
						<div class="tb-card-title"><?php echo $title; ?></div>
						<?php endif; ?>

						<div class="btn-container">

							<a class="tb-card-link" data-open="<?php echo $tbc_id; ?>"><?php echo $link_title; ?></a>

						</div>
					
					</div>

					<div class="large reveal team-bio-reveal" id="<?php echo $tbc_id; ?>" data-reveal data-animation-in="hinge-in-from-middle-x" data-animation-out="hinge-out-from-middle-x">
						<div class="row tb-row">

							<div class="tb-image">
								<?php if($image) {
									echo wp_get_attachment_image($image, 'full');
								} ?>
							</div>

							<div class="tb-info">

								<h3 class="tb-card-name"><?php echo $name; ?></h3>

								<?php if($title) : ?>
								<div class="tb-card-title"><?php echo $title; ?></div>
								<?php endif; ?>

								<?php echo $content; ?>

								<?php if($enable_email == "1") : ?>
								<div class="btn-container">

									<?php if($email) : ?>
									<a class="btn" href="mailto:<?php echo $email; ?>" class="tb-card-link"><?php echo esc_html($email_title); ?></a>
									<?php endif; //end $email?>

								</div>
								<?php endif; //end $enable_email?>
							</div>

						</div>

						<button class="close-button" data-close aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>
				
				</div>
			
			</div>
			<?php endwhile; //endwhile team_bio_cards?>

		</div>
		<?php endif; //endif team_bio_cards?>
	
	</div>

</section>