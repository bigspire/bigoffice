<?php
/* Smarty version 3.1.29, created on 2016-09-07 12:24:25
  from "F:\xampp\htdocs\ceo_apps_it\app\webroot\it\templates\list_assign_asset.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57cfb9a1a12156_62009428',
  'file_dependency' => 
  array (
    'd6c3aff69bd2bf3a70423db28c0a25d8ce352d63' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ceo_apps_it\\app\\webroot\\it\\templates\\list_assign_asset.tpl',
      1 => 1472121225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/menu.tpl' => 1,
    'file:include/footer.tpl' => 1,
    'file:include/footer_js.tpl' => 1,
  ),
),false)) {
function content_57cfb9a1a12156_62009428 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'F:\\xampp\\htdocs\\ceo_apps_it\\app\\webroot\\it\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
?>


	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		
	<div id="page_wrapper">
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Assign Asset</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="list_assign_asset.php">List Assign Asset</a>
						</li>
					</ul>
					
				</div>
			   <?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-success">
				 <button type="button" class="close" data-dismiss="alert">&#x2A2F;</button><?php echo $_smarty_tpl->tpl_vars['ALERT_MSG']->value;?>
</div>					
			   <?php }?>	
					<div class="row-fluid  footer_div previewDiv" >
					<div class="span12">
						<div class="box box-bordered box-color">
						
						<div class="box-title">
								<h3><i class="icon-list"></i>Assign Asset</h3>
							</div>
							
						

						<form action="list_assign_asset.php" name="" id="formID" class="" method="post" accept-charset="utf-8">							<div class="box-content">
							
						<div class="dataTables_wrapper">
						
				<div class="" id="DataTables_Table_8_filter"  style="padding:15px">
				
				<span>Search:</span>  
				<input name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
"  class="input-large" id="keyword" autocomplete="off" placeholder="Search here..." type="text"/> 
			   <span></span>	
            <?php echo smarty_function_html_options(array('name'=>'emp_name','class'=>"input-medium",'placeholder'=>"Employee",'style'=>"clear:left",'id'=>"HrEmployeeRecStatus",'options'=>$_smarty_tpl->tpl_vars['emp_name_drop']->value,'selected'=>$_smarty_tpl->tpl_vars['emp_name']->value),$_smarty_tpl);?>

				<span></span>	
			   <?php echo smarty_function_html_options(array('name'=>'asset_type','class'=>"input-medium",'style'=>"clear:left",'id'=>"HrEmployeeRecStatus",'options'=>$_smarty_tpl->tpl_vars['asset_type_drop']->value,'selected'=>$_smarty_tpl->tpl_vars['asset_type']->value),$_smarty_tpl);?>
	   
		      <span></span>	
		      <input name="f_date" value="<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
" class="input-small datepick" placeholder="From Date" type="text" id="HrEmployeeDob"/> 
	         <input name="t_date" value="<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="input-small datepick" placeholder="To Date" type="text" id="HrEmployeeDob"/> 
		      <input type="submit" value="Search" class="btn btn-primary" style="margin-bottom:9px;margin-left:4px;">
            <a href="list_assign_asset.php"><button style="margin-bottom:9px;margin-left:4px;" type="button" class="btn btn-primary"><i class="icon-refresh"></i> Reset</button></a>
            <a href="add_assign_asset.php"><button type="button" class="btn btn-primary" style="float:right"><i class="icon-plus"></i> Assign Asset</button></a>
            <a href="list_assign_asset.php?action=export&keyword=<?php echo $_POST['keyword'];?>
&emp_name=<?php echo $_POST['emp_name'];?>
&asset_type=<?php echo $_POST['asset_type'];?>
&f_date=<?php echo $_POST['f_date'];?>
&t_date=<?php echo $_POST['t_date'];?>
"><button type="button" class="btn btn-primary" style="float:right;margin-right:20px;"><i class="icon-reply"></i> Export</button></a>		
            </div>			
								
				<table class="table table-hover table-nomargin table-bordered usertable dataTable">
				<thead>
				<tr>	
					<th width="80">
						<a href="list_assign_asset.php?field=emp_name&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&emp_name=<?php echo $_smarty_tpl->tpl_vars['emp_name']->value;?>
&asset_type=<?php echo $_smarty_tpl->tpl_vars['asset_type']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_emp_name']->value;?>
">Employee Name</a></th>
					<th width="80">
						<a href="list_assign_asset.php?field=asset_type&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&emp_name=<?php echo $_smarty_tpl->tpl_vars['emp_name']->value;?>
&asset_type=<?php echo $_smarty_tpl->tpl_vars['asset_type']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_asset_type']->value;?>
">Asset Type</a></th>
					<th width="80">
						<a href="list_assign_asset.php?field=<?php echo $_smarty_tpl->tpl_vars['sort_field']->value;?>
&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&emp_name=<?php echo $_smarty_tpl->tpl_vars['emp_name']->value;?>
&asset_type=<?php echo $_smarty_tpl->tpl_vars['asset_type']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_sort_field']->value;?>
">Asset</a>	</th>		
					<th width="80">
						<a href="list_assign_asset.php?field=brand&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&emp_name=<?php echo $_smarty_tpl->tpl_vars['emp_name']->value;?>
&asset_type=<?php echo $_smarty_tpl->tpl_vars['asset_type']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_brand']->value;?>
">Brand</a></th>
					<th width="80">
						<a href="list_assign_asset.php?field=created_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&emp_name=<?php echo $_smarty_tpl->tpl_vars['emp_name']->value;?>
&asset_type=<?php echo $_smarty_tpl->tpl_vars['asset_type']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created_date']->value;?>
">Last Modified</a></th>
					<th width="80">Options</th>
				</tr>
			   </thead>
				<tbody>	
				<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>		
					<?php if ($_smarty_tpl->tpl_vars['item']->value['emp_name']) {?>										
					<tr>		
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['emp_name'];?>
</td> 
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['asset_type'];?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['item']->value['edition']) {
echo $_smarty_tpl->tpl_vars['item']->value['edition'];?>
 (<?php echo $_smarty_tpl->tpl_vars['item']->value['sw_type'];?>
)<?php } else {
echo $_smarty_tpl->tpl_vars['item']->value['hw_type'];
}?></td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['brand'];?>
</td> 
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>
						<td class='hidden-480'>
							<a href="view_assign_asset.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['item']->value['asset_type'];?>
" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
						   <a href="edit_assign_asset.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>	
							<a href="delete_assign_asset.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&page=<?php echo $_GET['page'];?>
&asset_type=<?php echo $_smarty_tpl->tpl_vars['item']->value['asset_type'];?>
" name="21" onclick="return deletefunction()"	class="btn delRec" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
						</td>
					</tr>
					<?php }?>
	    		 <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>	
         	</tbody>
				</table>
		         <div class="dataTables_info" id="DataTables_Table_8_info">
					 <?php echo $_smarty_tpl->tpl_vars['page_info']->value;?>

					</div>
					<div class="table-pagination" id="DataTables_Table_8_paginate">
					 <?php echo $_smarty_tpl->tpl_vars['page_links']->value;?>
		
					</div>
					&nbsp;							
					</div>	
				</div>
				<input type="hidden" id="page" value="assign_asset">
				<input type="hidden" id="asset_type" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['asset_type'];?>
">
			</form>						
		 </div>
		</div>
		</div>
	</div>
</div>			
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<input type="hidden" value="/" id="css_root">
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
