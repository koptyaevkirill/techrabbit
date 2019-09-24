<?php $node = node_load($fields['nid']->raw);?>
<div class="drop-basket__item u-valign" id="product-<?=$fields['nid']->raw;?>">
    <div class="drop-basket__count">
        <?=$fields['quantity']->content;?>
    </div>
	<a href="<?=url('node/'.$fields['nid']->raw);?>" class="drop-basket__thumb">
		<img src="<?=file_create_url($node->field_image['und'][0]['uri']);?>" />
	</a>
	<?=$fields['line_item_title']->content;?>
	<div class="drop-basket__price"><?=$fields['commerce_unit_price']->content;?></div>
	<div class="drop-basket__remove c-x c-x--l js-act js-basket-remove" onclick="AmAjaxLogin.deleteItemCart(<?=$fields['nid']->raw;?>);"></div>
	<div class="no-display"><?=$fields['edit_delete']->content;?></div>
</div>