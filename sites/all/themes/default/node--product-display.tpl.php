<div class="main u-clear">
  <div class="sidebar sidebar--prodside prodside js-prodside">
    <!-- SHOP ID -->
      <?php get_menu('menu-menu-category'); ?>
  </div>  
  <div class="content content__product product u-clear">
    <?php path_breadcrumbs_set_breadcrumb(); $breadcrumbs = drupal_get_breadcrumb(); ?>
    <div class="breadcrumb">
      <?php foreach ($breadcrumbs as $value): ?>
        <?=$value?>
        <?php if(end($breadcrumbs) != $value):?><span class="breadcrumb__arr">></span><?php endif; ?>
      <?php endforeach ?>
    </div>
    <div id="messages_product_view"></div>
    <div class="product__left product-img-box" id="product_media_content">
      <div class="product__galls js-prod-galls">
        <div class="prod-gall-big js-prod-gall-box">
          <div class="prod-gall-big__slider js-prod-gall-big-slider slider product-scroll">
            <div class="prod-gall-big__wrap js-prod-gall-big-wrap slider__wrap">
              <?php foreach($content['field_image']['#items'] as $item): ?>
                <div class="prod-gall-big__slide slider__slide js-prod-gall-big-slide js-act">
                  <img src="<?=file_create_url($item['uri']);?>" />
                </div>
              <?php endforeach; ?>
            </div>
            <div class="prod-gall-big__nav">
              <div class="prod-gall-big__arr prod-gall-big__arr--prev c-arr js-act js-prod-gall-big-prev"></div>
                <div class="prod-gall-big__arr prod-gall-big__arr--next c-arr js-act js-prod-gall-big-next"></div>
            </div>
            <div class="prod-gall-big__close c-x js-prod-gall-big-close js-act"></div>
          </div>
        </div>
        <div class="prod-gall-thumb">
          <div class="prod-gall-thumb__slider js-prod-gall-thumb-slider slider">
              <div class="prod-gall-thumb__wrap slider__wrap js-prod-gall-thumb-wrap">
                <?php foreach($content['field_image']['#items'] as $item): ?>
                  <div class="prod-gall-thumb__slide slider__slide js-prod-gall-thumb-slide js-act">
                    <img src="<?=file_create_url($item['uri']);?>" />
                  </div>
                <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product__right">
      <h1 class="product-name product__title"><?=$node->title;?></h1>
      <div class="product__price-cont u-valign">
        <div class="product__price">
            <div class="price-box">
                <?php
                    $product = commerce_product_load($node->field_product['und'][0]['product_id']);
			        $price = $product->commerce_price['und'][0]['original']['amount'];
			        $discount_price = $product->commerce_price['und'][0]['amount'];
			        $is_discount = isset($product->commerce_product_discounts['und'][0]['access']) && $product->commerce_product_discounts['und'][0]['access'] ? true : false;
			        $discount_class = '';
			        if($is_discount) { $is_discount = true; $discount_class = 'cred lthrough fs17 node-discount'; }
			    ?>
			    <?php if($is_discount): ?>
			        <span class="u-price-new" id="product-minimal-discount-price-<?=$row->nid;?>"><?=number_format($discount_price, 0, ',', ' ');?> ₽</span>
			    <?php endif; ?>
				<span class="u-price-new <?=$discount_class;?>" id="product-minimal-price-<?=$row->nid;?>"><span><?=number_format($price, 0, ',', ' ');?> ₽</span></span>
          </div>
        </div>
      </div>
      <?php if(isset($node->field_color_product['und'][0]) && isset($node->field_color['und'][0])): ?>
        <div class="product__form-row attribute-row">
          <label class="required attribute-title">Цвет</label>
          <div class="last select-wrapper">
            <div class="c-selectbox">
              <?php 
                foreach($node->field_color_product['und'] as $item) {$product_color_ids[] = $item['product_id'];}
                $product_color_ids = get_related_products($product_color_ids);
              ?>
              <select data-choose-text="Цвет" class="required-entry super-attribute-select" id="product-color-select">
                <option selected><?=$node->field_color['und'][0]['taxonomy_term']->name;?></option>
                <?php $color='';$term='';?>
                <?php foreach($product_color_ids as $color): ?>
                  <?php $color = node_load($color);$term = taxonomy_term_load($color->field_color['und'][0]['tid']);?>
                  <option data-location="<?=url('node/'.$color->nid, array('absolute' => TRUE));?>"><?=$term->name;?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          jQuery(document).ready(function(){
            jQuery('#product-color-select').change(function(){
              window.location.href = jQuery(this).find('option:selected').data('location');
            });
          });
        </script>
      <?php endif; ?>
      <?php if(isset($node->field_color_product['und'][0]) && isset($node->field_color_product_access['und'][0])): ?>
        <div class="product__form-row attribute-row">
          <label class="required attribute-title">Цвет</label>
          <div class="last select-wrapper">
            <div class="c-selectbox">
              <?php 
                foreach($node->field_color_product['und'] as $item) {$product_color_ids[] = $item['product_id'];}
                $product_color_ids = get_related_products($product_color_ids);
              ?>
              <select data-choose-text="Цвет" class="required-entry super-attribute-select" id="product-color-select">
                <option selected><?=$node->field_color_product_access['und'][0]['taxonomy_term']->name;?></option>
                <?php $color='';$term='';?>
                <?php foreach($product_color_ids as $color): ?>
                  <?php $color = node_load($color);$term = taxonomy_term_load($color->field_color_product_access['und'][0]['tid']);?>
                  <option data-location="<?=url('node/'.$color->nid, array('absolute' => TRUE));?>"><?=$term->name;?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          jQuery(document).ready(function(){
            jQuery('#product-color-select').change(function(){
              window.location.href = jQuery(this).find('option:selected').data('location');
            });
          });
        </script>
      <?php endif; ?>
      <?php if($product->status): ?>
      <div class="no-display"><?php echo render($content['field_product']); ?></div>
      <div class="product__form-row">
        <div class="action-block">
          <div class="u-center js-btn-center">
            <div class="product__submit no-reg-btn c-btn c-btn--fat js-act js-btn-check c-btn-check u-valign addtocart is-click" onclick="AmAjaxLogin.addCart();" data-promo-confirm="0" data-type="add-to-cart" style="margin-bottom: 10px;">
              <svg viewBox="0 0 27 23" width="27" height="23" enable-background="new 0 0 27 23">
                  <path d="M26.5 6.2l-2.1-.7C24.3 2.5 22 0 19.2 0c-.5 0-1 .1-1.4.2-.4-.1-.9-.2-1.4-.2-2.9 0-5.2 2.6-5.2 5.7l-2.4.2c-.4.1-.7.4-.7.7v2.8h1.4V7.2l12.3-.9v15.3l-12.2-.9v-5.4H8.1v6c0 .3.3.6.7.7l13.7 1h.5l3.8-1.9c.2-.1.4-.3.4-.6V6.8c-.2-.3-.4-.5-.7-.6zm-13.9-.5c0-2.2 1.4-4 3.2-4.3-1.1 1-1.8 2.5-1.8 4.2l-1.4.1zm2.9-.2c.1-1.7 1-3.2 2.3-3.8 1.2.6 2.1 1.9 2.3 3.5l-4.6.3zm7.3-.5s-.1 0 0 0c-.1 0-.1 0 0 0h-1.3c-.2-1.5-.8-2.7-1.8-3.6 1.6.3 2.9 1.8 3.2 3.7l-.1-.1zm2.8 15.1l-2.4 1.2V6.5l2.4.8v12.8zM9.9 11.2H6.4V7.9c0-.5-.4-.9-1-.9s-1 .4-1 .9v3.3H1c-.5 0-1 .4-1 .9s.4.9 1 .9h3.5v3.3c0 .5.4.9 1 .9s1-.4 1-.9V13H10c.5 0 1-.4 1-.9-.2-.5-.6-.9-1.1-.9z"></path>
              </svg>
              <span>В корзину</span>
            </div>
          </div>
          <a href="javascript:void(0);" onclick="AmAjaxLogin.buyOneClick();" class="product__submit reserve-button c-btn c-btn--fat u-valign">
            <svg viewBox="0 0 27 23" width="27" height="23" enable-background="new 0 0 27 23" style="fill: #fff">
                <path d="M26.5 6.2l-2.1-.7C24.3 2.5 22 0 19.2 0c-.5 0-1 .1-1.4.2-.4-.1-.9-.2-1.4-.2-2.9 0-5.2 2.6-5.2 5.7l-2.4.2c-.4.1-.7.4-.7.7v2.8h1.4V7.2l12.3-.9v15.3l-12.2-.9v-5.4H8.1v6c0 .3.3.6.7.7l13.7 1h.5l3.8-1.9c.2-.1.4-.3.4-.6V6.8c-.2-.3-.4-.5-.7-.6zm-13.9-.5c0-2.2 1.4-4 3.2-4.3-1.1 1-1.8 2.5-1.8 4.2l-1.4.1zm2.9-.2c.1-1.7 1-3.2 2.3-3.8 1.2.6 2.1 1.9 2.3 3.5l-4.6.3zm7.3-.5s-.1 0 0 0c-.1 0-.1 0 0 0h-1.3c-.2-1.5-.8-2.7-1.8-3.6 1.6.3 2.9 1.8 3.2 3.7l-.1-.1zm2.8 15.1l-2.4 1.2V6.5l2.4.8v12.8zM9.9 11.2H6.4V7.9c0-.5-.4-.9-1-.9s-1 .4-1 .9v3.3H1c-.5 0-1 .4-1 .9s.4.9 1 .9h3.5v3.3c0 .5.4.9 1 .9s1-.4 1-.9V13H10c.5 0 1-.4 1-.9-.2-.5-.6-.9-1.1-.9z"></path>
            </svg>
            <span>Купить в 1 клик</span>
          </a>
        </div>
      </div>
      <?php endif; ?>
      <div class="product__sublinks product-links">
        <p>
          <a class="product__sublink js-act" href="<?=url('node/41');?>">Способы оплаты</a> <span class="product__sublink-sep">&nbsp;</span>
          <a class="product__sublink js-act" href="<?=url('node/41');?>">Информация о доставке</a> <span class="product__sublink-sep">&nbsp;</span>
          <a class="product__sublink js-act" href="<?=url('node/307');?>">Trade-in</a> <span class="product__sublink-sep">&nbsp;</span>
          <a class="product__sublink js-act" href="<?=url('node/40');?>">Гарантия</a>
        </p>
      </div>
    </div>
    <div class="product__subsection u-clear">
      <div class="product__left">
          <div class="product__social">
              <!-- social -->&nbsp;
          </div>
      </div>
    </div>
    <script language="javascript">
    jQuery(function($) { $("#tabs-information").tabs({ active: 0 }); });
    </script>
    <div id="tabs-information">
      <ul>
        <li><a href="#tab-description"><div class="product__section-title product-desc__title"><span>Описание</span></div></a></li>
        <li><a href="#tab-specifications"><div class="product__section-title product-desc__title"><span>Параметры</span></div></a></li>
      </ul>
      <div id="tab-description">
        <?=$content['body']['#items'][0]['safe_value'];?>
      </div>
      <div id="tab-specifications">
          <div class="product__section-cont product-specs__cont u-clear">
            <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Модель</span></div>
                <div class="product-specs__val"><span><?=$node->title;?></span></div>
            </div>
            <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Артикул</span></div>
                <div class="product-specs__val"><span><?=$product->sku;?></span></div>
            </div>
            <?php if(isset($node->field_screen['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Экран</span></div>
                <div class="product-specs__val"><span><?=$node->field_screen['und'][0]['taxonomy_term']->name;?></span></div>
            </div>
            <?php endif; ?>
            <?php if(isset($node->field_capacity['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Емкость</span></div>
                <div class="product-specs__val"><span><?=$node->field_capacity['und'][0]['taxonomy_term']->name;?></span></div>
            </div>
            <?php endif; ?>
            <?php if(isset($node->field_color['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Цвет</span></div>
                <div class="product-specs__val"><span><?=$node->field_color['und'][0]['taxonomy_term']->name;?></span></div>
            </div>
            <?php endif; ?>
            <?php if(isset($node->field_cpu['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Процессор</span></div>
                <div class="product-specs__val"><span><?=$node->field_cpu['und'][0]['taxonomy_term']->name;?></span></div>
            </div>
            <?php endif; ?>
            <?php if(isset($node->field_memory['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Память</span></div>
                <div class="product-specs__val"><span><?=$node->field_memory['und'][0]['taxonomy_term']->name;?></span></div>
            </div>
            <?php endif; ?>
            <?php if(isset($node->field_mobile_internet['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Мобильный Интернет</span></div>
                <div class="product-specs__val"><span><?=$node->field_mobile_internet['und'][0]['taxonomy_term']->name;?></span></div>
            </div>
            <?php endif; ?>
            <?php if(isset($node->field_type['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Тип</span></div>
                <div class="product-specs__val"><span><?=$node->field_type['und'][0]['taxonomy_term']->name;?></span></div>
            </div>
            <?php endif; ?>
            <?php if(isset($node->field_wireless_connection['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Беспроводное подключение</span></div>
                <div class="product-specs__val"><span><?=$node->field_wireless_connection['und'][0]['taxonomy_term']->name;?></span></div>
            </div>
            <?php endif; ?>
            <?php if(isset($node->field_compatibility['und'])): ?>
              <div class="product-specs__row u-clear">
                <div class="product-specs__label"><span>Совместимость</span></div>
                <div class="product-specs__val"><span><?=$node->field_compatibility['und'][0]['taxonomy_term']->name;?></span></div>
              </div>
            <?php endif; ?>
            <?php if(isset($node->field_advanced_property_title['und']) && isset($node->field_advanced_property_value['und'])): ?>
              <?php foreach($node->field_advanced_property_title['und'] as $index => $property): ?>
                <div class="product-specs__row u-clear">
                  <div class="product-specs__label"><span><?=$property['value'];?></span></div>
                  <div class="product-specs__val"><span><?=$node->field_advanced_property_value['und'][$index]['value'];?></span></div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
      </div>
    </div>
    <?php if(isset($node->field_products_related['und'])): ?>
    <div class="product__section product-related">
      <div class="product__section-title product-related__title"><span>Связанные продукты</span></div>
      <div class="product__section-cont product-related__cont products u-clear">
        <?php 
          foreach($node->field_products_related['und'] as $item) {$product_ids[] = $item['product_id'];}
          $products_nid = get_related_products($product_ids);
        ?>
        <div class="products__items is-grid u-clear js-products-items">
          <div class="products__split products__split--first"></div>
          <div class="products__split products__split--second"></div>
          <?php foreach($products_nid as $item): ?>
            <?php 
                $node_related = node_load($item);
                $node_view_related = node_view($node_related);
                $product_related = commerce_product_load($node_related->field_product['und'][0]['product_id']);
		        $price = $product_related->commerce_price['und'][0]['original']['amount'];
		        $discount_price = $product_related->commerce_price['und'][0]['amount'];
		        $is_discount = isset($product_related->commerce_product_discounts['und'][0]['access']) && $product_related->commerce_product_discounts['und'][0]['access'] ? true : false;
		        $discount_class = '';
		        if($is_discount) { $is_discount = true; $discount_class = 'cred lthrough'; }
            ?>
            <div class="products__item products-item js-products-item u-clear">
              <a href="<?=url('node/'.$node_related->nid);?>" class="products-item__img" style="background-image: url('<?=file_create_url($node_related->field_image['und'][0]['uri']);?>');"></a>
              <a href="<?=url('node/'.$node_related->nid);?>" class="products-item__desc">
                <span class="products-item__text"><?=$node_related->title;?></span>
                <span class="products-item__price">
                  <div class="price-box">
                    <?php if($is_discount): ?>
    			        <span class="u-price-new" id="product-minimal-discount-price-<?=$row->nid;?>"><?=number_format($discount_price, 0, ',', ' ');?> ₽</span>
    			    <?php endif; ?>
    				<span class="u-price-new node-discount <?=$discount_class;?>" id="product-price-<?=$node->nid;?>-related"><span><?=number_format($price, 0, ',', ' ');?> ₽</span></span>
                  </div>
                </span>
              </a>
              <a href="<?=url('node/'.$node_related->nid);?>" class="products-item__buy products-item__buy--forward js-act">
                <svg class="products-item__svg products-item__svg--forward" width="26" height="24" viewBox="0 0 26 24" enable-background="new 0 0 26 24">
                  <path d="M12.8 18.1c-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2-4.5-4.5c-.4-.4-.4-1 0-1.4.4-.4 1-.4 1.3 0l5.1 5.2c.2.2.3.4.3.7 0 .2-.1.5-.3.7l-4.8 4.9C13.3 18 13.1 18.1 12.8 18.1M13.9 12.2c0-.5-.4-.9-.9-.9h-12c-.5 0-.9.4-.9.9 0 .5.4.9.9.9h12C13.5 13.2 13.9 12.8 13.9 12.2M3.3 4.1v4.3c0 .5.4.9.9.9.5 0 .9-.4.9-.9V4.1c0-1.2 1-2.2 2.2-2.2h14.6c1.2 0 2.2 1 2.2 2.2v15.8c0 1.2-1 2.2-2.2 2.2H7.3c-1.2 0-2.2-1-2.2-2.2v-4.3c0-.5-.4-.9-.9-.9-.5 0-.9.4-.9.9v4.3c0 2.3 1.8 4.1 4.1 4.1h14.6c2.3 0 4.1-1.9 4.1-4.1V4.1C26 1.8 24.2 0 21.9 0H7.4C5.1 0 3.3 1.8 3.3 4.1" />
                </svg>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
      </div>
    </div>
  </div>
</div>