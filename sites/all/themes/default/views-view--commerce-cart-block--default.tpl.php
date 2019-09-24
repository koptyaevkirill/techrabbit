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
    <div class="drops__conts skip-links" id="basket">
      <div id="top-cart" class="top-cart drops__cont drops__cont--basket drop-basket js-drop-cont js-drop-basket is-active ">
        <div class="drop-basket__items">
          <?php echo $rows; ?>
          <div class="drop-basket__bottom">
            <div class="drop-basket__total">Итого:&nbsp;&nbsp;<span><span class="price"></span></span></div>
            <a href="/checkout" class="drop-basket__view c-btn no-reg-btn js-act">
            <span>Оформить</span>
            </a>
        </div>
        </div>
      </div>
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