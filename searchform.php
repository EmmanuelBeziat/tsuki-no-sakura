<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Sakura
 * @since Sakura 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$sakura_unique_id = sakura_unique_id('search-form-');

$sakura_aria_label = ! empty($args['label']) ? 'aria-label="' . esc_attr($args['label']) . '"' : '';
?>
<form role="search" <?php echo $sakura_aria_label; ?> method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label class="" for="<?php echo esc_attr($sakura_unique_id); ?>">
		<span class="screen-reader-text">Rechercher pour…</span>
		<input type="search" id="<?php echo esc_attr($sakura_unique_id); ?>" class="search-field" placeholder="Recherche…" value="<?php echo get_search_query(); ?>" name="s">
	</label>
	<button type="submit" class="search-submit">
		<?php // sakura_the_theme_svg('search'); ?>
		<span class="screen-reader-text">Recherche</span>
	</button>
</form>
