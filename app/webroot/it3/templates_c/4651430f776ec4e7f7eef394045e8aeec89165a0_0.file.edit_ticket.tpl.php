<?php
/* Smarty version 3.1.29, created on 2016-08-17 18:08:04
  from "/var/www/html/itasset/templates/edit_ticket.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b45aaccbc065_91160767',
  'file_dependency' => 
  array (
    '4651430f776ec4e7f7eef394045e8aeec89165a0' => 
    array (
      0 => '/var/www/html/itasset/templates/edit_ticket.tpl',
      1 => 1470814302,
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
function content_57b45aaccbc065_91160767 ($_smarty_tpl) {
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
						<h1>Edit Ticket</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="list_ticket.php">Help Desk</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="edit_ticket.php?id=<?php echo $_GET['id'];?>
&status_id=<?php echo $_GET['status_id'];?>
">Edit Ticket</a>
						</li>
					</ul>
					
				</div>
				<div class="row-fluid  footer_div">
					<div class="span12">
					<form action="post.php" method="POST" class="form-horizontal form-wizard ui-formwizard" id="ss" novalidate="novalidate">	
					</form>
						
					<form action="edit_ticket.php?id=<?php echo $_smarty_tpl->tpl_vars['g_id']->value;?>
&status_id=<?php echo $_GET['status_id'];?>
" id="formID" class="form-horizontal form-column form-bordered" enctype="multipart/form-data" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>								
	
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i>Ticket Details</h3>
							</div>
							<div class="box-content nopadding">
                     <div class="span6">
                     		<div class="control-group">
											<label for="textfield" class="control-label">Employee Name</label>
									<div class="controls">
											<?php echo $_smarty_tpl->tpl_vars['data']->value['full_name'];?>
	
									</div>
									</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Subject</label>
									<div class="controls">
											<?php echo $_smarty_tpl->tpl_vars['data']->value['subject'];?>
	
									</div>
									</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Priority</label>
									<div class="controls">
											<?php echo $_smarty_tpl->tpl_vars['priority']->value;?>

									</div>
									</div>
								   <div class="control-group">
											<label for="textfield" class="control-label">Attachement</label>
											<div class="controls">
											<a href = "edit_ticket.php?id=<?php echo $_GET['id'];?>
&action=download&file=<?php echo $_smarty_tpl->tpl_vars['data']->value['attach_file'];?>
">
											<?php echo $_smarty_tpl->tpl_vars['data']->value['attach_file'];?>

											</a>
											</div>
									</div>
				          </div>
	
	                   <div class="span6">
									<div class="control-group">
											<label for="textfield" class="control-label">Type</label>
											<div class="controls">
											<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>

										   </div>
									</div>	
									<div class="control-group">
											<label for="textfield" class="control-label">Decription</label>
											<div class="controls">
											<?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>

										   </div>
									</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Status<span class="red_star"> *</span></label>
											<div class="controls">
					                  <?php echo smarty_function_html_options(array('name'=>'it_ticket_status_id','class'=>"input-small",'placeholder'=>'','style'=>"clear:left",'id'=>"HrEmployeeRecStatus1",'options'=>$_smarty_tpl->tpl_vars['status_type']->value,'selected'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
		
											<div class="error"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
 </div>
											</div>
									</div>	
				          </div>
							 <div class="span12">
										<div class="form-actions">
											<input type="submit" name="Submit" value="Submit" class="btn btn-primary"></a>
											<a href="list_ticket.php"><button type="button" class="btn regCancel">Cancel</button></a>
										</div>
							 </div>		
							</div>
						</div>
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
}
}
