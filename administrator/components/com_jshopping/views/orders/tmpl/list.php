<?php
	defined('_JEXEC') or die();
	$rows = $this->rows;
	$lists = $this->lists;
	$pageNav = $this->pageNav;
	$jshopConfig = JSFactory::getConfig();
	$limitstart = JRequest::getVar( 'limitstart' ,'');
	$limit = JRequest::getVar( 'limit', 10);
	$status_id = JRequest::getVar( 'status_id', '');
	$adv_string = '&limitstart='.$limitstart.'&limit='.$limit.'&status_id='.$status_id.'&client_id='.$this->client_id;
?>
<form name="adminForm" method="post" action="index.php?option=com_jshopping&controller=orders">
 <table width="100%" style="padding-bottom:5px;">
   <tr>
      <td align="right">
        <?php print _JSHOP_ORDER_STATUS.": ".$lists['changestatus'];?>&nbsp;&nbsp;&nbsp;
        <?php print _JSHOP_NOT_FINISHED.": ".$lists['notfinished'];?>&nbsp;&nbsp;&nbsp;
        <?php print _JSHOP_DATE.": ".$lists['year']." : ".$lists['month']." : ".$lists['day'];?>&nbsp;&nbsp;&nbsp;
        <input type = "text" name = "text_search" value = "<?php echo htmlspecialchars($this->text_search);?>" />&nbsp;&nbsp;&nbsp;
        <input type = "submit" class = "button" value = "<?php echo _JSHOP_SEARCH;?>" />
      </td>
   </tr>
 </table>
 <table class = "adminlist" width = "100%">
 <thead>
   <tr>
     <th width = "20">
       #
     </th>
     <th width = "20">
       <input type="checkbox" onclick="checkAll(<?php echo count($rows)?>)" value="" name="toggle" />
     </th>
     <th width = "20">
       <?php echo JHTML::_('grid.sort', _JSHOP_NUMBER, 'order_number', $this->filter_order_Dir, $this->filter_order)?>
     </th>
     <th>
       <?php echo JHTML::_('grid.sort', _JSHOP_USER, 'name', $this->filter_order_Dir, $this->filter_order)?>
     </th>
     <th>
       <?php echo JHTML::_('grid.sort', _JSHOP_EMAIL, 'email', $this->filter_order_Dir, $this->filter_order)?>
     </th>
     <?php if ($this->show_vendor){?>
     <th>
       <?php echo _JSHOP_VENDOR?>
     </th>
     <?php }?>
     <?php if ($jshopConfig->order_send_pdf_client || $jshopConfig->order_send_pdf_admin){?>
     <th class = "center">
       <?php echo _JSHOP_ORDER_PRINT_VIEW?>
     </th>
     <?php }?>
     <th>
       <?php echo JHTML::_('grid.sort', _JSHOP_DATE, 'order_date', $this->filter_order_Dir, $this->filter_order)?>
     </th>
     <th>
       <?php echo JHTML::_('grid.sort', _JSHOP_ORDER_MODIFY_DATE, 'order_m_date', $this->filter_order_Dir, $this->filter_order)?>
     </th>
     <th>
       <?php echo JHTML::_('grid.sort', _JSHOP_STATUS, 'order_status', $this->filter_order_Dir, $this->filter_order)?>
     </th>
     <th>
       <?php echo _JSHOP_ORDER_UPDATE?>
     </th>
     <th>
       <?php echo JHTML::_('grid.sort', _JSHOP_ORDER_TOTAL, 'order_total', $this->filter_order_Dir, $this->filter_order)?>
     </th>
     <th>
       <?php echo _JSHOP_EDIT?>
     </th>  
   </tr>
   </thead>
   <?php 
   $i = 0; 
   foreach($rows as $row){
       $display_info_order = $row->display_info_order;
   ?>
   <tr class="row<?php echo ($i  %2);?>" <?php if (!$row->order_created) print "style='font-style:italic; color: #b00;'"?>>
     <td>
       <?php echo $pageNav->getRowOffset($i);?>
     </td>
     <td>
        <?php if ($row->blocked){?>
            <img src="components/com_jshopping/images/checked_out.png" />
        <?php }else{?>
            <input onclick="isChecked(this.checked)" type="checkbox" id="cb<?php echo $i?>" name="cid[]" value="<?php echo $row->order_id?>" />
        <?php }?>
     </td>
     <td>
       <a class="order_detail" href = "index.php?option=com_jshopping&controller=orders&task=show&order_id=<?php echo $row->order_id?>"><?php echo $row->order_number;?></a>
       <?php if (!$row->order_created) print "("._JSHOP_NOT_FINISHED.")";?>
     </td>
     <td>        
         <?php echo $row->name?>
     </td>
     <td><?php echo $row->email?></td>
     <?php if ($this->show_vendor){?>
     <td>
        <?php print $row->vendor_name;?>
     </td>
     <?php }?>
     <?php if ($jshopConfig->order_send_pdf_client || $jshopConfig->order_send_pdf_admin){?>
     <td class = "center">
        <?php if ($display_info_order && $row->order_created && $row->pdf_file!=''){?>
            <a href = "javascript:void window.open('<?php echo $jshopConfig->pdf_orders_live_path."/".$row->pdf_file?>', 'win2', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=800,height=600,directories=no,location=no');">
                <img border="0" src="components/com_jshopping/images/jshop_print.png" alt="print" />
            </a>
        <?php }?>
        <?php echo $row->_ext_order_info;?>
     </td>
     <?php }?>
     <td>
       <?php echo $row->order_date;?>
     </td>
     <td>
       <?php echo $row->order_m_date;?>
     </td>
     <td>
        <?php if ($display_info_order && $row->order_created){
            echo JHTML::_('select.genericlist', $lists['status_orders'], 'select_status_id['.$row->order_id.']', 'class="inputbox" id = "status_id_'.$row->order_id.'"', 'status_id', 'name', $row->order_status );
        }else{
            print $this->list_order_status[$row->order_status];
        }
        ?>
     </td>
     <td>
     <?php if ($row->order_created && $display_info_order){?>
        <input class = "inputbox" type = "checkbox" name = "order_check_id[<?php echo $row->order_id?>]" id = "order_check_id_<?php echo $row->order_id?>" />
        <label for = "order_id_<?php echo $row->order_id?>"><?php echo _JSHOP_NOTIFY_CUSTOMER?></label><br />
        <input class = "button" type = "button" name = "" value = "<?php echo _JSHOP_UPDATE_STATUS?>" onclick = "verifyStatus(<?php echo $row->order_status; ?>, <?php echo $row->order_id; ?>, '<?php echo _JSHOP_CHANGE_ORDER_STATUS;?>', 0, '<?php echo $adv_string?>');" />
     <?php }?>
     <?php if ($display_info_order && !$row->order_created && !$row->blocked){?>
        <a href="index.php?option=com_jshopping&controller=orders&task=finish&order_id=<?php print $row->order_id?>&js_nolang=1"><?php print _JSHOP_FINISH_ORDER?></a>
     <?php }?>
     </td>
     <td>
       <?php if ($display_info_order) echo formatprice( $row->order_total,$row->currency_code)?>
     </td>
     <td align="center">
     <?php if ($display_info_order){?>
        <a href='index.php?option=com_jshopping&controller=orders&task=edit&order_id=<?php print $row->order_id;?>&client_id=<?php print $this->client_id;?>'><img src='components/com_jshopping/images/icon-16-edit.png'></a>
     <?php }?>
   </td>
   </tr>
   <?php
   $i++;
   }
   ?>
 <tfoot>
 <tr>
    <td colspan="20">
    <?php echo $pageNav->getListFooter();?>
    </td>
 </tr>
 </tfoot>  
 </table>

<input type="hidden" name="filter_order" value="<?php echo $this->filter_order?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->filter_order_Dir?>" />
<input type = "hidden" name = "task" value = "" />
<input type = "hidden" name = "boxchecked" value = "0" />
<input type = "hidden" name = "client_id" value ="<?php echo $this->client_id?>" />
</form>
<?php print $this->_tmp_order_list_html_end;?>