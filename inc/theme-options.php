<?php 

/**
 * Set up a WP-Admin page for managing turning on and off theme features.
 */
function evolve_starter_add_options_page() {
	add_theme_page(
		'Theme Options',
		'Theme Options',
		'manage_options',
		'evolve_starter-options',
		'evolve_starter_options_page'
	);

	// Call register settings function
	add_action( 'admin_init', 'evolve_starter_options' );
}
add_action( 'admin_menu', 'evolve_starter_add_options_page' );


/**
 * Register settings for the WP-Admin page.
 */
function evolve_starter_options() {
	register_setting( 'evolve_starter-options', 'evolve_starter-align-wide', array( 'default' => 1 ) );
	register_setting( 'evolve_starter-options', 'evolve_starter-wp-block-styles', array( 'default' => 1 ) );
	register_setting( 'evolve_starter-options', 'evolve_starter-editor-color-palette', array( 'default' => 1 ) );
	// register_setting( 'evolve_starter-options', 'evolve_starter-dark-mode' ); If adding support, remember to add tr back in with form. 
	register_setting( 'evolve_starter-options', 'evolve_starter-editor-styles' );
	register_setting( 'evolve_starter-options', 'evolve_starter-responsive-embeds', array( 'default' => 1 ) );
	register_setting( 'evolve_starter-options', 'evolve_starter-wp-block-scripts' );
}


/**
 * Build the WP-Admin settings page.
 */
