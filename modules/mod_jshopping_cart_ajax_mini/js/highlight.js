jQuery(document).ready(function() {
if (jQuery('#system-message, .system-message').is(":contains('Пожалуйста выберите параметры')")){
jQuery("div.jshop_prod_attributes").addClass("highlight");
jQuery("html,body").scrollTop(jQuery('#system-message, .system-message').offset().top);
}});
