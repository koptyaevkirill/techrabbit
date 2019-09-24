<div class="main u-clear">
  <?php $term = taxonomy_term_load(arg(2)); ?>
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters" style="display: none;">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>
  <div class="sidebar sidebar--prodside prodside js-prodside">
    <!-- SHOP ID -->
    <?php get_menu('menu-menu-category'); ?>
    <form id="search-filter" action="/filters" method="post">
      <?php get_filter($term->tid); ?>
      <input type="hidden" name="node_type" value="product_display">
      <input type="hidden" name="limit" id="field-limit" value="12">
      <input type="hidden" name="order_title" id="order-title" value="">
      <input type="hidden" name="order_dir" id="order-dir" value="">
      <input type="hidden" name="select_field_category" value="<?=$term->tid;?>">
    </form>
  </div>
  <div class="content content__product product u-clear">
    <?php if($term->field_position_body['und'][0]['value'] == 'up'): ?>
      <?=$term->description;?>
    <?php endif; ?>
    <?php path_breadcrumbs_set_breadcrumb(); $breadcrumbs = drupal_get_breadcrumb(); ?>
    
    <div class="breadcrumb">
      <?php foreach ($breadcrumbs as $value): ?>
        <?=$value?>
        <?php if(end($breadcrumbs) != $value):?><span class="breadcrumb__arr">></span><?php endif; ?>
      <?php endforeach ?>
    </div>
    <div class="category-products">

      <div class="top-toolbar">
        <div class="products__top products-top u-clear">
          <h1 class="products-top__title"><?=$term->name;?> </h1>
          <div class="products-top__tools toolbar">
            <div class="products-top__sort products-top__tool sorter">
              <label class="c-selectbox products-top__selectbox">
                <select class="block__select products-top__select" id="sort-select" title="Сортировать по">
                  <option value="title&sort_order=ASC">Название (A-Z)</option>
                  <option value="title&sort_order=DESC">Название (Z-A)</option>
                  <option value="commerce_price_amount&sort_order=DESC">Цена (по убыванию)</option>
                  <option value="commerce_price_amount&sort_order=ASC">Цена (по возрастанию)</option>
                </select>
              </label>
            </div>
            <div class="products-top__show products-top__tool pager">
              Показать
              <a href="javascript:void(0);" data-limit="12" class="products-top__show-item js-act limit-select limit-12">12</a>
              <a href="javascript:void(0);" data-limit="24" class="products-top__show-item js-act limit-select limit-24">24</a>
              <a href="javascript:void(0);" data-limit="36" class="products-top__show-item js-act limit-select limit-36">36</a>
            </div>
            <div class="products-top__switches products-top__tool js-productlist-top-switches">
              <a href="#?mode=grid" title="Сетка" class="products-top__switch switch switch--list js-productlist-top-switch js-act  is-active" data-switch="grid">
                <i class="switch__part switch__part--grid switch__part--top"></i>
                <i class="switch__part switch__part--grid switch__part--bot"></i>
              </a>
              <a href="#?mode=list" title="Список" class="products-top__switch switch switch--list js-productlist-top-switch js-act " data-switch="list">
                <i class="switch__part switch__part--list switch__part--top"></i>
                <i class="switch__part switch__part--list switch__part--mid"></i>
                <i class="switch__part switch__part--list switch__part--bot"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="products__items is-grid u-clear js-products-items products-list" id="products-list">
        <?php if ($rows): ?>
          <div class="products__split products__split--first odd"></div>
          <div class="products__split products__split--second even"></div>
          <?php print $rows; ?>
        <?php elseif ($empty): ?>
          <div class="view-empty">
            <?php print $empty; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="toolbar-bottom">
        <div class="toolbar">
          <?php if ($pager): ?>
            <div class="products__pagination pagination u-clear">
              <?php print $pager; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php if($term->field_position_body['und'][0]['value'] == 'down'): ?>
      <?=$term->description;?>
    <?php endif; ?>
  </div>
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

</div>