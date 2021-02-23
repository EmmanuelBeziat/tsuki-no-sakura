<?php

function sakura_register_styles() {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendors/swiper/swiper.min.css', [], $theme_version);
	wp_enqueue_style('sakura-style', get_template_directory_uri() . '/assets/css/main.min.css', [], $theme_version);
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

	// wp_enqueue_script('sakura-js', get_template_directory_uri() . '/assets/css/main.min.js', [], $theme_version, true);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendors/swiper/swiper.min.js', [], $theme_version, true);
	// wp_script_add_data('swiper', 'defer', true);
	wp_script_add_data('swiper', 'type', 'module');

	wp_enqueue_script('sakura-js', get_template_directory_uri() . '/assets/js/main.min.js', [], $theme_version, true);
	// wp_script_add_data('sakura-js', 'defer', true);
	wp_script_add_data('sakura-js', 'type', 'module');
}

add_action('wp_enqueue_scripts', 'sakura_register_scripts');

function change_default_jquery( &$scripts){
	if (!is_admin()){
		$scripts->remove('jquery');
		// $scripts->add('jquery', false, array('jquery-core'), '1.10.2');
	}
}
add_filter('wp_default_scripts', 'change_default_jquery');
