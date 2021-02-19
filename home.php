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
]); ?>
<?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
<a href="<?php echo get_permalink() ?>" <?php post_class('') ?> id="post-<?php the_ID(); ?>">
	<h2><?= get_the_title() ?></h2>
	<ul>
		<li>Photo: <code><?= get_field('presentation')['photo'] ?></code></li>
		<li>ID: <code><?= get_field('presentation')['identifiant']->name ?></code></li>
		<li>Prénom: <code><?= get_field('presentation')['prenom'] ?> (signification)</code></li>
		<li>Sexe: <code><?= get_field('presentation')['sexe'] ?></code></li>
		<li>Origines: <code><?= get_field('origines')['provenance'] ?></code></li>
		<li>Naissance: <code><?= get_field('origines')['date'] ?></code></li>
		<li>Couleur: <code><?= get_field('apparence')['couleur'] ?></code></li>
		<li>Type de poil: <code><?= get_field('apparence')['poil'] ?></code></li>
		<li>Poids: <code><?= get_field('apparence')['poids'] ?></code></li>
		<li>Status: <code><?= get_field('autres')['status'] ?></code></li>
		<li>Vente: <code><?= get_field('autres')['vente'] ?></code></li>
		<li>Génotype: <code><?= get_field('autres')['genotype'] ?></code></li>
	</ul>
</a>
<?php endwhile; endif; ?>
</section>

<?php get_footer() ?>
