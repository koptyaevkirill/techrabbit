<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 *
 * @ingroup themeable
 */
?>
<!-- search-content -->
<div class="main u-clear">
    <div class="sidebar sidebar--prodside prodside js-prodside">
    	<?php get_menu('menu-menu-category'); ?>
	</div>
	<div class="content content__product product u-clear">
    	<div class="category-products">
			<div class="top-toolbar">
				<div class="products__top products-top u-clear"><h1 class="products-top__title"><?php print t('Search results');?></h1></div>
			</div>
			<div class="products__items is-grid u-clear js-products-items products-list" id="products-list">
				<?php if ($search_results): ?>
					<div class="products__split products__split--first odd"></div>
					<div class="products__split products__split--second even"></div>
					<?php print $search_results; ?>
				<?php else : ?>
					<h2><?php print t('Your search yielded no results');?></h2>
			  		<?php print search_help('search#noresults', drupal_help_arg()); ?>
				<?php endif; ?>
			</div>
			<div class="toolbar-bottom">
		        <div class="toolbar">
		          <?php if ($pager): ?>
		            <div class="products__pagination pagination u-clear">
		              <?php print $pager; ?>
		            </div>
		          <?php endif; ?>
		        </div>
	      	</div>
		</div>
    </div>
</div>
<!-- search-content end -->