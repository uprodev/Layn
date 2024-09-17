</main>

<?php $is_front_page =  is_front_page() ?>

<footer class="footer<?php if($is_front_page) echo ' footer--landing' ?>">
  <div class="d-flex align-items-center justify-content-between">

    <?php if ($field = get_field('copyright_f', 'option')): ?>
      <p><?= $field ?></p>
    <?php endif ?>

    <?php if(have_rows('socials_f', 'option')): ?>

      <ul>

        <?php while(have_rows('socials_f', 'option')): the_row() ?>

          <?php if ($field = get_sub_field('link')): ?>
            <li>
              <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
            </li>
          <?php endif ?>

        <?php endwhile ?>

      </ul>

    <?php endif ?>

    <?php if (($field = get_field('email_f', 'option')) && !$is_front_page): ?>
      <p><a href="mailto:<?= $field ?>"><?= $field ?></a></p>
    <?php endif ?>

  </div>
</footer>

</div>

<?php wp_footer() ?>
</body>
</html>