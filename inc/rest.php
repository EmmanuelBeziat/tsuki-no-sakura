<?php

/**
 * Declare REST API Data Localizer dependency
 */

if (!class_exists('RADL')) {
	add_action('admin_notices', function () { ?>
		<div class="error"><p>REST API Data Localizer not activated. To use this theme go to <a href="<?= esc_url(admin_url('plugins.php')) ?>">plugins</a> to download and/or activate REST API Data Localizer.</p></div>
	<?php
	});
	return;
}

/**
* Initialize REST API Data Localizer
*/

new RADL('__VUE_WORDPRESS__', 'vue_wordpress.js', [
	'routing' => RADL::callback('vue_wordpress_routing'),
	'state' => [
		'categories' => RADL::endpoint('categories'),
		'media' => RADL::endpoint('media'),
		'menus' => RADL::callback('vue_wordpress_menus'),
		'pages' => RADL::endpoint('pages'),
		'posts' => RADL::endpoint('posts'),
		'tags' => RADL::endpoint('tags'),
		'users' => RADL::endpoint('users'),
		'site' => RADL::callback('vue_wordpress_site'),
	],
]);

/**
* REST API Data Localizer callbacks
*/

function vue_wordpress_routing () {
	$routing = array(
		'category_base' => get_option('category_base'),
		'page_on_front' => null,
		'page_for_posts' => null,
		'permalink_structure' => get_option('permalink_structure'),
		'show_on_front' => get_option('show_on_front'),
		'tag_base' => get_option('tag_base'),
		'url' => get_bloginfo('url')
	);

	if ($routing['show_on_front'] === 'page') {
		$front_page_id = get_option('page_on_front');
		$posts_page_id = get_option('page_for_posts');

		if ($front_page_id) {
			$front_page = get_post($front_page_id);
			$routing['page_on_front'] = $front_page->post_name;
		}

		if ($posts_page_id) {
			$posts_page = get_post($posts_page_id);
			$routing['page_for_posts'] = $posts_page->post_name;
		}
	}

	return $routing;
}

function vue_wordpress_menus () {
	$menus = [];
	// $locations is an array where ([NAME] = MENU_ID);
	$locations = get_nav_menu_locations();

	foreach (array_keys($locations) as $name) {
		$id = $locations[$name];
		$menu = [];
		$menu_items = wp_get_nav_menu_items($id);

		foreach ($menu_items as $i) {
			array_push($menu, [
				'id'      => $i->ID,
				'parent'  => $i->menu_item_parent,
				'target'  => $i->target,
				'content' => $i->title,
				'title'   => $i->attr_title,
				'url'     => $i->url,
			]);
		}

		$menus[$name] = $menu;
	}

	return $menus;
}

function vue_wordpress_site () {
	return [
		'description' => get_bloginfo('description'),
		'docTitle' => '',
		'loading' => false,
		'logo' => get_theme_mod('custom_logo'),
		'name' => get_bloginfo('name'),
		'posts_per_page' => get_option('posts_per_page'),
		'url' => get_bloginfo('url')
	];
}
