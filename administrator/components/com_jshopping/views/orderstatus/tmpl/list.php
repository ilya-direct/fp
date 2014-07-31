<?php
	defined('_JEXEC') or die();
	displaySubmenuOptions();
	$rows = $this->rows;
	$i = 0;
?>
<form action = "index.php?option=com_jshopping&controller=orderstatus" method = "post" name = "adminForm">
<table class = "adminlist">
<thead>
    <tr>
        <th class = "title" width  = "10">#</th>
        <th width = "20">
            <input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo $count = count( $rows );?>);" />
        </th>
        <th width = "200" align = "left">
            <?php echo JHTML::_('grid.sort', _JSHOP_TITLE, 'name', $this->filter_order_Dir, $this->filter_order); ?>
        </th>
        <th align = "left">
            <?php echo JHTML::_('grid.sort', _JSHOP_CODE, 'status_code', $this->filter_order_Dir, $this->filter_order); ?>
        </th>
        <th width = "50">
            <?php echo _JSHOP_EDIT;?>
        </th>
        <th width = "40">
            <?php echo JHTML::_('grid.sort', _JSHOP_ID, 'status_id', $this->filter_order_Dir, $this->filter_order); ?>
        </th>
    </tr>
</thead>  
<?php foreach($rows as $row){ ?>
  <tr class = "row<?php echo $i % 2;?>">
   <td>
     <?php echo $i+1;?>
   </td>
   <td>
     <input type = "checkbox" onclick = "isChecked(this.checked)" name = "cid[]" id = "cb<?php echo $i++;?>" value = "<?php echo $row->status_id?>" />
   </td>
   <td>
     <a title = "<?php echo _JSHOP_EDIT_ORDER_STATUS;?>" href = "index.php?option=com_jshopping&controller=orderstatus&task=edit&status_id=<?php echo $row->status_id; ?>"><?php echo $row->name;?></a>
   </td>
   <td>
     <?php echo $row->status_code;?>
   </td>
	<td align="center">
   	<a href='index.php?option=com_jshopping&controller=orderstatus&task=edit&status_id=<?php echo $row->status_id; ?>'><img src='components/com_jshopping/images/icon-16-edit.png'></a>
   	</td>
    <td align="center">
        <?php print $row->status_id;;?>
    </td>
  </tr>
  <?php
 }
?>
</table>

<input type="hidden" name="filter_order" value="<?php echo $this->filter_order?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->filter_order_Dir?>" />
<input type = "hidden" name = "task" value = "<?php echo JRequest::getVar('task', 0)?>" />
<input type = "hidden" name = "hidemainmenu" value = "0" />
<input type = "hidden" name = "boxchecked" value = "0" />
</form>