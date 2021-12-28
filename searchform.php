<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package evolve_starter
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$evolve_starter_unique_id = wp_unique_id( 'search-form-' );

$evolve_starter_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<form role="search" <?php echo $evolve_starter_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $evolve_starter_unique_id ); ?>"><?php _e( 'Search our site', 'evolve_starter' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
		<input type="search" id="<?php echo esc_attr( $evolve_starter_unique_id ); ?>" placeholder="<?php echo esc_attr_x( 'Search our site', 'placeholder', 'evolve_starter' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<!-- <div class="input-group-button"> -->
			<input type="submit" class="btn btn--search" value="<?php echo esc_attr_x( 'Search', 'submit button', 'evolve_starter' ); ?>" />
		<!-- </div> -->
</form>