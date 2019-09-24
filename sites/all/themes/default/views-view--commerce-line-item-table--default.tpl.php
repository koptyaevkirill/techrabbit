<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <h1 class="text-center">Ваш заказ</h1>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content mt20">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty mt20">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>
  <div class="view-footer text-center mt20">
    <p id="total-price">Общая сумма: <span class="text-site price">0</span></p>
    <p>Статус: <span class="text-site">Подготовка заказа</span></p>
    <p class="mt30"><a href="/" class="link-front">Вернуться на сайт</a></p>
  </div>
  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      var total = 0;
      jQuery('.checkout-product-item').each(function() {
          var count = parseInt(jQuery(this).find('.drop-basket__count span').text().replace(/[^0-9]/g, ""));
          var price = parseInt(jQuery(this).find('.drop-basket__price div').text().replace(/[^0-9]/g, ""));
          total += count * price;
      });
      jQuery('#total-price .price').text(total + ' ₽');
    });
  </script>
</div>