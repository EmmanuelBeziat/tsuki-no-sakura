<?php
/**
 * Sakura functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Sakura
 * @since Sakura 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sakura_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// Set post thumbnail size.
	set_post_thumbnail_size(1200, 9999);

	// add_image_size('sakura-mouse-home', 480, 480, ['center', 'center']);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','script','style']);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sakura, use a find and replace
	 * to change 'sakura' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('sakura');

	// Add support for full and wide align images.
	add_theme_support('align-wide');

	// Add support for responsive embeds.
	add_theme_support('responsive-embeds');

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	// $loader = new Sakura_Script_Loader();
	// add_filter('script_loader_tag', array($loader, 'filter_script_loader_tag'), 10, 2);

}
add_action('after_setup_theme', 'sakura_theme_support');

/**
 * REQUIRED FILES
 * Include required files.
 */
// require get_template_directory() . '/inc/template-tags.php';
// require get_template_directory() . '/classes/class-sakura-svg-icons.php';
// require get_template_directory() . '/inc/svg-icons.php';
// require get_template_directory() . '/classes/class-sakura-walker-comment.php';
// require get_template_directory() . '/classes/class-sakura-walker-page.php';
// require get_template_directory() . '/classes/class-sakura-script-loader.php';
// require get_template_directory() . '/inc/customize.php';

// Custom CSS.
// require get_template_directory() . '/inc/custom-css.php';

/**
 * Register and Enqueue Styles.
 */
function sakura_register_styles() {

	$theme_version = wp_get_theme()->get('Version');

  wp_enqueue_style('sakura-style', get_template_directory_uri() . '/assets/css/main.min.css', array(), $theme_version);
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

	wp_enqueue_script('sakura-js', get_template_directory_uri() . '/assets/js/main.min.js', array(), $theme_version, false);
	wp_script_add_data('sakura-js', 'defer', true);
}

add_action('wp_enqueue_scripts', 'sakura_register_scripts');

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function sakura_menus() {

	$locations = [
		'primary'  => __('Menu principal', 'sakura'),
		'footer'   => __('Menu pied de page', 'sakura'),
	];

	register_nav_menus($locations);
}

add_action('init', 'sakura_menus');


/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function sakura_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __('Skip to the content', 'sakura') . '</a>';
}
add_action('wp_body_open', 'sakura_skip_link', 5);

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sakura_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __('Footer #1', 'sakura'),
				'id'          => 'sidebar-1',
				'description' => __('Widgets in this area will be displayed in the first column in the footer.', 'sakura'),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __('Footer #2', 'sakura'),
				'id'          => 'sidebar-2',
				'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'sakura'),
			)
		)
	);

}
// add_action('widgets_init', 'sakura_sidebar_registration');

/**
 * Enqueue supplemental block editor styles.
 */
function sakura_block_editor_styles() {
	// Enqueue the editor styles.
	wp_enqueue_style('sakura-block-editor-styles', get_theme_file_uri('/assets/css/editor-style-block.css'), array(), wp_get_theme()->get('Version'), 'all');

	// Add inline style from the Customizer.
	// wp_add_inline_style('sakura-block-editor-styles', sakura_get_customizer_css('block-editor'));

	// Enqueue the editor script.
	wp_enqueue_script('sakura-block-editor-script', get_theme_file_uri('/assets/js/editor-script-block.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}
add_action('enqueue_block_editor_assets', 'sakura_block_editor_styles', 1, 1);

/**
 * Enqueue classic editor styles.
 */
function sakura_classic_editor_styles() {
	$classic_editor_styles = ['/assets/css/editor-style-classic.css'];

	add_editor_style($classic_editor_styles);
}
// add_action('init', 'sakura_classic_editor_styles');

/**
 * Output Customizer settings in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
/* function sakura_add_classic_editor_customizer_styles($mce_init) {

	$styles = sakura_get_customizer_css('classic-editor');

	if (! isset($mce_init['content_style'])) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}
add_filter('tiny_mce_before_init', 'sakura_add_classic_editor_customizer_styles'); */

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function sakura_read_more_tag($html) {
	return preg_replace('/<a(.*)>(.*)<\/a>/iU', sprintf('<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title(get_the_ID())), $html);
}

add_filter('the_content_more_link', 'sakura_read_more_tag');

function sakura_create_post_types () {
	register_post_type('mouses', [
		'labels' => [
			'name' => 'Souris',
			'singular_name' => 'Souris',
			'all_items' => 'Toutes les souris',
			'add_new_items' => 'Ajouter une souris',
			'edit_item' => 'Modifier la souris',
			'view_item' => 'Voir la souris',
			'search_items' => 'Rechercher une souris'
		],
		'taxonomies' => ['mouses_category'],
		'supports' => ['title', 'editor', 'thumbnail', 'revisions' => false, 'comments'],
		'description' => 'Permet d’ajouter des souris',
		'public' => true,
		'menu_icon' => 'dashicons-pets',
		'menu_position' => 6
	]);

	/* register_taxonomy('mouses_category', 'mouses', [
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

	register_taxonomy('mouses_id', 'mouses', [
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

	register_post_type('litter', [
		'labels' => [
			'name' => 'Portées',
			'singular_name' => 'Portée',
			'all_items' => 'Toutes les portées',
			'add_new_items' => 'Ajouter une portée',
			'edit_item' => 'Modifier la portée',
			'view_item' => 'Voir la portée',
			'search_items' => 'Rechercher une portée'
		],
		'taxonomies' => ['litter_category'],
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


// Removes from admin menu
function remove_admin_menu () {
	remove_menu_page('edit-comments.php');
}
// add_action('admin_menu', 'remove_admin_menu');
// Removes from post and pages

function remove_comment_support() {
	remove_post_type_support('post', 'comments');
	remove_post_type_support('page', 'comments');
}
// add_action('init', 'remove_comment_support', 100);
// Removes from admin bar

function admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
// add_action('wp_before_admin_bar_render', 'admin_bar_render');


remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');

function debug ($value) { ?>
<pre style="margin: 1rem 0; padding: 1rem;background: #e4e4e4;border:1px solid: #ccc;"><code><?php var_dump($value); ?></code></pre>
<?php }
