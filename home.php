<?php get_header() ?>

<section is="hero" class="hero">
	<div class="container">
		<pre>
		home
		<?php if (is_home()) : ?> is_home <?php endif ?>
		<?php if (is_front_page()) : ?> is_front_page <?php endif ?>
		</pre>
	</div>
</section>


<?php get_footer() ?>
