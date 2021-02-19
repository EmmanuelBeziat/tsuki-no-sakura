<?php
/**
 * The default template for displaying mouses
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Sakura
 * @since Sakura 1.0
 */

$souris = (object) [
	'ID' => get_field('presentation')['identifiant']->name,
	'photo' => get_field('presentation')['photo'],
	'nom' => get_field('presentation')['prenom'],
	'signification' => get_field('presentation')['signification'],
	'sexe' => get_field('presentation')['sexe'],
	'origines' => get_field('origines')['provenance'],
	'naissance' => get_field('origines')['date'],
	'couleur' => get_field('apparence')['couleur'],
	'pelage' => get_field('apparence')['poil'],
	'yeux' => get_field('apparence')['yeux'],
	'poids' => get_field('apparence')['poids'],
	'status' => get_field('autres')['status'],
	'vente' => get_field('autres')['vente'],
	'genotype' => get_field('autres')['genotype']
];
?>

<article <?php post_class('souris') ?> id="souris-<?php the_ID() ?>">

	<header class="souris-header">
		<h1><?= $souris->ID ?> <?= $souris->nom ?></h1>
	</header>

	<div class="souris-content">
		<div class="souris-bio">
			<dl>
			<?php if ($souris->nom && $souris->signification) : ?>
				<dt>Prénom et signification</dt>
				<dd><?= $souris->nom ?> (<?= $souris->signification ?>)</dd>
			<?php elseif ($souris->nom) : ?>
				<dt>Prénom</dt>
				<dd><?= $souris->nom ?></dd>
			<?php endif ?>

			<?php if ($souris->sexe) : ?>
				<?php if ($souris->sexe['value'] === 'male') : ?>
					<svg viewBox="0 0 384 512" width="64"><title><?= $souris->sexe['label'] ?></title><path d="M372 64h-79c-10.7 0-16 12.9-8.5 20.5l16.9 16.9-80.7 80.7c-22.2-14-48.5-22.1-76.7-22.1C64.5 160 0 224.5 0 304s64.5 144 144 144 144-64.5 144-144c0-28.2-8.1-54.5-22.1-76.7l80.7-80.7 16.9 16.9c7.6 7.6 20.5 2.2 20.5-8.5V76c0-6.6-5.4-12-12-12zM144 384c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"/></svg>
				<?php elseif ($souris->sexe['value'] === 'femelle') : ?>
					<svg viewBox="0 0 288 512" width="64"><title><?= $souris->sexe['label'] ?></title><path d="M288 176c0-79.5-64.5-144-144-144S0 96.5 0 176c0 68.5 47.9 125.9 112 140.4V368H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h36v36c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-36h36c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-36v-51.6c64.1-14.5 112-71.9 112-140.4zm-224 0c0-44.1 35.9-80 80-80s80 35.9 80 80-35.9 80-80 80-80-35.9-80-80z"/></svg>
				<?php endif ?>
			<?php endif ?>

			<?php if ($souris->status['value'] === 'mort') : ?>
				<svg viewBox="0 0 384 512" width="1em"><title><?= $souris->status['label'] ?></title><path d="M352 128h-96V32c0-17.67-14.33-32-32-32h-64c-17.67 0-32 14.33-32 32v96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h96v224c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32V256h96c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"/></svg>
			<?php endif ?>

			<?php if ($souris->couleur) : ?>
				<dt>Couleurs et marquage</dt>
				<dd><?= $souris->couleur ?></dd>
			<?php endif ?>

			<?php if ($souris->yeux) : ?>
				<dt>Couleur des yeux</dt>
				<dd><?= $souris->yeux ?></dd>
			<?php endif ?>

			<?php if ($souris->pelage) : ?>
				<dt>Type de poils</dt>
				<dd><?= $souris->pelage ?></dd>
			<?php endif ?>

			<?php if ($souris->naissance) : ?>
				<dt>Date de naissance</dt>
				<dd><?= $souris->naissance ?></dd>
			<?php endif ?>

			<?php if ($souris->poids) : ?>
				<dt>Poids</dt>
				<dd><?= $souris->poids ?> gr</dd>
			<?php endif ?>

			<?php if ($souris->status) : ?>
				<dt>Status</dt>
				<dd><?= $souris->status['label'] ?> gr</dd>
			<?php endif ?>

			<?php if ($souris->vente) : ?>
				<dt>Vente</dt>
				<dd><?= $souris->vente['label'] ?></dd>
			<?php endif ?>

			<?php if ($souris->genotype) : ?>
				<dt>Génotype</dt>
				<dd><?= $souris->genotype ?></dd>
			<?php endif ?>
			</dl>
		</div>
	</div>

</article>
