<div class="view-header">
	<div class="form-item form-type-textfield form-item-name">
		<input autocomplete="off" type="text" id="edit-module-filter-name" name="title" value="" size="45" maxlength="128" class="form-text">
		<input type="submit" onclick="filter_edit(); return false;" id="edit-submit-commerce-customer-profiles" name="" value="Применить" class="form-submit">
	</div>
</div>
<table class="sticky-enabled table-select-processed tableheader-processed sticky-table">
    <thead>
        <tr>
            <?php foreach ($header as $item): ?>
                <th><?=$item;?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
    	<?php foreach ($items as $item): ?>
            <tr class="product-<?=$item->field_product_product_id;?> price-editor">
            	<td><?=$item->sku;?></td>
	            <td><?=$item->title;?></td>
	            <td><input type="text" name="price" onblur="edit_price(<?=$item->field_product_product_id;?>);" value="<?=$item->field_product_price_value;?>" class="form-text" /></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if(isset($_GET['text'])): ?>
<script type="text/javascript">
    jQuery().ready(function() {
      jQuery('input#edit-module-filter-name').val("<?=$_GET['text'];?>");
    });
</script>
<?php endif; ?>
<script type="text/javascript">
    jQuery('select#edit-status').change(function() {
        var status = jQuery(this).val();
        var id = jQuery(this).data('id');
		var uri = "/admin/status/"+id+"/edit";
		jQuery.ajax({
			type: "POST",
			url: uri,
			data: {status : status},
			success: function(msg){
			    alert(msg);
			}
		});
    });
	function  filter_edit() {
	    var url = 'https://techrabbit.ru/admin/price?admin=1';
		if(jQuery('input#edit-module-filter-name').val() != 0) {
			url +='&text='+jQuery('input#edit-module-filter-name').val();
		}
		window.location = url;
	};
	function  edit_price(id) {
		var price = jQuery('tr.product-'+id+' input.form-text').val();
		var uri = "/admin/price/"+id+"/edit";
		jQuery.ajax({
			type: "POST",
			url: uri,
			data: {price : price},
		});
	}
</script>