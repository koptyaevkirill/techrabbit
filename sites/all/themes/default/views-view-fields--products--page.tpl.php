<?php
    $price = $row->field_commerce_price[0]['raw']['original']['amount'];
    $discount_price = $row->field_commerce_price[0]['raw']['amount'];
    $is_discount = count( $row->field_commerce_price[0]['raw']['data']['components'] ) > 1 ? true : false;
    $discount_class = '';
    if($is_discount) { $is_discount = true; $discount_class = 'cred lthrough'; }
?>
<div class="products__item products-item js-products-item u-clear item">
	<div>
	<a id="product-image-<?=$row->nid;?>" href="<?=url('node/'.$row->nid);?>"  title="<?=$row->node_title;?>" class="product-link products-item__img">
	  <img src="<?=file_create_url($row->field_field_image[0]['raw']['uri']);?>" alt="<?=$row->node_title;?>" />
	</a>
	</div>
	<a href="<?=url('node/'.$row->nid);?>" class="product-link products-item__desc">
		<?php if($row->_field_data['nid']['entity']->field_is_new['und'][0]['value'] == 1): ?>
			<span class="products-item__new-label">Новинка!</span>
		<?php endif; ?>
		<span class="products-item__text"><?=$row->node_title;?></span>
		<span class="products-item__price">
			<div class="min-price-box price-box">
			    <?php if($is_discount): ?>
			        <span class="price discount" id="product-minimal-discount-price-<?=$row->nid;?>"><?=number_format($discount_price, 0, ',', ' ');?> ₽</span>
			    <?php endif; ?>
				<span class="price <?=$discount_class;?>" id="product-minimal-price-<?=$row->nid;?>"><span class="cblack"><?=number_format($price, 0, ',', ' ');?> ₽</span></span>
			</div>
		</span>
	</a>
	<?php $row->commerce_product_field_data_field_product_status ? $stock = '' : $stock = 'out-of-stock';?>
	<div class="stock-info <?=$stock;?>" id="stock-info-<?=$row->nid;?>">
		<div class="in-stock" title="В наличии"><span class="indicator"></span></div>
		<div class="out-of-stock" title="Нет в наличии"><span class="indicator"></span></div>
	</div>
</div>