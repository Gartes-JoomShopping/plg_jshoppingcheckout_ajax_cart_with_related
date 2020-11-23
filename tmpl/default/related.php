<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Nevigen.com
* @website http://nevigen.com/
* @email support@nevigen.com
* @copyright Copyright © Nevigen.com. All rights reserved.
* @license Proprietary. Copyrighted Commercial Software
* @license agreement http://nevigen.com/license-agreement.html
**/

defined('_JEXEC') or die;

if (!count($products_related)) {
	return;
}
?>
<div class="relatedincartheader"><?php echo JText::_('MOD_JSHOPPING_AJAX_CART_WITH_RELATED_MAYBE_NEED') ?></div>

<div class="cart_related_general_list">
	<?php foreach ($products_related as $category_id=>$products_category) { ?>
		<div class="nvg-ajcrtm-rlts-list-string">
			<div class="nvg-ajcrtm-rlts-list-category-name">
				<?php if ($params->link_category) { ?>
				<a class="nvg_car_category_link" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=category&task=view&category_id='.$category_id, 1) ?>">
				<?php } ?>
				<?php echo $all_categorys[$category_id]->name ?>
				<?php if ($params->link_category) { ?>
				</a>
				<?php } ?>
			</div>
			<div class="nvg-ajcrtm-rlts-list-category_bloсk">
				<?php foreach ($products_category as $product) { ?>
					<div class="cart_related_product_wrapper">
						<div class="cart_related_product_image">
							<a class="nvg-normal" href="<?php echo $product->product_link ?> "><img class="nvg-ajcrtm-rlts-list-img" src="<?php echo $product->image ?>" /></a>
						</div>
						<div class="cart_related_product_name">
							<a class="nvg-normal" href="<?php echo $product->product_link ?> "><?php echo $product->name ?></a>
						</div>
						<div class="cart_related_product_price">
							<?php echo formatprice($product->product_price) ?></a>
						</div>
						<?php if ($jshopConfig) { ?>
						<div class="cart_related_product_qty">
							<div class="ajcrtm-quantity">
								<span class="quantityless" onclick="var qty=jQuery(this).parent().find('input[name=quantity]');if (parseFloat(qty.val())-1 > 0) qty.val(parseFloat(qty.val())-1)">-</span>
								<input type="text" name="quantity" class="incart-releated-prod-qty" value="<?php echo $jshopConfig->min_count_order_one_product > 0 ? $jshopConfig->min_count_order_one_product : 1 ?>" />
								<span class="quantitymore" onclick="var qty=jQuery(this).parent().find('input[name=quantity]');qty.val(parseFloat(qty.val())+1)">+</span>
							</div>
						</div>
						<?php } ?>
						<div class="cart_related_product_link buttons">
							<a class="button_buy nvg_ajcrtm_btn_tocart" href="<?php echo $product->buy_link ?>"><?php echo JText::_('MOD_JSHOPPING_AJAX_CART_WITH_RELATED_BUY') ?></a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</div>