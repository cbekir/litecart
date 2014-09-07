<div class="box" id="box-checkout-shipping">
  <div class="heading"><h2><?php echo language::translate('title_shipping', 'Shipping'); ?></h2></div>
  <div class="content listing-wrapper">
    <ul id="shipping-options" class="list-horizontal">
<?php
  foreach ($options as $module) {
    foreach ($module['options'] as $option) {
?>
      <li class="option<?php echo ($module['id'].':'.$option['id'] == $selected['id']) ? ' selected' : false; ?>">
      <?php echo functions::form_draw_form_begin('shipping_form') . functions::form_draw_hidden_field('selected_shipping', $module['id'].':'.$option['id'], $selected['id']); ?>
        <div class="icon-wrapper"><img src="<?php echo functions::image_resample(FS_DIR_HTTP_ROOT . WS_DIR_HTTP_HOME . $option['icon'], FS_DIR_HTTP_ROOT . WS_DIR_CACHE, 200, 70, 'FIT_ONLY_BIGGER_USE_WHITESPACING'); ?>" /></div>
        <div class="title"><?php echo $module['title']; ?></div>
        <div class="name"><?php echo $option['name']; ?></div>
        <div class="description"><?php echo $option['fields'] . $option['description']; ?></div>
        <div class="footer">
          <div class="price"><?php echo currency::format(tax::calculate($option['cost'], $option['tax_class_id'])); ?></div>
          <div class="select">
<?php
  if ($module['id'].':'.$option['id'] == $selected['id']) {
    if (!empty($option['fields'])) {
      echo functions::form_draw_button('set_shipping', language::translate('title_update', 'Update'), 'submit');
    } else {
      echo functions::form_draw_button('set_shipping', language::translate('title_selected', 'Selected'), 'submit', 'class="active"');
    }
  } else {
    echo functions::form_draw_button('set_shipping', language::translate('title_select', 'Select'), 'submit');
  }
?>
          </div>
        </div>
      <?php echo functions::form_draw_form_end(); ?>
      </li>
<?php
    }
  }
?>
    </ul>
  </div>
</div>