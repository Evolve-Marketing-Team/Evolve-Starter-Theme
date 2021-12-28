<?php 
/**
 * Mobile Navigation: Use this in special use-cases where mobile and desktop navigation are different
 */
function evolve_starter_mobile_nav() {
	wp_nav_menu(array(
		'container'			=> '',						// Remove nav container
		'menu_id'			=> 'primary-mobile-menu',					// Adding custom nav id
		'menu_class'		=> 'vertical menu accordion-menu mobile-menu',	// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="false">%3$s</ul>',
		'theme_location'	=> 'primary-menu',					// Where it's located in the theme
		'depth'				=> 5,							// Limit the depth of the nav
		'fallback_cb'		=> false,						// Fallback function (see below)
		'walker'			=> new evolve_starter_Mobile_Menu()
	));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class evolve_starter_Mobile_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu vertical nested\">\n";
	}
}

/**
 * Default Dropdown Nav. 
 */
function evolve_starter_desktop_nav() {
	wp_nav_menu(array(
		'container'			=> '',
		'menu_id'			=> 'primary-desktop-menu',
		'menu_class'		=> 'primary-menu vertical menu',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion xlarge-dropdown" data-parent-link="true">%3$s</ul>',
		'theme_location'	=> 'primary-menu',
		// 'depth'				=> 5,
		'fallback_cb'		=> false,
		'walker'			=> new evolve_starter_Desktop_Menu()
	));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class evolve_starter_Desktop_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"submenu\">\n";
	}
}

/**
 * Split Menu with menu on left and right of centered logo
 */

// Dropdown Split Menu Left
function evolve_starter_dropdown_menu_left() {
	wp_nav_menu(array(
		'container'			=> '',
		'menu_id'			=> 'desktop-nav-right',
		'menu_class'		=> 'desktop-dropdown-menu menu',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'theme_location'	=> 'desktop-left-menu',
		'fallback_cb'		=> false,
		'walker'			=> new evolve_starter_Dropdown_Menu()
	));
}

// Dropdown Split Menu Right
function evolve_starter_dropdown_menu_right() {
	wp_nav_menu(array(
		'container'			=> '',
		'menu_id'			=> 'desktop-nav-right',
		'menu_class'		=> 'desktop-dropdown-menu menu',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'theme_location'	=> 'desktop-right-menu',
		'fallback_cb'		=> false,
		'walker'			=> new evolve_starter_Dropdown_Menu()
	));
}

/** 
 * Legacy Dropdown Menu with Toggle
 */

class evolve_starter_Dropdown_Menu extends Walker_Nav_Menu {
	 //save current item so it can be used in start level
    private $curItem;

	function start_lvl(&$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$class = 'dropdown-toggle-';
		$display_depth = ( $depth + 1);
		$thisItem = $this->curItem;

		$output .= "\n$indent<ul class=\"dropdown-submenu dropdown-pane depth_$depth\" id=" . $class . $thisItem->ID . " data-dropdown data-close-on-click=\"true\" data-position=\"bottom\" data-alignment=\"left\" data-hover-delay=\"50\" data-hover=\"false\" data-force-follow=\"false\" data-v-offset=\"40\">\n";

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span
		
		$indent = ( $depth ) ? str_repeat("\t",$depth) : '';
		
		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$class_toggle = 'dropdown-toggle-';
		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$this->curItem = $item;
		$classes[] = 'menu-item-' . $item->ID;
		if( $depth && $args->walker->has_children ){
			$classes[] = 'dropdown-submenu';
		}
		
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		if ( $depth == 0 && in_array('menu-item-has-children', $item->classes) ) {

            $output .= '<li' . $class_names . ' data-toggle=' . $class_toggle .$item->ID . '>';
        }

        else {
            $output .= $indent . '<li' . $id . $class_names . '>';
		}
		
		// $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
		
		// $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle=' . $class_toggle . $item->ID : '';
		
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '</a>' : '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );	
	}
}

/** 
 * Split Mega Menu
*/
function evolve_starter_mega_menu_left() {
	wp_nav_menu(array(
		'container'			=> '',
		'menu_id'			=> 'desktop-nav-left',
		'menu_class'		=> 'desktop-mega-menu',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'theme_location'	=> 'desktop-left-menu',
		'fallback_cb'		=> false,
		'walker'			=> new evolve_starter_Mega_Menu()
	));
}

function evolve_starter_mega_menu_right() {
	wp_nav_menu(array(
		'container'			=> '',
		'menu_id'			=> 'desktop-nav-right',
		'menu_class'		=> 'desktop-mega-menu',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'theme_location'	=> 'desktop-right-menu',
		'fallback_cb'		=> false,
		'walker'			=> new evolve_starter_Mega_Menu()
	));
}

class evolve_starter_Mega_Menu extends Walker_Nav_Menu {
	 //save current item so it can be used in start level
    private $curItem;

	function start_lvl(&$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$class = 'mega-dropdown-toggle-';
		$display_depth = ( $depth + 1);
		$thisItem = $this->curItem;

		if ($depth == 0) {
            $output .= "\n$indent<div class=\"mega-dropdown-container dropdown-pane depth_$depth\" id=" . $class . $thisItem->ID . " data-dropdown data-close-on-click=\"true\" data-position=\"null\" data-alignment=\"null\"><div class=\"mega-dropdown\"><ul class=\"mega-submenu\" >\n";
        } 
		
		else {
            $output .= "\n$indent<ul class='megamenu-column'>\n";
        }
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "$indent</ul></div></div>\n";
        } 
		
		else {
            $output .= "$indent</ul>\n";
        }
    }

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span
		
		$indent = ( $depth ) ? str_repeat("\t",$depth) : '';
		
		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$class_toggle = 'mega-dropdown-toggle-';
		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$this->curItem = $item;
		$classes[] = 'menu-item-' . $item->ID;
		if( $depth && $args->walker->has_children ){
			$classes[] = 'dropdown-submenu';
		}
		
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		if ( $depth == 0 && in_array('menu-item-has-children', $item->classes) ) {

            $output .= '<li' . $class_names . ' data-toggle=' . $class_toggle . $item->ID . '>';
        }

        else {
            $output .= $indent . '<li' . $id . $class_names . '>';
		}
		
		// $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
		
		// $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle=' . $class_toggle . $item->ID : '';
		
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? '</a>' : '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
	}

}