function evolve_starter_options_page() { ?>
	<div class="wrap">
	<h1><?php _e('Gutenberg Theme Options', 'evolve_starter'); ?></h1>
	<form method="post" action="options.php">
		<?php settings_fields( 'evolve_starter-options' ); ?>
		<?php do_settings_sections( 'evolve_starter-options' ); ?>

			<table class="form-table">
				<tr valign="top">
					<td>
						<label>
							<input name="evolve_starter-align-wide" type="checkbox" value="1" <?php checked( '1', get_option( 'evolve_starter-align-wide' ) ); ?> />
							<?php _e( 'Enable wide and full alignments.', 'evolve_starter' ); ?>
							(<a href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment"><code>align-wide</code></a>)
						</label>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<label>
							<input name="evolve_starter-editor-color-palette" type="checkbox" value="1" <?php checked( '1', get_option( 'evolve_starter-editor-color-palette' ) ); ?> />
							<?php _e( 'Enable a custom theme color palette.', 'evolve_starter' ); ?>
							(<a href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes"><code>editor-color-palette</code></a>)
						</label>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<label>
							<input name="evolve_starter-editor-styles" type="checkbox" value="1" <?php checked( '1', get_option( 'evolve_starter-editor-styles' ) ); ?> />
							<?php _e( 'Enable editor styles.', 'evolve_starter' ); ?>
							(<a href="https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#editor-styles"><code>theme-editor-styles</code></a>)
						</label>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<label>
							<input name="evolve_starter-wp-block-styles" type="checkbox" value="1" <?php checked( '1', get_option( 'evolve_starter-wp-block-styles' ) ); ?> />
							<?php _e( 'Enable core block styles on the front end.', 'evolve_starter' ); ?>
							(<a href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles"><code>wp-block-styles</code></a>)
						</label>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<label>
							<input name="evolve_starter-responsive-embeds" type="checkbox" value="1" <?php checked( '1', get_option( 'evolve_starter-responsive-embeds' ) ); ?> />
							<?php _e( 'Enable responsive embedded content.', 'evolve_starter' ); ?>
							(<a href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content"><code>responsive-embeds</code></a>)
						</label>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<label>
							<input name="evolve_starter-wp-block-scripts" type="checkbox" value="1" <?php checked( '1', get_option( 'evolve_starter-wp-block-scripts' ) ); ?> />
							<?php _e( 'Enable block scripts for adding block styles.', 'evolve_starter' ); ?>
							(<a href="https://developer.wordpress.org/block-editor/how-to-guides/javascript/extending-the-block-editor/"><code>extend-block-editor</code></a>)
						</label>
					</td>
				</tr>
			</table>

		<?php submit_button(); ?>
	</form>
	</div>
<?php }


/**
 * Enable alignwide and alignfull support if the evolve_starter-align-wide setting is active.
 */
function evolve_starter_enable_align_wide() {

	if ( get_option( 'evolve_starter-align-wide', 1 ) == 1 ) {
		
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
	}
}
add_action( 'after_setup_theme', 'evolve_starter_enable_align_wide' );


/**
 * Enable custom theme colors if the evolve_starter-editor-color-palette setting is active.
 */
function evolve_starter_enable_editor_color_palette() {
	if ( get_option( 'evolve_starter-editor-color-palette', 1 ) == 1 ) {
		
		// Add support for a custom color scheme. Use colors from abstracts/colors.scss
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'White', 'evolve_starter' ),
				'slug'  => 'white',
				'color' => '#fefefe',
			),
			array(
				'name'  => __( 'Gray-200', 'evolve_starter' ),
				'slug'  => 'gray-200',
				'color' => '#eeeeee',
			),
			array(
				'name'  => __( 'Gray-400', 'evolve_starter' ),
				'slug'  => 'gray-400',
				'color' => '#8b8a8d',
			),
			array(
				'name'  => __( 'Gray-600', 'evolve_starter' ),
				'slug'  => 'gray-600',
				'color' => '#606060',
			),
			array(
				'name'  => __( 'Black', 'evolve_starter' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
		) );
	}
}
add_action( 'after_setup_theme', 'evolve_starter_enable_editor_color_palette' );

/**
 * Enable editor styles. 
 */
function evolve_starter_enable_editor_styles() {
	if ( get_option( 'evolve_starter-editor-styles' ) == 1 ) {
		
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		add_editor_style( '/assets/css/editor-styles.css' );
		add_editor_style('/assets/fonts/icons/styles.css');
	}
}
add_action( 'after_setup_theme', 'evolve_starter_enable_editor_styles', 0 );


/**
 * Enable dark mode if evolve_starter-dark-mode setting is active.
 */
// function evolve_starter_enable_dark_mode() {
// 	if ( get_option( 'evolve_starter-dark-mode' ) == 1 ) {
		
// 		// Add support for editor styles.
// 		add_theme_support( 'editor-styles' );
// 		add_editor_style( '/assets/css/style-editor-dark.css' );
		
// 		// Add support for dark styles.
// 		add_theme_support( 'dark-editor-style' );
// 	}
// }
// add_action( 'after_setup_theme', 'evolve_starter_enable_dark_mode' );


/**
 * Enable dark mode on the front end if evolve_starter-dark-mode setting is active.
 */
// function evolve_starter_enable_dark_mode_frontend_styles() {
// 	if ( get_option( 'evolve_starter-dark-mode' ) == 1 ) {
// 		wp_enqueue_style( 'evolve_starterdark-style', get_template_directory_uri() . '/assets/css/dark-mode.css' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'evolve_starter_enable_dark_mode_frontend_styles' );

/**
 * Enable core block styles support if the evolve_starter-wp-block-styles setting is active.
 */
function evolve_starter_enable_wp_block_styles() {

	if ( get_option( 'evolve_starter-wp-block-styles', 1 ) == 1 ) {
		
		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );
	}
}
add_action( 'after_setup_theme', 'evolve_starter_enable_wp_block_styles' );


/**
 * Enable responsive embedded content if the evolve_starter-responsive-embeds setting is active.
 */
function evolve_starter_enable_responsive_embeds() {

	if ( get_option( 'evolve_starter-responsive-embeds', 1 ) == 1 ) {
		
		// Adding support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
}
add_action( 'after_setup_theme', 'evolve_starter_enable_responsive_embeds' );

/**
 * Enable responsive embedded content if the evolve_starter-responsive-embeds setting is active.
 */
function evolve_starter_enable_wp_block_scripts() {

	if ( get_option( 'evolve_starter-wp-block-scripts' ) == 1 ) {
		
		wp_enqueue_script(
			'gutenberg-starter-editor', 
			get_stylesheet_directory_uri() . '/assets/js/editor.js', 
			array( 'wp-blocks', 'wp-dom' ), 
			filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ),
			true
		);
	}
}
add_action( 'enqueue_block_editor_assets', 'evolve_starter_enable_wp_block_scripts' );