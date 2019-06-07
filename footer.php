<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Biasa
 * @since 1.0
 * @version 1.0
 */
?>

<footer class="row">

	<div id="footer_credits" class="column">
		<?php do_action('footer_credits'); ?>
	</div><!-- #footer_credits -->

	<div id="footer_menu" class="column alignright">
		<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
			<nav class="nav footer-nav" aria-label="<?php esc_attr_e( 'Footer Menu', 'biasa' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- .footer-nav -->
		<?php endif; ?>
	</div><!-- #footer_menu -->

</footer><!-- footer -->

<?php wp_footer(); ?>

</body>
</html>
