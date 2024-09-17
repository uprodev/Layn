<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8" />
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <style>
    .global-wrapper.page-landing{opacity:0}.preloader{position:fixed;left:0;top:0;width:100vw;height:100vh;background-color:#111;z-index:9999;display:flex;flex-direction:column;align-items:center;justify-content:center;transform-origin:center}.preloader .preloader-logo{margin:0 0 20px}.preloader .preloader-visual{width:304px;height:28px;background:url(<?= get_stylesheet_directory_uri() ?>/images/preloader1.svg) repeat-x;position:relative;margin:0 0 20px}.preloader .preloader-visual .inner{position:absolute;left:0;top:0;width:0;height:28px;background:url(<?= get_stylesheet_directory_uri() ?>/images/preloader2.svg) repeat-x}.preloader .preloader-percent-digits{display:flex;font-family:"Brockmann Medium",sans-serif;font-size:26px;color:#fff;overflow:hidden;line-height:1.2;height:1.2em}.preloader .preloader-percent-digits .preloader-percent-digit{position:relative}
  </style>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php $is_front_page =  is_front_page() ?>

  <header class="header<?php if($is_front_page) echo ' header--landing' ?>">

    <?php if ($field = get_field('logo')): ?>
      <div class="header-mark">
        <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
          <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
        <?php else: ?>
          <?= wp_get_attachment_image($field['ID'], 'full') ?>
        <?php endif ?>
      </div>
    <?php endif ?>

    <?php if ($field = get_field('logo_h', 'option')): ?>
      <div class="header-logo">
        <a href="<?= get_home_url() ?>">
          <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
            <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
          <?php else: ?>
            <?= wp_get_attachment_image($field['ID'], 'full') ?>
          <?php endif ?>
        </a>
      </div>
    <?php endif ?>

    <?php if (!$is_front_page): ?>
      <nav class="header-navigation">

        <?php wp_nav_menu( array(
          'theme_location'  => 'header',
          'container'       => '',
          'items_wrap'      => '<ul>%3$s</ul>'
        ) ); ?>

      </nav>
    <?php endif ?>
    
  </header>

  <?php if ($is_front_page): ?>
    <div id="preloader" class="preloader">

      <?php if ($field = get_field('logo_h', 'option')): ?>
        <div class="preloader-logo">
          <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
            <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
          <?php else: ?>
            <?= wp_get_attachment_image($field['ID'], 'full') ?>
          <?php endif ?>
        </div>
      <?php endif ?>

      <div class="preloader-visual">
        <div id="preloaderVisualInner" class="inner"></div>
      </div>
      <div id="preloaderPercentDigits" class="preloader-percent-digits">
        <div class="preloader-percent-digit">
          <div class="preloader-percent-digit-num preloader-prev">0</div>
          <div class="preloader-percent-digit-num preloader-current">0</div>
        </div>
        <div class="preloader-percent-digit">
          <div class="preloader-percent-digit-num preloader-prev">0</div>
          <div class="preloader-percent-digit-num preloader-current">0</div>
        </div>
        <div class="preloader-percent-digit">
          <div class="preloader-percent-digit-num preloader-prev">0</div>
          <div class="preloader-percent-digit-num preloader-current">0</div>
        </div>
      </div>
    </div>
  <?php endif ?>

  <div class="global-wrapper <?= $is_front_page || get_field('is_dark') ? 'bg-dark' : 'bg-primary' ?><?php if($is_front_page) echo ' page-landing' ?>">
    <main class="content">