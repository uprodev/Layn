<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="block-banner">

		<?php if ($video): ?>
			<div class="image">
				<video src="<?= $video['url'] ?>" loop autoplay playsinline muted></video>
			</div>
		<?php endif ?>
		
		<?php if ($text): ?>
			<div class="text"><?= $text ?></div>
		<?php endif ?>
		
		<div class="btn-scroll-wrap">
			<button type="button" class="btn-scroll">
				<img src="<?= get_stylesheet_directory_uri() ?>/images/icons/arrow-down.svg" alt="" />
			</button>
		</div>
	</section>

	<?php endif; ?>