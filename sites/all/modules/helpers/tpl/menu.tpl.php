
<div class="prodside__cats">
	<?php foreach($menu['content'] as $index => $item): ?>
		<?php if(is_numeric($index)): ?>
			<?php isset($item['#localized_options']['attributes']['class'][0]) ? $is_active = 'is-active' : $is_active = ''; ?>
			<div class="prodside__cat js-prodside-cat js-act <?=$is_active;?>">
			    <div class="prodside__cat-toggle js-cat-toggle level-1 js-act <?=$is_active;?>">
					<div class="cat-item <?=$is_active;?>">
					    <?php if($mobile): ?>
					        <a href="javascript:void(0);" class="has-child"><span><?=$item['#title']?></span><span class="c-arr prodside__arr"></span></a>
					    <?php else: ?>
					        <a href="<?=url($item['#href']);?>"><span><?=$item['#title']?></span><span class="c-arr prodside__arr"></span></a>
					    <?php endif; ?>
					</div>
					<?php if(!empty($item['#below']) && count($item['#below']) > 0): ?>
						<?php !empty($is_active) ? $is_open = 'is-open' : $is_open = '';?>
						<ul class="prodside__cat-list js-cat-list level-2 <?=$is_open;?>">
							<?php foreach($item['#below'] as $index_2 => $below): ?>
							    <?php if(is_numeric($index_2)): ?>
								<li class="prodside__cat-item">
									<?php if(!empty($below['#below']) && count($below['#below']) > 0): ?>
									    <?php if($mobile): ?>
                					        <a href="javascript:void(0);" class="has-child"><span><?=$below['#title']?></span></a>
                					    <?php else: ?>
                					        <a href="<?=url($below['#href']);?>"><span><?=$below['#title']?></span></a>
                					    <?php endif; ?>
                						<?php array_search('active-trail', $below['#attributes']['class']) ? $is_open_3 = 'is-open' : $is_open_3 = '';?>
                						<ul class="prodside__cat-list js-cat-list level-3 <?=$is_open_3;?>">
                							<?php foreach($below['#below'] as $index_3 => $below_3): ?>
                							    <?php if(is_numeric($index_3)): ?>
                								<li class="prodside__cat-item">
                									<a href="<?=url($below_3['#href']);?>"><span><?=$below_3['#title']?></span></a>
                								</li>
                								<?php endif; ?>
                							<?php endforeach; ?>
                						</ul>
            						<?php else: ?>
            						    <a href="<?=url($below['#href']);?>"><span><?=$below['#title']?></span></a>
                					<?php endif; ?>
								</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
			    </div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php if($mobile): ?>
		<div class="prodside__cat js-prodside-cat js-act">
		    <div class="prodside__cat-toggle js-cat-toggle js-act <?=$is_active;?>">
				<div class="cat-item">
		        	<a href="<?=url('node/659');?>" class="nav__link" style="color: #FF4E55"><span>Скидки</span><span class="c-arr prodside__arr"></span></a>
				</div>
		    </div>
		</div>
		<div class="prodside__cat js-prodside-cat js-act">
		    <div class="prodside__cat-toggle js-cat-toggle js-act <?=$is_active;?>">
				<div class="cat-item">
		        	<a href="<?=url('node/40');?>" class="nav__link"><span>Гарантия</span><span class="c-arr prodside__arr"></span></a>
				</div>
		    </div>
		</div>
		<div class="prodside__cat js-prodside-cat js-act">
		    <div class="prodside__cat-toggle js-cat-toggle js-act <?=$is_active;?>">
				<div class="cat-item">
		        	<a href="<?=url('node/1');?>" class="nav__link"><span>Контакты</span><span class="c-arr prodside__arr"></span></a>
				</div>
		    </div>
		</div>
	<?php endif; ?>
</div>
