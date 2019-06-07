<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Biasa
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		// @todo Add 'template-parts/header/entry/header'
		// get_template_part( 'template-parts/header/entry', 'header' );
		?>
	</header>

	<article class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'biasa' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'biasa' ),
				'after'  => '</div>',
			)
		);
		?>
	</article><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		// @todo Implement biasa_entry_footer()
		// biasa_entry_footer();
		?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php
		// @todo Add 'template-parts/post/author/bio'
		// get_template_part( 'template-parts/post/author', 'bio' );
		?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
