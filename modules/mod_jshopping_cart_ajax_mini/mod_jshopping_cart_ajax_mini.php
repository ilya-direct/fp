<?php
defined('_JEXEC') or die('Restricted access');
error_reporting(E_ALL & ~E_NOTICE); 

if (!file_exists(JPATH_SITE.DS.'components'.DS.'com_jshopping'.DS.'jshopping.php')){
    JError::raiseError(500,"Please install component \"joomshopping\"");
}

jimport('joomla.application.component.model');

require_once (JPATH_SITE.DS.'components'.DS.'com_jshopping'.DS."lib".DS."factory.php"); 
require_once (JPATH_SITE.DS.'components'.DS.'com_jshopping'.DS."lib".DS."functions.php");

JSFactory::loadCssFiles();
JSFactory::loadLanguageFile();
$jshopConfig = JSFactory::getConfig();

JModel::addIncludePath(JPATH_SITE.DS.'components'.DS.'com_jshopping'.DS.'models');
$cart = JModel::getInstance('cart', 'jshop');
$cart->load("cart");
$product = JTable::getInstance('product', 'jshop');
//PARAMS
$add_jq = $params->get('add_jq',1);
$add_jq_noconflict = $params->get('add_jq_noconflict',1);
$auto_add_jq = $params->get('auto_add_jq',1);
$add_jq_migrate = $params->get('add_jq_migrate',1);
$highlight_attr = $params->get('highlight_attr',1);
$show_added_to_cart = $params->get('show_added_to_cart',1);
////Add Style Script
$document = JFactory::getDocument(); 
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/style-ajax.css');
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/default.css');
if ($add_jq=='2'){
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/jquery-1.6.2.min.js');
}
if ($auto_add_jq=='1'){
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/autoadd_jq.js');
}
if ($add_jq_migrate=="2")
{
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/jquery-migrate-1.2.1.min.js');
}
if ($add_jq_noconflict=='2' && $auto_add_jq!='1'){
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/jquery-noconflict.js');
}
//Highlight
if ($highlight_attr=='1') {
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/highlight.css');
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/highlight.js');
}
//Mini Modal
//if ($show_added_to_cart=='1'){
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/jqmodal.css');
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/jqmodal.js');
//}
//AJAX
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/ajax.js');
require(JModuleHelper::getLayoutPath('mod_jshopping_cart_ajax_mini')); ?>