### JetBrains template
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
?>
<div class="nvg-topline">
	<div class="nvg-close"><a class="close-x" onclick="window.location.reload();">&times;</a></div>
	<div class="nvg-topline-text"><?php echo JText::_('MOD_JSHOPPING_AJAX_CART_WITH_RELATED_ADDED') ?></div>
</div> 
<div class="fullwrapper">
	<div class="nvg_car_modal_title nvg-grid">
		<div class="nvg-width-2-3" >
			<div class="nvg-grid">
				<div class="nvg-width-1-2" >
					<div class="nvg_ajcrtm_added_img"><img src="<?php echo $jshopConfig->image_product_live_path .'/'. $this->current_product->thumb_image ?>" /></div>
				</div>
				<div class="nvg-width-1-2" >
					<div class="nvg_ajcrtm_added_name"><a href="<?php echo $this->current_product->product_link ?>"><?php echo $this->current_product->name ?></a></div>
					<div class="nvg_ajcrtm_price">
						<?php print _JSHOP_PRICE?>: 
						<span class="nvg_ajcrtm_added_price">
							<?php print formatprice($this->current_product->getPriceCalculate()) ?>
						</span>
					</div>
					<div class="nvg_ajcrtm_qty">
						<?php print _JSHOP_QUANTITY?>:
						<span class="ajcrtm-quantity">
							<span class="quantityless" onclick="var qty=jQuery(this).parent().find('input[name^=quantity]');if (parseFloat(qty.val())-1 > 0) qty.val(parseFloat(qty.val())-1);qty.trigger('input')">-</span>
							<input type="text" name="quantity[<?php echo $this->product_key ?>]" class="ajcrtm-quantity-input" value="<?php echo $quantity + $this->product_in_cart ?>" oninput="ajaxCart.qty_refresh(this)" data-url="<?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=refresh', 1) ?>" />
							<span class="quantitymore" onclick="var qty=jQuery(this).parent().find('input[name^=quantity]');qty.val(parseFloat(qty.val())+1);qty.trigger('input')">+</span>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="nvg-width-1-3" >
			<div class="nvg-modal-general-cart" >
				<div class="nvg-modal-general-cart" >
					<div><?php echo JText::_('MOD_JSHOPPING_AJAX_CART_WITH_RELATED_PRODUCTS') ?> <span class="nvg_ajcrtm_format_qty"><?php echo $cart->format_qty ?></span></div>
					<div><?php echo JText::_('MOD_JSHOPPING_AJAX_CART_WITH_RELATED_SUMM') ?> <span class="nvg_ajcrtm_format_price"><?php echo $cart->format_price ?></span></div>
				</div><br/><br/>
				<div><a class="nvg_ajcrtm_btn_tocart" href="<?php if ($jshopConfig->shop_user_guest==1){print SEFLink('index.php?option=com_jshopping&controller=checkout&task=step2&check_login=1',1, 0, $jshopConfig->use_ssl);
}else{
print SEFLink('index.php?option=com_jshopping&controller=checkout&task=step2',1, 0, $jshopConfig->use_ssl);
} ?>" target="_top"><?php print _JSHOP_CHECKOUT ?></a>
				</div>
		</div>
	</div>
		<div> 
				<a class="close-continue" onclick="window.location.reload();" 
					<span>&lt;</span> <?php echo JText::_('MOD_JSHOPPING_AJAX_CART_WITH_RELATED_CONTINUE') ?>
					</a> 
			</div>
	<div class="jshop_list_product">
		<?php include_once dirname(__FILE__).'/related.php' ?>
	</div>
</div>