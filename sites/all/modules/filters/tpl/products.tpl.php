<div class="products__split products__split--first odd"></div>
<div class="products__split products__split--second even"></div>
<?php if(!empty($nodes)): ?>
	<?php foreach($nodes as $node): ?>
	<?php $node = node_load($node->nid);?>
	<div class="products__item products-item js-products-item u-clear item">
		<div>
		<a id="product-image-<?=$node->nid;?>" href="<?=url('node/'.$node->nid);?>"  title="<?=$node->title;?>" class="product-link products-item__img">
		  <img src="<?=file_create_url($node->field_image['und'][0]['uri']);?>" alt="<?=$node->title;?>" />
		</a>
		</div>
		<a href="<?=url('node/'.$node->nid);?>" class="product-link products-item__desc">
			<?php if($node->field_is_new['und'][0]['value'] == 1): ?>
				<span class="products-item__new-label">Новинка!</span>
			<?php endif; ?>
			<span class="products-item__text"><?=$node->title;?></span>
			<span class="products-item__price">
				<div class="min-price-box price-box">
					<span class="price" id="product-minimal-price-<?=$node->nid;?>"><?=number_format($node->field_product_price['und'][0]['value'], 0, ',', ' ');?> ₽</span>
				</div>
			</span>
		</a>
		<?php $row->commerce_product_field_data_field_product_status ? $stock = '' : $stock = '';?>
		<div class="stock-info <?=$stock;?>" id="stock-info-<?=$node->nid;?>">
			<div class="in-stock" title="В наличии"><span class="indicator"></span></div>
			<div class="out-of-stock" title="Нет в наличии"><span class="indicator"></span></div>
		</div>
	</div>
<?php endforeach; ?>
<?php else: ?>
	<p>Ничего не найдено</p>
<?php endif; ?>