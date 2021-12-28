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
$id = 'media-content' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-content';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$mc_media_align = get_field('media_content_alignment');
$mc_image = get_field('image');
$mc_heading = get_field('heading');
$mc_media_type = get_field('media_type');
$mc_img = get_field('image');
$mc_video_embed = get_field('video');
$mc_content = get_field('content');
$mc_button = get_field('button');
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">


    <div class="media-content__media <?php if($mc_media_align == 'media-left') { echo 'small-order-1 large-order-1'; } else { echo 'small-order-1 large-order-2'; }; ?>">

        <?php if($mc_media_type == 'image') : ?>
            <?php echo wp_get_attachment_image( $mc_img, 'full', '', array('class' => 'media-content__img')); ?>
            <?php endif; ?>

            <?php if($mc_media_type == 'video') : ?>
            <div class="responsive-embed widescreen">
                <?php echo $mc_video_embed; ?>
            </div>
            <?php endif; ?>

    </div>

    <div class="media-content__content <?php if($mc_media_align == 'media-left') { echo 'small-order-2 large-order-2'; } else { echo 'small-order-2 large-order-1'; }; ?>">

        <div class="media-content__container">

            <h2><?php echo $mc_heading; ?></h2>

            <?php echo $mc_content; ?>

            <?php if ($mc_button) :
                $url = $mc_button['url'];
                $title = $mc_button['title'];
                $target = $mc_button['target'] ? $mc_button['target'] : '_self';
            ?>

            <div class="media-content__button">

                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn"><?php echo esc_html($title); ?></a>

            </div>

            <?php endif; ?>

        </div>

    </div>

</section>