<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<?php if(have_rows('pages')): ?>

	<section class="block-landing">

		<?php while(have_rows('pages')): the_row() ?>

			<?php if ($field = get_sub_field('page')): ?>
				<div class="column <?= get_field('is_dark', $field) ? 'column--left' : 'column--right' ?>">
					<a href="<?php the_permalink($field) ?>">

						<?php if (has_post_thumbnail($field)): ?>
							<div class="image">
								<?= get_the_post_thumbnail($field, 'full') ?>
							</div>
						<?php endif ?>
						
						<div class="text">
							<h1><?= get_the_title($field) ?></h1>
							<p><?= get_the_excerpt($field) ?></p>
							<div class="arrow">
								<svg width="64" height="55" viewBox="0 0 64 55" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0.00354362 29.3877L51.3477 29.3912" stroke="white" stroke-width="0.77" stroke-miterlimit="10" />
									<path d="M0.00354362 27.4971L51.3477 27.5006" stroke="white" stroke-width="0.77" stroke-miterlimit="10" />
									<path d="M51.3477 25.611L1.66271e-05 25.6074" stroke="white" stroke-width="0.77" stroke-miterlimit="10" />
									<path d="M36.5333 54.9311L61.2357 30.1753L63.9043 27.5028L61.2357 24.8284L36.528 0.0673831" stroke="white" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
									<path d="M35.1966 53.5765L58.5463 30.1748L61.2148 27.5022L58.5463 24.8279L35.179 1.41016" stroke="white" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
									<path d="M33.8678 2.74121L58.5703 27.497L33.8625 52.258" stroke="white" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
								</svg>
							</div>
						</div>
					</a>
				</div>
			<?php endif ?>

		<?php endwhile ?>

	</section>

<?php endif ?>

<?php get_footer(); ?>