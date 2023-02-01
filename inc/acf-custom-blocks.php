<?php
/**
 * Register custom ACF block types here. Add Custom Functions
 *
 * Follow the resource links below setting up the Block types. 
 * @link https://www.advancedcustomfields.com/resources/blocks/
 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
 * 
 *
 * @package evolve_starter
 */

// Add custom category for blocks. 
function evolve_starter_block_category( $categories, $post ) {
	$evolve_starter_custom_block = array(
		'slug' => 'evolve_starter-blocks',
		'title' => __( 'evolve_starter Blocks', 'evolve_starter-blocks' ),
	);

		$categories_sorted = array();
		$categories_sorted[0] = $evolve_starter_custom_block;

		foreach ($categories as $category) {
			$categories_sorted[] = $category;
		}

		return $categories_sorted;
}
add_filter( 'block_categories_all', 'evolve_starter_block_category', 10, 2);

// Initialize evolve_starter Blocks
add_action('acf/init', 'evolve_starter_acf_blocks');
function evolve_starter_acf_blocks() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

		// Register Latest Posts
        acf_register_block_type(array(
            'name'              => 'latest-posts',
            'title'             => __('Latest Posts'),
            'description'       => __('A section displaying the most 3 recent posts.'),
			'mode'				=> 'edit',
            'render_template'   => 'template-parts/blocks/latest-posts/latest-posts.php',
			'category'          => 'evolve_starter-blocks',
			'icon' 				=> 'admin-post',
			'align'				=> 'full',
			'enqueue_assets' => function(){
				wp_enqueue_style( 'latest-posts', get_template_directory_uri() . '/template-parts/blocks/latest-posts/latest-posts.min.css', array(), _S_VERSION );
			},
        ));

		// Video Gallery
        acf_register_block_type(array(
            'name'              => 'video-gallery',
            'title'             => __('Video Gallery'),
            'description'       => __('A video gallery where you can insert YouTube video links. '),
			'mode'				=> 'edit',
            'render_template'   => 'template-parts/blocks/video-gallery/video-gallery.php',
			'category'          => 'evolve_starter-blocks',
			'icon' 				=> 'format-video',
			'align'				=> 'full',
			'enqueue_assets' => function(){
				wp_enqueue_style( 'video-gallery', get_template_directory_uri() . '/template-parts/blocks/video-gallery/video-gallery.min.css', array(), _S_VERSION );
			},
        ));

		// Register Team Cards
        acf_register_block_type(array(
            'name'              => 'team-cards',
            'title'             => __('Team Cards'),
            'description'       => __('A section with card layout for team members.'),
			'mode'				=> 'edit',
            'render_template'   => 'template-parts/blocks/team-cards/team-cards.php',
			'category'          => 'evolve_starter-blocks',
			'icon' 				=> 'id',
			'align'				=> 'full',
			'enqueue_assets' => function(){
				wp_enqueue_style( 'team-cards', get_template_directory_uri() . '/template-parts/blocks/team-cards/team-cards.min.css', array(), _S_VERSION );
			},
        ));

		// Register SP Hero
        acf_register_block_type(array(
            'name'              => 'sp-hero',
            'title'             => __('Supage Hero'),
            'description'       => __('Subpage hero with simple and image option.'),
			'mode'				=> 'preview',
            'render_template'   => 'template-parts/blocks/sp-hero/sp-hero.php',
			'category'          => 'evolve_starter-blocks',
			'icon' 				=> 'align-pull-right',
			'align'				=> 'full',
			'supports'			=> array(
				'anchor' 		=> true,
				'align' 		=> array( 'full'),
			),
			'enqueue_assets' => function(){
				wp_enqueue_style( 'sp-hero', get_template_directory_uri() . '/template-parts/blocks/sp-hero/sp-hero.min.css', array(), _S_VERSION );
			},
        ));

		 // Register Accordions
        acf_register_block_type(array(
            'name'              => 'accordions',
            'title'             => __('Accordions'),
            'description'       => __('Accordions'),
			'mode'				=> 'edit',
            'render_template'   => 'template-parts/blocks/accordions/accordions.php',
			'category'          => 'evolve_starter-blocks',
			'icon' 				=> 'list-view',
			'supports'			=> array(
				'anchor' 	=> true,
				'className' => true,
			),
			'enqueue_assets' => function(){
				wp_enqueue_style( 'accordions', get_template_directory_uri() . '/template-parts/blocks/accordions/accordions.min.css', array(), _S_VERSION );
			},
        ));

		// Register Simple CTA
        acf_register_block_type(array(
            'name'              => 'simple-cta',
            'title'             => __('Simple CTA'),
            'description'       => __('A simple CTA with column text and button.'),
			'mode'				=> 'edit',
            'render_template'   => 'template-parts/blocks/simple-cta/simple-cta.php',
			'category'          => 'evolve_starter-blocks',
			'icon' 				=> 'megaphone',
			'align'				=> 'full',
			'enqueue_assets' => function(){
				wp_enqueue_style( 'simple-cta', get_template_directory_uri() . '/template-parts/blocks/simple-cta/simple-cta.min.css', array(), _S_VERSION );
			},
        ));

		// Media & Content
		acf_register_block_type(array(
            'name'              => 'media-content',
            'title'             => __('Media & Content'),
            'description'       => __('Have your media and content side by side.'),
			'mode'				=> 'edit',
            'render_template'   => 'template-parts/blocks/media-content/media-content.php',
			'category'          => 'evolve_starter-blocks',
			'icon' 				=> 'columns',
			'align'				=> 'full',
			'enqueue_assets' => function(){
				wp_enqueue_style( 'media-content', get_template_directory_uri() . '/template-parts/blocks/media-content/media-content.min.css', array(), _S_VERSION );
			},
        ));
	}
}