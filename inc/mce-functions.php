<?php
/**
 * Add MCE Editor Styles
 */
function my_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
    $style_formats = array(  
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/
	array(
		'title' => 'Text Styling',
		'items' => array(

			array(
				'title'		=> 'Two Column List',
				'selector' 	=> 'ul',  
				'classes' 	=> 'two-column-list',
				'wrapper' 	=> false,
			),

		),
	),

	// array(
	// 	'title' => 'Buttons and Links',
	// 	'items' => array(

	// 		array(  
	// 			'title' => 'Medium Blue Button',  
	// 			'selector' => 'a',
	// 			'classes' => 'button button--medium-blue',
	// 			'wrapper' => false,
	// 			'remove' => 'empty',
	// 		),

	// 		array(
	// 			'title' 	=>	'Button Group',
	// 			'block'		=> 	'div',
	// 			'wrapper'	=>	true,
	// 			'classes'	=>	['button-group', 'jc-center', 'stacked-for-small'],
	// 			'remove'	=> 'all',
	// 		)
	// 	),
	// ),

);  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;  
   
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

/**
 *  Define and load theme colors for mce toolbar. Replace with colors loaded into Gutenberg color palette.
 * 
 */ 
function my_mce_color_options($init) {

    $custom_colours = '
        
        "ffffff", "White",
		"ebebeb", "Gray-200",
		"cacaca", "Gray-400",
		"8a8a8a", "Gray-600",
		"000000", "Black",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 4;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce_color_options');