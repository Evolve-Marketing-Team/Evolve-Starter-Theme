<?php 
/**
 * Video Gallery Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param  ( int|string ) $post_id The post ID this block is saved to.
 */
	// Create id attribute allowing for custom "anchor" value.
	$id = 'video-gallery-' . $block['id'];
	if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'video-gallery';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}

	$vg_bg_color = get_field('video_gallery_background_color');
	$vg_heading = get_field('video_gallery_heading');
	$vg_subheading = get_field('video_gallery_subheading');

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>" style="background-color: <?php echo $vg_bg_color; ?>">

	<div class="container">
		<div class="row jc-center">
			<div class="content-cell video-gallery__content-wrapper">
				<h2 class="section-heading"><?php echo $vg_heading; ?></h2>
				<?php if($vg_subheading) : ?>
				<div class="video-gallery__subheading">
					<?php echo $vg_subheading; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if( have_rows('video_gallery') ) : ?>
		<div class="row">
			<?php while( have_rows('video_gallery') ) : the_row(); 
			$video_embed = get_sub_field('video');
			// Use preg_match to find iframe src
			preg_match('/src="(.+?)"/', $video_embed, $matches);
			$embed_src = $matches[1];
			$video_title  = get_sub_field('video_title');
			$opt_video_embed = '<iframe id="youtube_video" src="" data-src="'. $embed_src .'" frameborder="0" allowfullscreen></iframe>';
			?>
			<div class="video-gallery__video">
				<div class="responsive-embed widescreen">
					<?php echo $opt_video_embed; ?>
				</div>
				<?php if($video_title) : ?>
				<span class="video-gallery__video-title"><?php echo $video_title; ?></span>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>