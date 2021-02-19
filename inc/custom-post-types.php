<?php
/**
 * Custom Post Types declarations
 */

function sakura_create_post_types () {
	register_post_type('souris', [
		'labels' => [
			'name' => 'Souris',
			'singular_name' => 'Souris',
			'all_items' => 'Toutes les souris',
			'add_new_items' => 'Ajouter une souris',
			'edit_item' => 'Modifier la souris',
			'view_item' => 'Voir la souris',
			'search_items' => 'Rechercher une souris'
		],
		'taxonomies' => ['souris_category'],
		'supports' => ['title', 'editor', 'thumbnail', 'revisions' => false, 'comments'],
		'description' => 'Permet d’ajouter des souris',
		'public' => true,
		'menu_icon' => 'dashicons-pets',
		'menu_position' => 6
	]);

	/* register_taxonomy('souris_category', 'souris', [
		'labels' => [
			'name' => 'Sexe',
			'singular_name' => 'Sexe',
			'all_items' => 'Tous les sexes',
			'search_items' => 'Rechercher un sexe',
			'add_new_item' => 'Ajouter un sexe',
			'edit_item' => 'Modifier le sexe',
			'update_item' => 'Mettre à jour le sexe',
			'parent_item' => 'Sexe parent',
			'not_found' => 'Sexe introuvable',
			'popular_items' => 'Sexes récurrents',
			'new_item_name' => 'Nom du nouveau sexe'
		],
		'hierarchical' => false
	]); */

	register_taxonomy('souris_id', 'souris', [
		'labels' => [
			'name' => 'Identifiant',
			'singular_name' => 'Identifiant',
			'all_items' => 'Tous les identifiants',
			'search_items' => 'Rechercher un identifiant',
			'add_new_item' => 'Ajouter un identifiant',
			'edit_item' => 'Modifier l’identifiant',
			'update_item' => 'Mettre à jour l’identifiant',
			'parent_item' => 'Identifiant parent',
			'not_found' => 'Identifiant introuvable',
			'popular_items' => 'Identifiants récurrents',
			'new_item_name' => 'Nom du nouvel identifiant'
		],
		'hierarchical' => false
	]);

	register_post_type('portee', [
		'labels' => [
			'name' => 'Portées',
			'singular_name' => 'Portée',
			'all_items' => 'Toutes les portées',
			'add_new_items' => 'Ajouter une portée',
			'edit_item' => 'Modifier la portée',
			'view_item' => 'Voir la portée',
			'search_items' => 'Rechercher une portée'
		],
		'taxonomies' => ['portee_category'],
		'supports' => ['title', 'editor' => false, 'thumbnail' => false, 'revisions' => false, 'comments' => false],
		'description' => 'Permet d’ajouter des souris',
		'public' => true,
		'menu_icon' => 'dashicons-awards',
		'menu_position' => 7
	]);
}
add_action('init', 'sakura_create_post_types');

function sakura_custom_rss ($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type'])) {
		$qv['post_type'] = ['souris'];
	}
	return $qv;
}
add_filter('request', 'sakura_custom_rss');
