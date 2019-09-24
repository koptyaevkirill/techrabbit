<?php $node = node_load($fields['nid']->raw); ?>
<div id="product-<?=$fields['nid']->raw;?>" class="text-center checkout-product-item">
    <div class="drop-basket__count">
        <?=$fields['quantity']->content;?>
    </div>
	<a href="<?=url('node/'.$node->nid);?>" class="drop-basket__thumb">
		<img src="<?=file_create_url($node->field_image['und'][0]['uri']);?>" />
	</a>
	<?=$fields['line_item_title']->content;?>
	<div class="drop-basket__price"><?=$fields['commerce_unit_price']->content;?></div>
</div>