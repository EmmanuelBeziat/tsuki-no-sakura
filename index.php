<?php get_header() ?>

<section is="hero" class="hero">
	<div class="container">
		<h1>index</h1>
		<pre>
		index
		<?php if (is_home()) : ?> is_home <?php endif ?>
		<?php if (is_front_page()) : ?> is_front_page <?php endif ?>
		</pre>
	</div>
</section>

<?php get_footer() ?>
