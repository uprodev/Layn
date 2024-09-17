<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($items) && checkArrayForValues($items)): ?>
	<section class="block-text-image bg-white">
		<div class="container-fluid">

			<?php if ($subtitle): ?>
				<div class="subtitle"><?= $subtitle ?></div>
			<?php endif ?>
			
			<div class="cp-tabs">
				<ul class="nav nav-tabs" role="tablist">

					<?php foreach ($items as $index => $item): ?>
						<li class="nav-item">
							<a class="nav-link<?php if($index == 0) echo ' active' ?>" id="tab<?= $index + 1 ?>Navphp" data-bs-toggle="tab" href="#tab<?= $index + 1 ?>" role="tab" aria-controls="tab<?= $index + 1 ?>" aria-selected="<?= $index == 0 ? 'true' : 'false' ?>"><?= $item['title'] ?></a>
						</li>
					<?php endforeach ?>

				</ul>
				<div class="tab-content" id="myTabContent">

					<?php foreach ($items as $index => $item): ?>
						<div class="tab-pane fade<?php if($index == 0) echo ' show active' ?>" id="tab<?= $index + 1 ?>" role="tabpanel" aria-labelledby="tab<?= $index + 1 ?>-tab">
							<div class="row">
								<div class="col-lg-6">
									<div class="text">
										<?= $item['text'] ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="image">
										<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>

				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>