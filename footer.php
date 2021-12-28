<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evolve_starter
 */

?>

<footer id="colophon" class="site-footer">

	<div class="row">

		<div class="footer-branding">

			<?php the_custom_logo(); ?>

		</div>

		<div class="footer-navigation">

			<?php 
				wp_nav_menu(array(
					'menu' 				=> 	'footer-menu',
					'menu_class'		=>	'footer-menu',
					'container'			=> 	'nav',
					'container_class'	=> 	'main-footer-navigation',	
					'depth'				=> 	1,
				));
			?>

		</div>

		<ul class="footer-site-info">

			<li><a href="<?php echo home_url('/privacy-policy'); ?>">Privacy Policy</a></li>

			<li><a href="<?php echo home_url('/terms-conditions'); ?>">Terms &amp; Conditions</a></li>


			<li><a href="<?php echo home_url('/site-map'); ?>">Site Map</a></li>

			<li><a href="https://www.evolvemarketingteam.com" target="_blank" rel="noopener">An Evolve Marketing Team Web Solution</a></li>

			<li>&copy; <?php echo date("Y"); ?> Company Name </li>

		</ul>

	</div>
	
	
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
