<div class="view-header">
    <div class="form-item form-type-textfield form-item-name">
        <label for="type_material">Категория </label>
        <select id="type_material" name="type_material" class="form-select">
            <?php foreach ($filters as $filter): ?>
                <option value="<?=$filter->tid;?>"><?=$filter->name;?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" onclick="filter_edit(); return false;" id="edit-submit-commerce-customer-profiles" name="" value="Применить" class="form-submit">
    </div>
</div>
<table>
    <thead>
        <tr>
            <?php foreach ($header as $item): ?>
                <th><?=$item;?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
    	<?php foreach ($items as $item): ?>
            <tr data-nid="<?=$item->product_id;?>">
            	<td width="30%"><?=$item->sku;?> --- <?=$item->title;?></td>
            	<td align="center">
                    <select id="select-prod-<?=$item->product_id;?>" onchange="edit_id(<?=$item->product_id;?>);" >
                        <option>Выберите товар</option>
                    <?php foreach ($parset_items_app_minsk as $app_minsk_item): ?>
                        <?php $selected = $app_minsk_item->cpid == $item->product_id ? 'selected' : ''; ?>
                        <option value="<?=$app_minsk_item->id;?>" <?=$selected;?>> <?=$app_minsk_item->product_name;?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    function edit_id(id) {
        var p_id = jQuery('#select-prod-'+id+'').val();
        var uri = "/admin/parser/edit-id";
        jQuery.ajax({
            type: "POST",
            url: uri,
            data: {id: p_id, cpid: id},
            success: function(msg){
                alert(msg);
            }
        });
    }
    function filter_edit() {
        var url = '/admin/parser/<?=$type;?>/syn?admin=1';
        if(jQuery('select#type_material').val() != 0) {
            url +='&tid='+jQuery('select#type_material').val();
        }
        window.location = url;
    };
</script>
<?php if(isset($_GET['tid'])): ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery('select#type_material option[value="<?=$_GET['tid'];?>"]').attr("selected", true);
    });
</script>
<?php endif; ?>