<div class="page js-page">
	<!-- container -->
	<div class="u-wrap u-clear">
		<div class="drops">
			<?php if(strlen($page['none']['commerce_cart_cart']['#markup']) > '62'): ?>
                <?php print render($page['none']); ?>
                <script type="text/javascript">
		          jQuery(document).ready(function(){
		            jQuery('.trigg--basket .trigg__counter').text(jQuery('.line-item-summary .line-item-quantity-raw').text());
		            var total = 0;
					jQuery('.drop-basket__item').each(function() {
					    var count = parseInt(jQuery(this).find('.drop-basket__count span').text().replace(/[^0-9]/g, ""));
					    var price = parseInt(jQuery(this).find('.drop-basket__price div').text().replace(/[^0-9]/g, ""));
					    total += count * price;
					});
		            jQuery('.trigg--basket .trigg__text--basket .price, .drop-basket__bottom .drop-basket__total .price').text(total + ' ₽');
		          });
		        </script>
            <?php endif; ?>
	        <div class="drops__triggs">
	        	<div class="drops__conts skip-links" id="information-block" style="display: none;">
	        		<div class="drops__cont drops__cont--user drops__cont--user-s js-drop-cont js-drop-user is-active " style="font-size: 14px;padding: 15px;">
	        			<?php
						    $block = module_invoke('block', 'block_view', 1); 
						    echo render($block['content']); 
						?>
					</div>
            	</div>

        		<div class="drops__trigg drops__trigg trigg trigg--news u-valign js-drop-trigg js-act" data-drop-cont="newsline" onclick="AmAjaxLogin.openSubscribe();">
	            <div class="trigg__icon">
	              <svg viewBox="0 0 22 18" width="22" height="18" enable-background="new 0 0 22 18">
	                <path fill="#F78B81" d="M3 3.5h9.8v1.1H3zM3 6.8h9.8v1.1H3zM3 10.1h9.8v1.1H3zM18.6 18c-1.9 0-3.4-1.4-3.4-3.1V9.4H22v5.5c0 1.7-1.5 3.1-3.4 3.1zm-2.2-7.5v4.3c0 1.1 1 2 2.2 2 1.2 0 2.2-.9 2.2-2v-4.3h-4.4zM18.6 18H3.4C1.5 18 0 16.6 0 14.9V0h16.4v14.9c0 1.1 1 2 2.2 2V18zM1.1 1.1v13.8c0 1.1 1 2 2.2 2H16c-.5-.5-.8-1.3-.8-2V1.1H1.1z"></path>
	              </svg>
	            </div>
	          </div>
	          <div class="drops__trigg drops__trigg trigg trigg--fb u-valign js-act">
	            <div class="trigg__icon">
	              <svg class="trigg__svg trigg__svg--fb" viewBox="70 100 380 300" width="20" height="40" enable-background="new 0 0 20 40">
	              	<path fill="#F78B81" d="M256 109.3c47.8 0 53.4 0.2 72.3 1 17.4 0.8 26.9 3.7 33.2 6.2 8.4 3.2 14.3 7.1 20.6 13.4 6.3 6.3 10.1 12.2 13.4 20.6 2.5 6.3 5.4 15.8 6.2 33.2 0.9 18.9 1 24.5 1 72.3s-0.2 53.4-1 72.3c-0.8 17.4-3.7 26.9-6.2 33.2 -3.2 8.4-7.1 14.3-13.4 20.6 -6.3 6.3-12.2 10.1-20.6 13.4 -6.3 2.5-15.8 5.4-33.2 6.2 -18.9 0.9-24.5 1-72.3 1s-53.4-0.2-72.3-1c-17.4-0.8-26.9-3.7-33.2-6.2 -8.4-3.2-14.3-7.1-20.6-13.4 -6.3-6.3-10.1-12.2-13.4-20.6 -2.5-6.3-5.4-15.8-6.2-33.2 -0.9-18.9-1-24.5-1-72.3s0.2-53.4 1-72.3c0.8-17.4 3.7-26.9 6.2-33.2 3.2-8.4 7.1-14.3 13.4-20.6 6.3-6.3 12.2-10.1 20.6-13.4 6.3-2.5 15.8-5.4 33.2-6.2C202.6 109.5 208.2 109.3 256 109.3M256 77.1c-48.6 0-54.7 0.2-73.8 1.1 -19 0.9-32.1 3.9-43.4 8.3 -11.8 4.6-21.7 10.7-31.7 20.6 -9.9 9.9-16.1 19.9-20.6 31.7 -4.4 11.4-7.4 24.4-8.3 43.4 -0.9 19.1-1.1 25.2-1.1 73.8 0 48.6 0.2 54.7 1.1 73.8 0.9 19 3.9 32.1 8.3 43.4 4.6 11.8 10.7 21.7 20.6 31.7 9.9 9.9 19.9 16.1 31.7 20.6 11.4 4.4 24.4 7.4 43.4 8.3 19.1 0.9 25.2 1.1 73.8 1.1s54.7-0.2 73.8-1.1c19-0.9 32.1-3.9 43.4-8.3 11.8-4.6 21.7-10.7 31.7-20.6 9.9-9.9 16.1-19.9 20.6-31.7 4.4-11.4 7.4-24.4 8.3-43.4 0.9-19.1 1.1-25.2 1.1-73.8s-0.2-54.7-1.1-73.8c-0.9-19-3.9-32.1-8.3-43.4 -4.6-11.8-10.7-21.7-20.6-31.7 -9.9-9.9-19.9-16.1-31.7-20.6 -11.4-4.4-24.4-7.4-43.4-8.3C310.7 77.3 304.6 77.1 256 77.1L256 77.1z"></path><path fill="#F78B81" d="M256 164.1c-50.7 0-91.9 41.1-91.9 91.9s41.1 91.9 91.9 91.9 91.9-41.1 91.9-91.9S306.7 164.1 256 164.1zM256 315.6c-32.9 0-59.6-26.7-59.6-59.6s26.7-59.6 59.6-59.6 59.6 26.7 59.6 59.6S288.9 315.6 256 315.6z"></path><circle fill="#F78B81" cx="351.5" cy="160.5" r="21.5"></circle>
	              </svg>
	            </div>
	            <a href="https://www.instagram.com/techrabbit.ru/" class="trigg__link" target="_blank" onclick="ga('send', 'event', 'Top_Row', 'FB link', 'External')"></a>
	          </div>
	          <div class="drops__trigg trigg trigg--user u-valign js-drop-trigg js-act login-link" onclick="AmAjaxLogin.openInfoBlock();">
	          	<div class="trigg__icon">
	              <img src="/<?=$directory?>/images/icon-truck.png" style="height: 25px;width: auto;" />
	            </div>
	          	<div class="trigg__text skip-account"><span class="top-login">Информация о доставке</span></div>
	          	<div class="trigg__arr c-arr js-act js-drop-arr"></div>
	          </div>
	          <div class="top-cart-qty drops__trigg trigg trigg--basket u-valign js-drop-trigg js-act" data-drop-cont="basket" onclick="AmAjaxLogin.openCart();">
	            <div class="trigg__icon">
	              <svg viewBox="0 0 17 21" width="17" height="21" enable-background="new 0 0 17 21">
	                  <path fill="#F78B81" d="M12.4 21L.5 19.9c-.3 0-.5-.3-.5-.5V6.3c0-.3.2-.5.5-.5l11.9-1.1c.2 0 .3 0 .4.1.1.1.2.3.2.4v15.3c0 .2-.1.3-.2.4-.1.1-.3.1-.4.1zM1.1 18.9l10.8 1V5.8l-10.8 1v12.1zM1.5 5.9C1.5 2.7 3.6.2 6.3.2c2.4 0 4.5 2.2 4.7 5l-1.1.1c-.2-2.3-1.8-4-3.6-4-2 0-3.7 2.1-3.7 4.6H1.5h.6-.6zM4.8 5.9C4.8 2.6 7 0 9.6 0c2.4 0 4.5 2.2 4.7 5.2l-1.1.1c-.2-2.4-1.8-4.2-3.6-4.2-2 0-3.7 2.2-3.7 4.8H4.8h.6-.6zM12.4 21c-.1 0-.2 0-.3-.1-.1-.1-.2-.3-.2-.4V5.2c0-.2.1-.3.2-.4.1-.1.3-.1.5-.1l4 1.1c.2 0 .4.2.4.5v13.1c0 .2-.2.5-.4.5l-4 1.1h-.2zM13 5.9v13.8l2.9-.8V6.7L13 5.9z" />
	              </svg>
	              <div class="trigg__counter"><span>0</span></div>
	            </div>
	            <div class="trigg__text trigg__text--basket">
	                <span><span class="price">0 ₽</span></span>
	            </div>
	          </div>
	          <div class="drops__trigg trigg trigg--chat u-valign js-drop-trigg js-act header-phones" data-drop-cont="chat">
	            <div class="trigg__icon">
	              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" enable-background="new 0 0 19 19">
	                <path fill="#F78B81" stroke="#F78B81" stroke-width=".6" stroke-miterlimit="10" d="M17.472 14.656v.09c-.09.36-.27.725-.994 1.446-.813.81-1.534 1.083-2.438 1.083-.724 0-1.446-.18-2.44-.632-2.53-1.085-5.512-4.064-5.512-4.064S3.106 9.595 2.022 6.975c-.994-2.44-.542-3.614.542-4.698.723-.723 1.084-.904 1.445-.994h.09c.18-.09.27-.09.36-.09 0 0 .092 0 .272.18.27.272 1.265 1.897 1.897 2.8.18.272.36.543.45.634.092.09.182.18.092.27 0 .09-.09.18-.27.272-.452.27-1.447.903-1.628 1.445-.09.18 0 .27 0 .452.27.542 2.71 2.89 2.982 3.162.27.27 2.62 2.62 3.162 2.98.09 0 .18.092.27.092.633 0 1.268-.997 1.628-1.627.18-.36.27-.36.542-.18.09.09.362.27.722.45.903.633 2.53 1.717 2.803 1.897.27.18.27.272.09.634m.27-.995c-.27-.27-1.808-1.264-2.89-1.985-.273-.18-.544-.362-.725-.45-.18-.094-.36-.183-.54-.183-.454 0-.725.452-.725.633-.452.904-.903 1.355-1.175 1.355-.36-.183-1.987-1.807-3.07-2.893-.996-1.084-2.622-2.71-2.803-3.07v-.092c.09-.27.633-.722 1.355-1.084.27-.18.542-.36.542-.632.09-.18 0-.45-.18-.723-.09 0-.272-.27-.453-.632-.63-.903-1.715-2.53-1.986-2.8-.09-.27-.27-.45-.633-.45-.18 0-.27.09-.54.09h-.09c-.543.18-.904.36-1.627 1.082C1.12 2.91.305 4.265 1.57 7.247c1.084 2.62 4.066 5.6 4.156 5.69.09.093 3.072 3.073 5.692 4.158.993.45 1.808.632 2.62.632 1.355 0 2.168-.632 2.71-1.264.723-.724.903-1.175 1.086-1.627v-.09c.27-.36.452-.723-.09-1.085"/>
	              </svg>
	            </div>
	            <div class="trigg__text"><a href="tel:+7(994)2222433">+7 (994) 222-2-433</a></div>
	            <div class="header_socials mob-hidden">
        			<a href=""><img src="/sites/all/themes/default/images/viber.png"></a>
        			<a href="https://tele.click/TechRabbitHelp_bot"><img src="/sites/all/themes/default/images/telegram.png"></a>
        			<a href="https://api.whatsapp.com/send?phone=79942222433"><img src="/sites/all/themes/default/images/whatsapp.png"></a>
        		</div>
        		<div class="header_worktime mob-hidden">
        			<div>Пн-пт с 10:00 до 21:00</div>
        			<div>Сб-вс с 11:00 до 19:00</div>
        		</div>
	          </div>
	          <div class="trigg--search u-valign js-act js-search-trigg u-mob-hide" data-drop-cont="newsline" onclick="AmAjaxLogin.openSearch();">
	            <div class="trigg__icon">
	              <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" enable-background="new 0 0 21 21">
	                <path fill="#F78B81" d="m18.2 21c-.2 0-.4-.1-.6-.2l-4.5-4.5c-1.3.8-2.9 1.2-4.5 1.2-4.7 0-8.6-3.9-8.6-8.8 0-4.8 3.9-8.7 8.7-8.7 4.8 0 8.7 3.9 8.7 8.7 0 1.5-.4 3-1.1 4.3l4.5 4.6c.1.1.2.4.2.6 0 .4-.3 1-.7 1.4l-.7.7c-.5.5-1 .7-1.4.7m0-.9c.1 0 .4-.1.8-.5l.7-.7c.3-.3.5-.7.4-.8l-5-5 .2-.3c.8-1.2 1.2-2.7 1.2-4.1 0-4.3-3.5-7.9-7.8-7.9-4.3 0-7.8 3.5-7.8 7.9 0 4.3 3.5 7.9 7.8 7.9 1.5 0 3-.4 4.3-1.3l.3-.2 4.9 5m-9.5-5.4c-3.3 0-5.9-2.7-5.9-6 0-3.3 2.7-6 5.9-6 3.3 0 5.9 2.7 5.9 6 0 3.3-2.6 6-5.9 6m0-11.1c-2.8 0-5.1 2.3-5.1 5.1 0 2.8 2.3 5.1 5.1 5.1 2.8 0 5.1-2.3 5.1-5.1-.1-2.8-2.3-5.1-5.1-5.1"/>
	              </svg>
	            </div>
	          </div>
	        </div>
	    </div>
	    <div id="top-phones">
	    	<div class="trigg__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" enable-background="new 0 0 19 19">
                <path fill="#F78B81" stroke="#F78B81" stroke-width=".6" stroke-miterlimit="10" d="M17.472 14.656v.09c-.09.36-.27.725-.994 1.446-.813.81-1.534 1.083-2.438 1.083-.724 0-1.446-.18-2.44-.632-2.53-1.085-5.512-4.064-5.512-4.064S3.106 9.595 2.022 6.975c-.994-2.44-.542-3.614.542-4.698.723-.723 1.084-.904 1.445-.994h.09c.18-.09.27-.09.36-.09 0 0 .092 0 .272.18.27.272 1.265 1.897 1.897 2.8.18.272.36.543.45.634.092.09.182.18.092.27 0 .09-.09.18-.27.272-.452.27-1.447.903-1.628 1.445-.09.18 0 .27 0 .452.27.542 2.71 2.89 2.982 3.162.27.27 2.62 2.62 3.162 2.98.09 0 .18.092.27.092.633 0 1.268-.997 1.628-1.627.18-.36.27-.36.542-.18.09.09.362.27.722.45.903.633 2.53 1.717 2.803 1.897.27.18.27.272.09.634m.27-.995c-.27-.27-1.808-1.264-2.89-1.985-.273-.18-.544-.362-.725-.45-.18-.094-.36-.183-.54-.183-.454 0-.725.452-.725.633-.452.904-.903 1.355-1.175 1.355-.36-.183-1.987-1.807-3.07-2.893-.996-1.084-2.622-2.71-2.803-3.07v-.092c.09-.27.633-.722 1.355-1.084.27-.18.542-.36.542-.632.09-.18 0-.45-.18-.723-.09 0-.272-.27-.453-.632-.63-.903-1.715-2.53-1.986-2.8-.09-.27-.27-.45-.633-.45-.18 0-.27.09-.54.09h-.09c-.543.18-.904.36-1.627 1.082C1.12 2.91.305 4.265 1.57 7.247c1.084 2.62 4.066 5.6 4.156 5.69.09.093 3.072 3.073 5.692 4.158.993.45 1.808.632 2.62.632 1.355 0 2.168-.632 2.71-1.264.723-.724.903-1.175 1.086-1.627v-.09c.27-.36.452-.723-.09-1.085"/>
              </svg>
            </div>
            <div class="trigg__text"><a href="tel:+7(939)2222433">+7 (939) 222-2-433</a></div>
            <div class="header_socials">
    			<a href=""><img src="/sites/all/themes/default/images/viber.png"></a>
    			<a href="https://tele.click/TechRabbitHelp_bot"><img src="/sites/all/themes/default/images/telegram.png"></a>
    			<a href="https://api.whatsapp.com/send?phone=79942222433"><img src="/sites/all/themes/default/images/whatsapp.png"></a>
    		</div>
    		<div class="header_worktime">
    			<div>Пн-пт с 10:00 до 21:00</div>
    			<div>Сб-вс с 11:00 до 19:00</div>
    		</div>
	    </div>
      	<div class="newsline js-drop-newsline" id="subscribe-form">
	        <form class="newsline__form u-valign" action="" method="post" id="amajaxlogin-subscribe-form" onsubmit="AmAjaxLoginObj.subscribe(document.getElementById('amajaxlogin-subscribe-form')); return false;">
	          <span class="newsline__text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Получайте новости о скидках по электронной почте.</span>
	          <input type="email" name="email" placeholder="E-mail адрес" class="newsline__input js-act validate-email required-entry">
	          <div class="newsline__submit c-arr js-act" onclick="AmAjaxLoginObj.subscribe(document.getElementById('amajaxlogin-subscribe-form'));"></div>
	        </form>
	          <div class="newsline__close c-x c-x--l js-act js-newsline-close" onclick="AmAjaxLoginObj.hideMessage();"></div>
	    </div>
	    <div id="top-search" class="top-search js-top-search">
	    	<div class="top-search__filter-trigger js-top-search-filter-trigger"><div class="top-search__navicon"></div></div>
	        <form class="top-search__form" id="search_mini_form" method="get" action="/search/node/type:product_display ">
	          <input type="search" id="search" name="" value="" class="top-search__input js-top-search-input required-entry" maxlength="128" autocomplete="off">
	          <input type="submit" class="top-search__submit" value="">
	        </form>
	        <div id="search_autocomplete" class="search-autocomplete" style="display: none;"></div>
	        <script type="text/javascript">
	          jQuery(document).ready(function($){
	            jQuery('#search_mini_form').submit(function(){
	              window.location.pathname = jQuery(this).attr('action')+jQuery(this).find('input#search').val();
	              return false;
	            });
	            jQuery('.mobile-menu .level-1 > .cat-item').click(function(){
                    $('.mobile-menu .level-1 > .level-2').slideUp();
                    if ($(this).parent().find('.level-2').is(":visible")){
                        $(this).parent().find('.level-2').slideUp();
                    } else {
                        $(this).parent().find('.level-2').slideToggle();
                    }
                    return false;
                });
                jQuery('.mobile-menu .level-2 > li > a.has-child').click(function(){
                    $('.mobile-menu .level-2 li > .level-3').slideUp();
                    if ($(this).parent().find('.level-3').is(":visible")){
                        $(this).parent().find('.level-3').slideUp();
                    } else {
                        $(this).parent().find('.level-3').slideToggle();
                    }
                    return false;
                });
	          });
	        </script>
	    </div>
	    <!-- menu -->
		<div class="nav u-clear">
			<div class="nav__logo">
			  <img src="/<?=$directory;?>/images/logo-1.png" class="nav__img" />
			  <a href="<?=$front_page;?>" class="nav__logo-link"></a>
			</div>
			<div class="nav__search-trigg js-search-trigg u-mob-show"></div>
			<div class="nav__trigger js-nav-trigger js-act u-mob-show">
			    <div class="nav__navicon u-trans"></div>
			</div>
			<?php if ($main_menu): ?>
		      <ul class="nav__menu u-clear u-valign js-nav-menu u-trans">
		      	<li class="nav__item js-act u-mob-show"><a href="/" class="nav__link">Главная</a></li>
		      <?php foreach($main_menu as $item) :?>
		      	<?php isset($item['attributes']['class'][0]) ? $is_active = ' is-active' : $is_active = '';?>
		      	<li class="nav__item js-act<?=$is_active;?>">
		      		<?php $color = $item['href'] == 'node/659' ? '#FF4E55': 'inherit';?>
				    <a href="<?=url($item['href']);?>" class="nav__link" style="color: <?=$color;?>"><?=$item['title'];?></a>
				</li>
		      <?php endforeach; ?>
		      </ul>
		    <?php endif; ?>
		    <div class="u-mob-show nav__menu u-clear u-valign js-nav-menu u-trans mobile-menu">
		    	<?php get_menu('menu-menu-category', true); ?>
		    </div>
		</div>
		<!-- menu end  -->
		<!-- content -->
    	<?php print render($page['content']); ?>
    	<?php $menu_tree = get_menu_tree('menu-menu-category'); ?>
		<!-- content end -->
	</div>
	<!-- container end -->
	<!-- footer -->
    <div class="footer u-clear">
      <div class="u-wrap">
        <div class="footer__top">
        	<div class="content__col col-6 text-center">
        		<a href="<?=$front_page;?>"><img src="/<?=$directory;?>/images/logo-1.png" style="max-width: 270px;" /></a>
        		<div class="footer_phone mt15"><a href="tel:+7 (994) 222-2-433">+7 (994) 222-2-433</a></div>
        		<div class="footer_worktime">Ежедневно с 10:00 до 21:00</div>
        		<div class="footer_socials mt15">
        			<a href=""><img src="/<?=$directory;?>/images/viber.png" /></a>
        			<a href="https://tele.click/TechRabbitHelp_bot"><img src="/<?=$directory;?>/images/telegram.png" /></a>
        			<a href="https://api.whatsapp.com/send?phone=79942222433"><img src="/<?=$directory;?>/images/whatsapp.png" /></a>
        		</div>
        	</div>
			<div class="content__col col-3 category-item pt7em">
              	<a href="<?=url($menu_tree['content']['598']['#href']);?>"><h4 class="footer__title"><?=$menu_tree['content']['598']['#title'];?></h4></a>
      			<a href="<?=url($menu_tree['content']['613']['#href']);?>"><h4 class="footer__title"><?=$menu_tree['content']['613']['#title'];?></h4></a>
      			<a href="<?=url($menu_tree['content']['606']['#href']);?>"><h4 class="footer__title"><?=$menu_tree['content']['606']['#title'];?></h4></a>
      			<a href="<?=url($menu_tree['content']['615']['#href']);?>"><h4 class="footer__title"><?=$menu_tree['content']['615']['#title'];?></h4></a>
      			<a href="<?=url($menu_tree['content']['614']['#href']);?>"><h4 class="footer__title"><?=$menu_tree['content']['614']['#title'];?></h4></a>
      			<a href="<?=url($menu_tree['content']['616']['#href']);?>"><h4 class="footer__title"><?=$menu_tree['content']['616']['#title'];?></h4></a>
            </div>
            <div class="content__col col-3 category-item pt7em">
              	<a href="<?=url('node/41');?>"><h4 class="footer__title">Оплата и доставка</h4></a>
      			<a href="<?=url('node/307');?>"><h4 class="footer__title">Trade-in</h4></a>
      			<a href="<?=url('node/40');?>"><h4 class="footer__title">Гарантия</h4></a>
            </div>
        </div>
        <div class="footer__bottom u-clear">
          <div class="u-flex">
            <p class="footer__text">Сайт носит сугубо информационный характер и не является публичной офертой, определяемой Статьей 437 (2) ГК РФ.</p>
            <p class="footer__text">Все права защищены. © Интернет магазин Techrabbit.ru, <?=date('Y');?></p>
          </div>
        </div>
      </div>
    </div>
    <!-- footer end -->
    <div id="ajax-loader"></div>
</div>
<?php if(!$is_front): ?>
<script type="text/javascript">
	jQuery(window).ready(function() {
		if (jQuery(window).width() <= '996') { 
			AmAjaxLogin.openSearch();
		}
	});
</script>
<?php endif; ?>