<?php
/**
 * The template for displaying a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Biasa
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		print('<article>');
		the_title('<h1>', '</h1>');
		the_content();
		print('</article>');
	}
}

?>

<?php get_footer(); ?>
