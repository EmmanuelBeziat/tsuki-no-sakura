<?php
/**
 * The template for displaying the 404 template in the Sakura theme.
 *
 * @package WordPress
 * @subpackage Sakura
 * @since Sakura 1.0
 */

get_header() ?>

<div class="container error404-content">
	<h1 class="heading-size-3 entry-title">Page introuvable</h1>

	<div class="intro-text"><p>La page que vous recherchez n’existe pas. Elle a peut-être été supprimée ou déplacée.</p></div>

	<?php	get_search_form(['label' => 'Page introuvable']);	?>
</div>

<?php get_footer() ?>
