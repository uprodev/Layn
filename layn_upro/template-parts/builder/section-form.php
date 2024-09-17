<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="block-contact-form text-white">
		<div class="container-fluid">

			<?php if ($subtitle): ?>
				<div class="subtitle"><?= $subtitle ?></div>
			<?php endif ?>
			
			<div class="row">

				<?php if ($text): ?>
					<div class="col-lg-6">
						<div class="text"><?= $text ?></div>
					</div>
				<?php endif ?>
				
				<?php if ($form): ?>
					<div class="col-lg-6">
						<div class="form">
							<?= do_shortcode('[contact-form-7 id="' . $form . '"]') ?>
						</div>
					</div>
				<?php endif ?>
				
			</div>
		</div>
	</section>

	<?php endif; ?>