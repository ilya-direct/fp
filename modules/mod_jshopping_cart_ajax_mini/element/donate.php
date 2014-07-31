<?php defined( '_JEXEC' ) or die;


class JFormFieldDonate extends JFormField 

{

     function getInput()

     {
						return '<iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/shop.xml?account=41001160794290&quickpay=shop&payment-type-choice=on&writer=buyer&targets-hint=&default-sum=100&button-text=01&mail=on" width="450" height="194"></iframe>
						<iframe scrolling="no" frameborder="0" allowtransparency="true" src="//events.webmoney.ru/social/widgetDonate.aspx?type=widget&guid=89180565-5816-47d3-8649-4aea61b102ac&h=169&w=444" style="border:0px; height:169px; width:444px;"></iframe>';     
     }

}