<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="block-intro <?= $is_white ? 'bg-white' : 'text-white' ?>">
		<div class="container-fluid">

			<?php if ($subtitle): ?>
				<div class="subtitle float-start"><?= $subtitle ?></div>
			<?php endif ?>
			
			<?php if ($text): ?>
				<h2><?= $text ?></h2>
			<?php endif ?>
			
		</div>
	</section>

	<?php endif; ?>