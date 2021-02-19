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

<section id="query" class="query">
<?php $loop = new WP_Query([
	'post_type' => 'souris',
	'posts_per_page' => -1
]);

if ($loop->have_posts()) : ?>
	<ul>
	<?php while ($loop->have_posts()) : $loop->the_post(); ?>
		<li><?php get_template_part('template-parts/card-souris'); ?></li>
	<?php endwhile; ?>
	</ul>
<?php endif; ?>
</section>

<?php get_footer() ?>
