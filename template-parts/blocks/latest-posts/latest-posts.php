<?php 
/**
 * Latest Posts Cards Block Render Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param  ( int|string ) $post_id The post ID this block is saved to.
 */
	// Create id attribute allowing for custom "anchor" value.
	$id = 'latest-posts-' . $block['id'];
	if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'section latest-posts-section alignfull';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	if( $is_preview ) {
    $className .= ' is-admin';
}



$lp_bg_color = get_field('latest_posts_background_color');
$lp_heading = get_field('latest_posts_heading');
$lp_btn = get_field('latest_posts_button');
?>


<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>" style="background-color: <?php echo $lp_bg_color; ?>">

	<div class="container container">

		<div class="row row--section-intro">

			<h2 class="section-heading"><?php echo $lp_heading; ?></h2>
			
		</div>

		<?php
		$lp_args = array(
			'post_type'	=> 'post',
			'posts_per_page' => 3,
		);

		$lpc_q = new WP_Query($lp_args);
		if( $lpc_q->have_posts() ) : ?>

		<div class="row row--content jc-center row--lp-card">

			<?php while( $lpc_q->have_posts() ) : $lpc_q->the_post();
			$lpc_cat = get_the_category();
			?>

			<div class="lp-card-cell">

				<div class="lp-card">

					<a href="<?php echo esc_url( get_permalink() ); ?>" class="lp-card-image-link"> 
						<?php echo get_the_post_thumbnail(); ?>
					</a>

					<div class="lp-card-section">

						<a href="<?php echo esc_url( get_category_link( $lpc_cat[0]->term_id ) ); ?>" class="lp-card-section__cat"><?php echo $lpc_cat[0]->name; ?></a>

						<a href="<?php echo esc_url( get_permalink() ); ?>"class="lp-card-section__title-container">

							<h3 class="lp-card-section__title"><?php echo esc_html( the_title() ); ?></h3>

							<i class="icon-arrow-alt-circled-right lp-card-section__icon"></i>

						</a>

					</div>
					
				</div>

			</div>
			<?php endwhile; ?>

		</div>
		<?php endif; ?>


		<?php if($lp_btn) : 
			$lp_btn_url = $lp_btn['url'];
			$lp_btn_title = $lp_btn['title'];
			$lp_btn_target = $lp_btn['target'] ? $lp_btn['target'] : '_self';
		?>
		<div class="btn-container row jc-center">
			
			<a href="<?php echo esc_url($lp_btn_url); ?>" class="btn" target="<?php echo esc_attr($lp_btn_target); ?>"><?php echo esc_html($lp_btn_title); ?></a>

		</div>
		<?php endif; ?>

	</div><!-- end container -->

</section>