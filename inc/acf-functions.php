<?php /**
 * Get the colors formatted for use with Iris, Automattic's color picker. This loads colors from Editor Color Palette you defined into ACF color picker.
 */
function output_the_colors() {
	
	// get the colors
    $color_palette = current( (array) get_theme_support( 'editor-color-palette' ) );

	// bail if there aren't any colors found
	if ( !$color_palette )
		return;

	// output begins
	ob_start();

	// output the names in a string
	echo '[';
		foreach ( $color_palette as $color ) {
			echo "'" . $color['color'] . "', ";
		}
	echo ']';
    
    return ob_get_clean();

}

/**
 * Add the colors into Iris
 */
add_action( 'acf/input/admin_footer', 'gutenberg_sections_register_acf_color_palette' );
function gutenberg_sections_register_acf_color_palette() {

    $color_palette = output_the_colors();
    if ( !$color_palette )
        return;
    
    ?>
    <script type="text/javascript">
        (function( $ ) {
            acf.add_filter( 'color_picker_args', function( args, $field ){

                // add the hexadecimal codes here for the colors you want to appear as swatches
                args.palettes = <?php echo $color_palette; ?>

                // return colors
                return args;

            });
        })(jQuery);
    </script>
    <?php
}


/**
 * ACF Options Page: Uncomment Below to activate
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'icon_url' 		=> 'dashicons-editor-kitchensink',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title'	=> 'Header Message Bar',
		'menu_title'	=> 'Header Message Bar',
		'parent_slug'	=> 'theme-options',
		
	));
	
	acf_add_options_sub_page(array(
        'page_title'    => 'Social Icons',
        'menu_title'    => 'Social Icons',
        'parent_slug'   => 'theme-options',
	));

    // acf_add_options_sub_page(array(
	// 	'page_title'	=> 'Footer Content',
	// 	'menu_title'	=> 'Footer Content',
	// 	'parent_slug'	=> 'theme-options',
	// ));

	// acf_add_options_page(array(
	// 	'page_title' 	=> 'Global CTAs',
	// 	'menu_title'	=> 'Global CTAs',
	// 	'menu_slug' 	=> 'global-ctas',
	// 	'capability'	=> 'edit_posts',
	// 	'icon_url' 		=> 'dashicons-megaphone',
	// 	'redirect'		=> true
	// ));
}