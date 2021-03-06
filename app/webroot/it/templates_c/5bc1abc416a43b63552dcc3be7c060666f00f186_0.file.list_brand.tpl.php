<?php
/* Smarty version 3.1.29, created on 2016-11-14 12:57:42
  from "/var/www/html/ceo_apps_it/app/webroot/it/templates/list_brand.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5829676ec831c4_31682914',
  'file_dependency' => 
  array (
    '5bc1abc416a43b63552dcc3be7c060666f00f186' => 
    array (
      0 => '/var/www/html/ceo_apps_it/app/webroot/it/templates/list_brand.tpl',
      1 => 1479105131,
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
function content_5829676ec831c4_31682914 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/ceo_apps_it/app/webroot/it/vendor/smarty-3.1.29/libs/plugins/function.html_options.php';
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
						<h1>Brand</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="list_brand.php">List Brand</a>
						</li>
					</ul>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['ERROR_MSG']->value) {?>
				<div id="flashMessage" class="alert alert-danger">		
				<button type="button" class="close" data-dismiss="alert">&#x2A2F;</button><?php echo $_smarty_tpl->tpl_vars['ERROR_MSG']->value;?>
				
				</div>					
				<?php }?>
			<?php if ($_GET['msg']) {?>
				<div id="flashMessage" class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&#x2A2F;</button><?php echo $_GET['msg'];?>
</div>					
				<?php }?>
			   <?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-success">
				 <button type="button" class="close" data-dismiss="alert">&#x2A2F;</button><?php echo $_smarty_tpl->tpl_vars['ALERT_MSG']->value;?>
</div>					
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['SUCCESS_MSG']->value) {?>
					 <div id="flashMessage" class="alert alert-success">
				 <button type="button" class="close" data-dismiss="alert">&#x2A2F;</button><?php echo $_smarty_tpl->tpl_vars['SUCCESS_MSG']->value;?>
</div>					
				<?php }?>
					<div class="row-fluid  footer_div previewDiv" >
					<div class="span12">
						<div class="box box-bordered box-color">
						<div class="box-title">
								<h3><i class="icon-list"></i>Brand</h3>
							</div>
						<form action="list_brand.php" name="" id="formID" class="" method="post" accept-charset="utf-8">							
						<div class="box-content">
						<div class="dataTables_wrapper">	
				<div class="" id="DataTables_Table_8_filter"  style="padding:15px">
				 <span>Search:</span>  
			    <input name="keyword" value = "<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="input-large" id="keyword" autocomplete="off" placeholder="Search here..." type="text"/> 
			    <?php echo smarty_function_html_options(array('name'=>'b_type','class'=>"input-medium",'placeholder'=>'','style'=>"clear:left",'id'=>"HrEmployeeRecStatus",'options'=>$_smarty_tpl->tpl_vars['b_type_data']->value,'selected'=>$_smarty_tpl->tpl_vars['b_type']->value),$_smarty_tpl);?>
			    
			    <?php echo smarty_function_html_options(array('name'=>'b_status','class'=>"input-medium",'placeholder'=>'','style'=>"clear:left",'id'=>"HrEmployeeRecStatus1",'options'=>$_smarty_tpl->tpl_vars['type']->value,'selected'=>$_smarty_tpl->tpl_vars['b_status']->value),$_smarty_tpl);?>

		       <input type="submit" value="Search" class="btn btn-primary" style="margin-bottom:9px;margin-left:4px;">
             <a href="list_brand.php"><button style="margin-bottom:9px;margin-left:4px;" type="button" val="list_brand.php" class="jsRedirect btn btn-primary"><i class="icon-refresh"></i> Reset</button></a>
             <a href="add_brand.php"><button type="button" val="add_brand.php" class="jsRedirect btn btn-primary" style="float:right"><i class="icon-plus"></i> Add Brand</button></a>
				 <?php if (!$_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>              
               <a href="list_brand.php?action=export&keyword=<?php echo $_POST['keyword'];?>
&b_type=<?php echo $_POST['b_type'];?>
&b_status=<?php echo $_smarty_tpl->tpl_vars['b_status']->value;?>
"><button type="button" name="export" val="list_brand.php?action=export&keyword=<?php echo $_POST['keyword'];?>
&b_type=<?php echo $_POST['b_type'];?>
&b_status=<?php echo $_smarty_tpl->tpl_vars['b_status']->value;?>
" class="jsRedirect btn btn-primary" style="float:right;margin-right:20px;"><i class="icon-reply"></i> Export</button></a>				
				 <?php }?>            
            </div>			
            <input type="hidden" id="del_url" value="/ceo_apps/hremployee/delete_employee/"/>
					<table class="table table-hover table-nomargin table-bordered usertable dataTable">
						<thead>
							<tr>
								<th>
									<a href="list_brand.php?field=b_name&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&b_type=<?php echo $_smarty_tpl->tpl_vars['b_type']->value;?>
&b_status=<?php echo $_smarty_tpl->tpl_vars['b_status']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_b_name']->value;?>
">Brand Name</a>	</th>
								<th>
									<a href="list_brand.php?field=b_type&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&b_type=<?php echo $_smarty_tpl->tpl_vars['b_type']->value;?>
&b_status=<?php echo $_smarty_tpl->tpl_vars['b_status']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_b_type']->value;?>
">Brand Type</a></th>		
								<th>
									<a href="list_brand.php?field=created_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&b_type=<?php echo $_smarty_tpl->tpl_vars['b_type']->value;?>
&b_status=<?php echo $_smarty_tpl->tpl_vars['b_status']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created_date']->value;?>
">Created Date</a></th>	
								<th>
									<a href="list_brand.php?field=modified&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&b_type=<?php echo $_smarty_tpl->tpl_vars['b_type']->value;?>
&b_status=<?php echo $_smarty_tpl->tpl_vars['b_status']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_modified']->value;?>
">Modified Date</a></th>									
								<th style="text-align:center">Status</th>
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
								 <?php if ($_smarty_tpl->tpl_vars['item']->value['created_date']) {?>				
								 <tr>
									<td><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['title']);?>
</td> 
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
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
										<a href="edit_brand.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
										<a href="delete_brand.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&page=<?php echo $_GET['page'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
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
				<input type="hidden" id="page" value="brand">
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
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
