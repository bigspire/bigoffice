<?php
/* Smarty version 3.1.29, created on 2016-08-23 16:20:46
  from "/var/www/html/itasset/templates/add_assign_asset.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bc2a868924f8_94215726',
  'file_dependency' => 
  array (
    '23a5084d13776d42f2a5c71bdb13ef56e362d464' => 
    array (
      0 => '/var/www/html/itasset/templates/add_assign_asset.tpl',
      1 => 1470128268,
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
function content_57bc2a868924f8_94215726 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/itasset/vendor/smarty-3.1.29/libs/plugins/function.html_options.php';
?>
		
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
	<div id="page_wrapper">
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
	
<input type="hidden" value="/" id="site_root"/>	
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Add Assign Asset</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="list_assign_asset.php">Assign Asset</a>
								<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="add_assign_asset.php">Add Assign Asset</a>
						</li>
					</ul>
				</div>
				<div class="row-fluid  footer_div">
					<div class="span12">
					<form action="post.php" method="POST" class="form-horizontal form-wizard ui-formwizard" id="ss" novalidate="novalidate">
									<div class="step ui-formwizard-content" id="firstStep" style="width:99%;margin-top:20px;">
									</div>
								</form>
					<form action=" " id="formID" class="form-horizontal form-column form-bordered" enctype="multipart/form-data" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>								
			<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i> Assign Asset Details</h3>
							</div>
							<div class="box-content nopadding">
<div class="span6">
									<div class="control-group">
											<label for="textfield" class="control-label">Employee <span class="red_star"> *</span></label>
											
											<div class="controls field">
											<select name="employee">
										<option value="">Select</option>
										<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"employee",'options'=>$_smarty_tpl->tpl_vars['emp_name']->value,'selected'=>$_smarty_tpl->tpl_vars['employee']->value),$_smarty_tpl);?>

										</select>			
				<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['employeeErr']->value;?>
 </div>

										</div>
										</div>
										<div class="control-group swDiv">
											<label for="textfield" class="control-label">Software Type <span class="red_star"> *</span></label>
											<div class="controls field">
											<select name="swtype" id="swtype">
										<option value="">Select</option>
												<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"swtype",'options'=>$_smarty_tpl->tpl_vars['sw_type']->value,'selected'=>$_smarty_tpl->tpl_vars['swtype']->value),$_smarty_tpl);?>
			
										</select>
				<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['sw_typeErr']->value;?>
 </div>
										</div>
										</div>
														<div class="control-group dn hwDiv">
											<label for="textfield" class="control-label">Hardware Type <span class="red_star"> *</span></label>
											
											<div class="controls field">
											<select name="hwtype" id="hwtype">
										<option value="">Select</option>	
											<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"hwtype",'options'=>$_smarty_tpl->tpl_vars['hw_type']->value,'selected'=>$_smarty_tpl->tpl_vars['hwtype']->value),$_smarty_tpl);?>

										</select>			
				<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['hw_typeErr']->value;?>
 </div>
										</div>
										</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Brand <span class="red_star"> *</span></label>
										<div class="controls swDiv">
										<select name="swbrand" id="swbrand">
										<option value="">Select</option>	
												<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"swbrand",'options'=>$_smarty_tpl->tpl_vars['sw_brand']->value,'selected'=>$_smarty_tpl->tpl_vars['swbrand']->value),$_smarty_tpl);?>

										</select>				
				<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['sw_brandErr']->value;?>
 </div>
										</div>
										
										<div class="controls dn hwDiv">
										<select name="hwbrand" id="hwbrand">
										<option value="">Select</option>	
												<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"hwbrand",'options'=>$_smarty_tpl->tpl_vars['hw_brand']->value,'selected'=>$_smarty_tpl->tpl_vars['hwbrand']->value),$_smarty_tpl);?>

										</select>				
				<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['hw_brandErr']->value;?>
 </div>
				
				
										</div>
											<div class="control-group">
											<label for="password" class="control-label">Description <span class="red_star"></span></label>
											<div class="controls">
                                  
												<textarea name="description" rows="2" class="input-xlarge" placeholder="" cols="30" id="description"><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea> 
											</div>
										</div>
										</div>		
										
												
										
		
										
										</div>
								
									
<div class="span6">		
        <div class="control-group">
        
										<label for="textfield" class="control-label">Asset Type <span class="red_star"> *</span></label> 
										
										<div class="controls ">
									
				<input type="radio" class="change_asset_type" name="asset_type"<?php if ($_smarty_tpl->tpl_vars['asset_type']->value && $_smarty_tpl->tpl_vars['asset_type']->value == 'S') {
echo 'checked';
}?> value="S"> Software
             <input type="radio" class="change_asset_type" name="asset_type"<?php if ($_smarty_tpl->tpl_vars['asset_type']->value && $_smarty_tpl->tpl_vars['asset_type']->value == 'H') {
echo 'checked';?>
 <?php }?> value="H"> Hardware
										  <div class="error"><?php echo $_smarty_tpl->tpl_vars['asset_typeE']->value;?>
 </div>
										  
										 </div>
										</div>
								<div class="control-group swDiv">
											<label for="password" class="control-label">Edition <span class="red_star"> *</span></label>
											<div class="controls">
											<select name="edition">
										<option value="">Select</option>	
												<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"edition",'options'=>$_smarty_tpl->tpl_vars['s_edition']->value,'selected'=>$_smarty_tpl->tpl_vars['edition']->value),$_smarty_tpl);?>
 
										</select>
<div class="error"><?php echo $_smarty_tpl->tpl_vars['editionErr']->value;?>
 </div>
											</div>
										</div>		
											<div class="control-group dn hwDiv">
											<label for="password" class="control-label">Inventory No <span class="red_star"> *</span></label>
											<div class="controls">
											<select name="inventory">
										<option value="">Select</option>
												<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"inventory",'options'=>$_smarty_tpl->tpl_vars['h_inventory']->value,'selected'=>$_smarty_tpl->tpl_vars['inventory']->value),$_smarty_tpl);?>
 
											</select>
<div class="error"><?php echo $_smarty_tpl->tpl_vars['inventoryErr']->value;?>
 </div>
											</div>
										</div> 
									
										<div class="control-group">
											<label for="textfield" class="control-label">Status <span class="red_star"> *</span></label>
											
											<div class="controls field">
												<?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
	<?php echo smarty_function_html_options(array('name'=>'status','class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"status",'options'=>$_smarty_tpl->tpl_vars['assign_status']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
	
											<?php } else { ?>
	<?php echo smarty_function_html_options(array('name'=>'status','class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"status",'options'=>$_smarty_tpl->tpl_vars['assign_status']->value,'selected'=>'1'),$_smarty_tpl);?>
	
											<?php }?>	

										<div class="error"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
 </div>	
										</div>
									</div>
		
									</div>
									
									
						<div class="span12">
										<div class="form-actions">
											<a href="list_assign_asset.php"><input type="submit" name="next" value="Submit" class="btn btn-primary"></a>
				                        
											
											<a href="list_assign_asset.php"><button type="button" class="btn regCancel" onclick="return cancelfunction()">Cancel</button></a>
											
										</div>
									</div>	
								
							</div>
						</div>
						</div>
					
					</form>					
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
