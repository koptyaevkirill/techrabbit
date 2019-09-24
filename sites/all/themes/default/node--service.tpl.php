<div class="c-sep"></div>
<div class="main main--text u-clear">
	<div class="sidebar textside">
		<?php $service_list = node_load_multiple(array(), array('type' => 'service'));?>
    <?php echo views_embed_view('service', 'block_1');?>
	</div>
	<div class="content u-clear ">
		<?=$node->body['und'][0]['value'];?>
	</div>
</div>