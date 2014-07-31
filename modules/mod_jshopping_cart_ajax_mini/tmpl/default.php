<?php 
/**
* @version      2.0.5 25.02.2014
* @author       Brooksus
* @package      Jshopping
* @copyright    Copyright (C) 2013 brooksite.ru. All rights reserved.
* @license      The MIT License (MIT)
*/
defined('_JEXEC') or die('Restricted access');
$document = JFactory::getDocument(); 
?>
<div id="jshop_module_cart_mini" class="mycart_wrapp <?php if ($show_added_to_cart=='0') print "show_added_to_cart";?> <?php if($jshopConfig->product_attribut_first_value_empty=="0") print "attr_noempty";?>">
<div>
  <span class="mycart_mini_txt" title="<?php print JText::_('PRODUCTS_AT_CART_MINI') ?> <?php print $cart->count_product;?> <?php print JText::_('PRODUCTS_SUMM_MINI') ?> <?php print formatprice($cart->getSum(0,1))?>"><a href = "<?php print SEFLink('index.php?option=com_jshopping&controller=cart',1)?>" target="_top"><?php print $cart->count_product;?></a></span>
      <div class="hidden_for_cart">
          <span class="currency_code"><?php print $jshopConfig->currency_code ?></span>
          <span class="lang_productatcart"><?php print JText::_('PRODUCT_AT_CART_MINI') ?></span>
          <span class="lang_productsatcart"><?php print JText::_('PRODUCTS_AT_CART_MINI') ?></span>
          <span class="lang_productssumm"><?php print JText::_('PRODUCTS_SUMM_MINI') ?></span>
      </div>
  </div>
 					<?php if ($show_added_to_cart=='1'){ ?>
      <div id="inlineContent_minicart" class="defaultDOMWindow" style=" display:none;"> 
      <p class="modal_header"><?php print JText::_('PRODUCT_AT_CART_MINI') ?></p> 
      <p class="modal_text"><?php print JText::_('PRODUCTS_AT_CART_MINI') ?> <span class="modal_quantity"></span> <?php print JText::_('PRODUCTS_SUMM_MINI') ?> <span class="modal_summ"></span></p>
      <p class="modal_anchor">
      <span class="modal_to_cart">
      <a href = "<?php print SEFLink('index.php?option=com_jshopping&controller=cart',1)?>" target="_top"><?php print JText::_('GO_TO_CART_MINI') ?></a></span>
      <span class="modal_checkout"><a href="<?php if ($jshopConfig->shop_user_guest==1){print SEFLink('index.php?option=com_jshopping&controller=checkout&task=step2&check_login=1',1, 0, $jshopConfig->use_ssl);
      }else{
          print SEFLink('index.php?option=com_jshopping&controller=checkout&task=step2',1, 0, $jshopConfig->use_ssl);
      } ?>" target="_top"><?php print _JSHOP_CHECKOUT ?></a>
      </span>
      </p>
      <p><a href="#" class="closeDOMWindow" target="_top"><?php print _JSHOP_BACK_TO_SHOP ?></a></p>
      
      </div>
      <?php } ?>
      <?php if ($show_added_to_cart=='0'){ ?>
      <div id="error_inlineContent_minicart" class="errorDOMWindow" style=" display:none;">
      <span class="modal_err"></span>
      <p><a href="#" class="closeDOMWindow" target="_top"><?php print _JSHOP_BACK_TO_SHOP ?></a></p>
      </div>
      <?php } ?>
</div>