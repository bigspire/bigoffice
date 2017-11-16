<?php
/* Smarty version 3.1.29, created on 2016-08-25 15:59:53
  from "/var/www/html/itasset/templates/software_type.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bec8a10b4c73_81485591',
  'file_dependency' => 
  array (
    '421857e333265623262951f8348a7194e3136477' => 
    array (
      0 => '/var/www/html/itasset/templates/software_type.tpl',
      1 => 1472120835,
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
function content_57bec8a10b4c73_81485591 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/itasset/vendor/smarty-3.1.29/libs/plugins/function.html_options.php';
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
						<h1>Software Type</h1>
					</div>
					
				</div>
				
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="software_type.php">List Software Type</a>
						</li>
					</ul>
					
				</div>
				
				<?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
				<div id="flashMessage" class="alert alert-success">		
				<button type="button" class="close" data-dismiss="alert">&#x2A2F;</button><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
				
				</div>					
				<?php }?>
					<div class="row-fluid  footer_div previewDiv">					
					
					<div class="span12">
						<div class="box box-bordered box-color">
						
						<div class="box-title">
								<h3><i class="icon-list"></i>Software Type</h3>
							</div>
						<form action="software_type.php" name="" id="formID" class="" method="post" accept-charset="utf-8">						
							<div class="box-content">
						<div class="dataTables_wrapper">
						
				<div class="" id="DataTables_Table_8_filter"  style="padding:15px">
				<span>Search:</span>  				
				<input name="keyword" value = "<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="input-large" id="keyword" autocomplete="off" placeholder="Search here..." type="text"/> 
			    <?php echo smarty_function_html_options(array('name'=>'sw_status','class'=>"input-medium",'placeholder'=>'','style'=>"clear:left",'id'=>"HrEmployeeRecStatus1",'options'=>$_smarty_tpl->tpl_vars['type']->value,'selected'=>$_smarty_tpl->tpl_vars['sw_status']->value),$_smarty_tpl);?>

		      <input type="submit" value="Search" class="btn btn-primary" style="margin-bottom:9px;margin-left:4px;">
            <a href="software_type.php"><button style="margin-bottom:9px;margin-left:4px;" type="button" class="btn btn-primary"><i class="icon-refresh"></i> Reset</button></a>
            <a href="add_software_type.php"><button type="button" class="btn btn-primary" style="float:right"><i class="icon-plus"></i> Add Software Type</button></a>
            <a href="software_type.php?action=export&keyword=<?php echo $_POST['keyword'];?>
&sw_status=<?php echo $_POST['sw_status'];?>
"><button type="button" class="btn btn-primary" style="float:right;margin-right:20px;"><i class="icon-reply"></i> Export</button></a>		
            </div>			
								<table class="table table-hover table-nomargin table-bordered usertable dataTable">
									<thead>
										<tr>
											<th>
											 <a href="software_type.php?field=software_type&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&sw_status=<?php echo $_smarty_tpl->tpl_vars['sw_status']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_software_type']->value;?>
">Title</a></th>
										   <th>
											<a href="software_type.php?field=description&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&sw_status=<?php echo $_smarty_tpl->tpl_vars['sw_status']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_description']->value;?>
">Description</a></th>		
											<th>
											<a href="software_type.php?field=created&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&sw_status=<?php echo $_smarty_tpl->tpl_vars['sw_status']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created']->value;?>
">Created</a></th>
											<th>
											<a href="software_type.php?field=modified&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&sw_status=<?php echo $_smarty_tpl->tpl_vars['sw_status']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_modified']->value;?>
">Modified</a></th>
											<th style="text-align:center" width="100">Status</th>
											<th>Options</th>
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
									 <?php if ($_smarty_tpl->tpl_vars['item']->value['type']) {?>						
										<tr>
											<td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td> 
											<td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td> 
											<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modified_date'];?>
</td> 
											<td style="text-align:center"><span class='label label-<?php echo $_smarty_tpl->tpl_vars['item']->value['status_cls'];?>
'><a href='#' rel='tooltip' data-original-title = <?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</a></span></td>
											<td class='hidden-480'>
												<a href="edit_software_type.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
										    	<a href="delete_software_type.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&page=<?php echo $_GET['page'];?>
" name="21" onclick="return deletefunction()" class="btn delRec" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
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
															
							</div>	
							</div>
							<input type="hidden" id="page" value="software_type">
						 </form>						
						 </div>
					</div>
				
				
				</div>
			 </div>
	    </div>			
	</div>
	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}