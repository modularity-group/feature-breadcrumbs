<div class="feature-breadcrumbs align<?= esc_attr($block['align']); ?> <?= isset($block['className']) ? esc_attr($block['className']) : ''; ?>">

  <ul class="breadcrumbs">

    <?php if (is_admin()): ?>
      <li><span>Home</span></li>
      <li><span>Breadcrumb</span></li>
    <?php else: ?>

      <li><a href="<?= home_url(); ?>"><?= get_the_title(get_option('page_on_front')); ?></a></li>

      <?php if (!is_blog()): ?>

        <?php foreach (array_reverse(get_post_ancestors(get_the_ID())) as $ancestorID): ?>
          <?php $ancestor = get_post($ancestorID); ?>
          <li><a href="<?= get_permalink($ancestor->ID); ?>"><?= $ancestor->post_title; ?></a></li>
        <?php endforeach; ?>

        <?php if (is_search()): ?>
          <li><span>...</span></li>
        <?php else: ?>
          <li><span><?= get_the_title(); ?></span></li>
        <?php endif; ?>

      <?php else: ?>

        <?php if (is_author()): ?>
          <li><span><?= get_the_author(); ?></span></li>
        <?php elseif (is_archive()): ?>
          <li><a href="<?= get_category_link(get_query_var('cat')); ?>"><?= single_cat_title(); ?></a></li>
        <?php elseif (is_single()): ?>
          <?php foreach (wp_get_post_categories(get_the_ID()) as $cat): ?>
            <li><a href="/<?= get_category($cat)->slug; ?>"><?= get_category($cat)->name; ?></a></li>
            <?php break; ?>
          <?php endforeach; ?>
          <li><span><?= get_the_title(); ?></span></li>
        <?php endif; ?>

      <?php endif; ?>

    <?php endif; ?>

  </ul>

</div>
