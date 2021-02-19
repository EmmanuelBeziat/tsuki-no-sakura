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

$args = [
	'post_type' => 'souris',
	'posts_per_page' => -1
];

$loop = new WP_Query($args);

/* Start the Loop */
while ($loop->have_posts()) : $loop->the_post();
	debug($loop->the_post(););
	get_template_part('template-parts/souris.php');
endwhile;

get_footer();
