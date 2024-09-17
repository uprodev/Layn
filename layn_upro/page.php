<?php get_header(); ?>

<?php if (get_the_content()): ?>
	<section class="page-content">
		<div class="container-fluid">
			<div class="row">
				<h1><?php the_title() ?></h1>
				<?php the_content() ?>
			</div>
		</div>
	</section>
<?php endif ?>

<?php if ( have_rows('content') ) :

	get_template_part( 'template-parts/content', 'builder' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php get_footer(); ?>