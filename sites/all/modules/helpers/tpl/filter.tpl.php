<div class="prodside__filters sidefilter js-sidefilter block block-layered-nav amshopby-filters-left  block-layered-nav amshopby-filters-left--no-filters">
  <div class="sidefilter__toggle js-sidefilter-toggle js-act amshopby-filters-left-title is-active">Фильтр поиска<div class="sidefilter__arr c-arr c-arr--w"></div></div>
  <div class="sidefilter__cont js-sidefilter-cont block-content toggle-content amshopby-filters-content is-open">

    <div class="sidefilter__subfilter side-subfilter js-side-subfilter amshopby-filters-filter">
      <div class="side-subfilter__toggle js-side-subfilter-toggle js-act filter-title ">
        Цена
        <div class="c-plus side-subfilter__plus js-act js-side-subfilter-plus"></div>
      </div>
      <div class="side-subfilter__cont  js-side-subfilter-cont filter-values ">
        <div class="side-subfilter__price-slider price-slider js-price-slider">
          <div class="price-slider__top u-clear">
              <div class="price-slider__from-label">
                <span>от</span>
              </div>
              <div class="price-slider__to-label">
                <span>до</span>
              </div>
          </div>
          <div style="padding:0 10px;">
            <div id="price-slider" style="margin-top: 5px;"></div>
          </div>
          <div class="slider-range" style="margin-top: 5px;">
            <span class="pull-left amshopby-slider-price amshopby-slider-price-from" id="min-price-range">10</span>
            <input type="hidden" name="between_field_product_price[]" id="min-price-range" />
            <span class="pull-right amshopby-slider-price amshopby-slider-price-to" id="max-price-range" /></span>
            <input type="hidden" name="between_field_product_price[]" id="max-price-range" />
          </div>
        </div>
      </div>
    </div>
    <?php if(isset($array_property) && !empty($array_property[0]['data'])): ?>
      <?php foreach($array_property as $item): ?>
        <div class="sidefilter__subfilter side-subfilter js-side-subfilter amshopby-filters-filter">
          <div class="side-subfilter__toggle js-side-subfilter-toggle js-act filter-title">
            <?=$item['vocabulary']->name;?><div class="c-plus side-subfilter__plus js-act js-side-subfilter-plus"></div>
          </div>
          <div class="side-subfilter__cont js-side-subfilter-scroll js-side-subfilter-cont filter-values" data-scroll="sfs0">
            <div class="side-subfilter__wrap">
              <?php foreach($item['data'] as $checkbox): ?>
                <?php if(isset($checkbox->field_category['und'])): ?>
                  <?php $is_category = false;?>
                  <?php foreach($checkbox->field_category['und'] as $category): ?>
                    <?php if($category['tid'] == $current_term): ?>
                      <?php $is_category = true; break;?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <?php if($is_category): ?>
                    <div class="c-checkbox c-checkbox--s side-subfilter__checkbox js-side-subfilter-checkbox" data-text="<?=$item['vocabulary']->name;?>">
                      <label>
                        <input class="c-checkbox__box c-checkbox__box--s side-subfilter__checkbox-box" type="checkbox" value="<?=$checkbox->tid;?>" name="checkbox_field_<?=$item['vocabulary']->machine_name;?>[]" />
                        <span class="c-checkbox__cont c-checkbox__cont--s  side-subfilter__checkbox-cont"><?=$checkbox->name;?></span>
                      </label> 
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach;?>
            </div>
            <div class="side-subfilter__arr c-arr js-act side-subfilter__arr--up js-side-subfilter-up"></div>
            <div class="side-subfilter__arr c-arr js-act side-subfilter__arr--down js-side-subfilter-down"></div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif;?>
  </div>
</div>