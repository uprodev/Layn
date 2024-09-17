<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($image): ?>
		<section class="block-brands">
			<div class="container-fluid">
				<div class="image">
					<?= wp_get_attachment_image($image['ID'], 'full') ?>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>