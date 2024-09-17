<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($items) && checkArrayForValues($items)): ?>
	<section class="block-slider">
		<div class="container-fluid">

			<?php if ($subtitle): ?>
				<div class="subtitle"><?= $subtitle ?></div>
			<?php endif ?>
			
			<div class="slider-pagination"></div>
		</div>

		<div class="swiper">
			<div class="swiper-wrapper">

				<?php foreach ($items as $item): ?>
					<div class="swiper-slide"<?php if($item['title']) echo ' data-title="' . $item['title'] . '"' ?>>

						<?php if ($item['image']): ?>
							<div class="slide-image">
								<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
							</div>
						<?php endif ?>
						
						<div class="slide-text">
							<div class="inner">

								<?php if ($item['number']): ?>
									<span class="slide-num">
										<?php if (pathinfo($item['number']['url'])['extension'] == 'svg'): ?>
											<img src="<?= $item['number']['url'] ?>" alt="<?= $item['number']['alt'] ?>">
										<?php else: ?>
											<?= wp_get_attachment_image($item['number']['ID'], 'full') ?>
										<?php endif ?>
									</span>
								<?php endif ?>

								<?php if ($item['title']): ?>
									<h3><?= $item['title'] ?></h3>
								<?php endif ?>

								<?= $item['text'] ?>

							</div>
						</div>
					</div>
				<?php endforeach ?>
				
			</div>
			<div class="swiper-pagination">
				<span class="swiper-pagination-progressbar-fill"></span>
			</div>
			<div class="swiper-controls">
				<div class="swiper-button-prev">
					<svg width="38" height="33" viewBox="0 0 38 33" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.00271789 17.6328L30.4883 17.6349" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" />
						<path d="M0.00271789 16.498L30.4883 16.5002" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" />
						<path d="M30.4883 15.3664L0.000620765 15.3643" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" />
						<path d="M21.6918 32.9583L36.3589 18.1048L37.9434 16.5013L36.3589 14.8967L21.6887 0.0400393" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
						<path d="M20.8974 32.1465L34.7612 18.1054L36.3457 16.5019L34.7612 14.8973L20.8869 0.84668" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
						<path d="M20.1083 1.64453L34.7754 16.498L20.1052 31.3546" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
					</svg>
				</div>
				<div class="swiper-button-next">
					<svg width="38" height="33" viewBox="0 0 38 33" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.00271789 17.6328L30.4883 17.6349" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" />
						<path d="M0.00271789 16.498L30.4883 16.5002" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" />
						<path d="M30.4883 15.3664L0.000620765 15.3643" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" />
						<path d="M21.6918 32.9583L36.3589 18.1048L37.9434 16.5013L36.3589 14.8967L21.6887 0.0400393" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
						<path d="M20.8974 32.1465L34.7612 18.1054L36.3457 16.5019L34.7612 14.8973L20.8869 0.84668" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
						<path d="M20.1083 1.64453L34.7754 16.498L20.1052 31.3546" stroke="#929292" stroke-width="0.77" stroke-miterlimit="10" stroke-linecap="round" />
					</svg>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>