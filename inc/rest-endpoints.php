<?php

function markers_endpoint ($request_data) {
	$args = [
		'post_type' => 'post',
		'posts_per_page'=> -1,
		'numberposts'=> -1
	];

	$posts = get_posts($args);
	foreach ($posts as $key => $post) {
		$posts[$key]->acf = get_fields($post->ID);
	}
	return $posts;
}

add_action('rest_api_init', function () {
	register_rest_route('markers/v1', '/post/', [
		'methods' => 'GET',
		'callback' => 'markers_endpoint'
	]);
});
