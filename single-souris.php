<?php
/**
 * The template for displaying all souris posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Sakura
 * @since Sakura 1.0
 */

get_header();

/* Start the Loop */
if (have_posts()):
	echo 'have posts';

while (have_posts()) : the_post();
	get_template_part('template-parts/souris.php');
endwhile;

endif;
get_footer();
