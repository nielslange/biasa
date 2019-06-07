<?php
/**
 * The template for displaying the header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Biasa
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="row">

	<div id="header_title" class="column">
		<?php printf( '<h2><a href="/" title="%1$s">%1$s</a></h2>', get_bloginfo() ); ?>
	</div><!-- #header_title -->

	<div id="header_menu" class="column alignright">
		<?php if ( has_nav_menu( 'header_menu' ) ) : ?>
			<nav class="nav header-nav" aria-label="<?php esc_attr_e( 'Footer Menu', 'biasa' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header_menu',
						'menu_class'     => 'header-menu',
						'depth'          => -1,
					)
				);
				?>
			</nav><!-- .header-nav -->
		<?php endif; ?>
	</div><!-- #header_menu -->

</header><!-- header -->
