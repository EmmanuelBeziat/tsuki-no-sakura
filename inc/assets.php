<?php

function sakura_register_styles() {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('sakura-style', get_template_directory_uri() . '/dist/main.min.css', [], $theme_version);
}

add_action('wp_enqueue_scripts', 'sakura_register_styles');

/**
* Register and Enqueue Scripts.
*/
function sakura_register_scripts() {
	$theme_version = wp_get_theme()->get('Version');

	if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('sakura-js', get_template_directory_uri() . '/dist/main.min.js', [], $theme_version, false);
	wp_script_add_data('sakura-js', 'defer', true);
	wp_script_add_data('sakura-js', 'type', 'module');
}

add_action('wp_enqueue_scripts', 'sakura_register_scripts');
