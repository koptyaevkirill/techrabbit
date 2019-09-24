<div class="view-header">
    <div class="form-item form-type-textfield form-item-name">
    	<p>Цены парсятся автоматически ночью по 3 сайтам. Ниже представлена таблица с ценами на этих сайтах. Для изменения цен необходимо выбрать сайт с которого брать цены и нажать на кнопку "Изменить цены".</p>
    	<div class="form-radios">
    		<div class="form-item form-type-radio">
				<input type="radio" name="parser_site" value="biggeek" class="form-radio">
				<label class="option" for="edit-user-register-0">BIGGEEK.RU</label> <a href="/admin/parser/biggeek/syn">Синхронизация</a>
			</div>
			<div class="form-item form-type-radio">
				<input type="radio" name="parser_site" value="bananastore" class="form-radio">
				<label class="option" for="edit-user-register-0">BANANASTORE.RU</label> <a href="/admin/parser/bananastore/syn">Синхронизация</a>
			</div>
			<div class="form-item form-type-radio">
				<input type="radio" name="parser_site" value="store77" class="form-radio">
				<label class="option" for="edit-user-register-0">STORE77.NET</label> <a href="/admin/parser/store77/syn">Синхронизация</a>
			</div>
		</div>
        <input type="submit" onclick="update_price(); return false;" value="Изменить цены" class="form-submit" />
        <a href="/admin/parser/all/init" class="form-submit">Загрузить цены конкурентов</a>
    </div>
    <div class="form-item form-type-textfield form-item-name">
    	<label for="type_material">Категория </label>
        <select id="type_material" name="type_material" class="form-select">
            <?php foreach ($filters as $filter): ?>
                <option value="<?=$filter->tid;?>"><?=$filter->name;?></option>
            <?php endforeach; ?>
        </select>
        <label for="course">Курс </label>
        <input autocomplete="off" type="text" id="course" name="course" value="" size="20" class="form-text">
        <input type="submit" onclick="filter_edit(); return false;" id="edit-submit-commerce-customer-profiles" name="" value="Применить" class="form-submit">
    </div>
</div>
<?php $course = 1;?>
<?php if(isset($_GET['course'])): ?>
<?php $course = $_GET['course'];?>
<script type="text/javascript">
    jQuery(window).ready(function() {
      jQuery('input#course').val("<?=$_GET['course'];?>");
    });
</script>
<?php endif; ?>
<table>
    <thead>
        <tr>
            <?php foreach ($header as $item): ?>
                <th style="text-align: center;"><?=$item;?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
    	<?php foreach ($items as $item): ?>
            <tr data-nid="<?=$item->nid;?>">
            	<td width="30%"><?=$item->sku;?> --- <?=$item->title;?></td>
            	<td align="center">
                    <?php if(array_key_exists($item->field_product_product_id, $biggeek_items)): ?>
                        <span class="item-0"><?=round($biggeek_items[$item->field_product_product_id]->price / $course, 2);?></span><br/>
                        <span>Обновлено - <?=date('d.m.Y H:i:s', $biggeek_items[$item->field_product_product_id]->updated_at);?></span>
                    <?php else: ?>
                        <span class="item-0">-</span>
                    <?php endif; ?> 
                </td>
                <td align="center">
                    <?php if(array_key_exists($item->field_product_product_id, $bananastore_items)): ?>
                        <span class="item-1"><?=round($bananastore_items[$item->field_product_product_id]->price / $course, 2);?></span><br/>
                        <span>Обновлено - <?=date('d.m.Y H:i:s', $bananastore_items[$item->field_product_product_id]->updated_at);?></span>
                    <?php else: ?>
                        <span class="item-1">-</span>
                    <?php endif; ?> 
                </td>
                <td align="center">
                    <?php if(array_key_exists($item->field_product_product_id, $store77_items)): ?>
                        <span class="item-2"><?=round($store77_items[$item->field_product_product_id]->price / $course, 2);?></span><br/>
                        <span>Обновлено - <?=date('d.m.Y H:i:s', $store77_items[$item->field_product_product_id]->updated_at);?></span>
                    <?php else: ?>
                        <span class="item-2">-</span>
                    <?php endif; ?> 
                </td>
            	<td align="center"><input type="text" name="price" onblur="edit_price(<?=round($item->field_product_product_id / $course, 2);?>, jQuery(this).val());" value="<?=round($item->commerce_price_amount / $course, 2);?>" class="form-text item-3" /></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<style type="text/css">
	table > tbody tr:hover {background-color: rgba(225, 226, 220, 0.5);}
</style>
<script type="text/javascript">
    jQuery(window).ready(function() {
        jQuery('tbody tr').each(function() {
            var biggeek_items = parseInt(jQuery(this).find('.item-0').text());
            var bananastore_items = parseInt(jQuery(this).find('.item-1').text());
            var store77_items = parseInt(jQuery(this).find('.item-2').text());
            var techrabbit = parseInt(jQuery(this).find('.item-3').val());
            sites = [biggeek_items, bananastore_items, store77_items, techrabbit];
            min = sites[3];
            for(i = 0; i < sites.length; i++) {
                if(sites[i] < min && sites[i] != 0) {
                    min = sites[i];
                }
            }
            for(i = 0; i < sites.length; i++) {
                if(sites[i] == min) {
                    jQuery(this).find('.item-'+i).addClass('text-red');
                }
            }
        });
    });
    function update_price() {
        var site_name = jQuery('input[name=parser_site]:checked').val();
        var uri = "/admin/parser/edit-price";
        if(site_name) {
            alert('Подождите!');
            jQuery.ajax({
                type: "POST",
                url: uri,
                data: {site_name: site_name},
                success: function(msg){
                    // alert(msg);
                }
            });
        }
    }
    function edit_price(id, price) {
        var uri = "/admin/price/"+id+"/edit";
        jQuery.ajax({
            type: "POST",
            url: uri,
            data: {price : price},
            success: function(msg){
                // alert(msg);
            }
        });
    }
    function filter_edit() {
        var url = '/admin/parser?admin=1';
        if(jQuery('input#course').val() != 0) {
            url +='&course='+jQuery('input#course').val();
        }
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
<style type="text/css">
    .text-red {color: red !important;}
</style>