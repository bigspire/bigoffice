<?php
/* Smarty version 3.1.29, created on 2016-08-17 20:00:57
  from "/var/www/html/itasset/templates/edit_hardware_inventory_details.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b47521f1c744_62860650',
  'file_dependency' => 
  array (
    '98ed82abe6d070aa7ad4b9475f4989db4522a231' => 
    array (
      0 => '/var/www/html/itasset/templates/edit_hardware_inventory_details.tpl',
      1 => 1469599393,
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
function content_57b47521f1c744_62860650 ($_smarty_tpl) {
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
						<h1>Edit Hardware</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="list_hardware.php">Hardware</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="edit_hardware_inventory_details.php?id=<?php echo $_smarty_tpl->tpl_vars['getid']->value;?>
">Edit Hardware</a>
						</li>
					</ul>
					
				</div>
				
								
				
					
					<div class="row-fluid  footer_div">
					
					
					<div class="span12">
					
								<form action="edit_hardware_inventory_details.php?id=<?php echo $_smarty_tpl->tpl_vars['getid']->value;?>
" method="POST" class="form-horizontal form-column form-bordered form-wizard ui-formwizard" id="formID" novalidate="novalidate">
									<div class="step ui-formwizard-content" id="firstStep" style="width:99%;margin-top:20px;">
										<ul class="wizard-steps steps-4">
												<li class="">
												<div class="single-step">
													<span class="title">
														1</span>
													<span class="circle">
													</span>
													<span class="description">
																				Hardware Details 		
																		</span>
												</div>
											</li>
										
											
				<li class="active">
												<div class="single-step">
													<span class="title">
														2</span>
													<span class="circle">
														<span class="active"></span>
													</span>
													<span class="description">
																						Inventory Details 		
																				</span>
												</div>
											</li>
											<li class="">
												<div class="single-step">
													<span class="title">
														3</span>
													<span class="circle">
													</span>
													<span class="description">
																					Pricing Details 		
																				</span>
												</div>
											</li>
											
																				
											<li class="">
												<div class="single-step">
													<span class="title">
														4</span>
													<span class="circle">
													</span>
													<span class="description">
																						Vendor Details	
																				</span>
												</div>
											</li>
											
											<li class="">
												<div class="single-step">
													<span class="title">
														5</span>
													<span class="circle">
													</span>
													<span class="description">
																						Confirm 		
																				</span>
												</div>
											</li>
																					</ul>
									</div>
								
							
									
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i> Inventory Details</h3>
							</div>
							
						
							<div class="box-content nopadding">
								
								
								
								
								
						<div class="span6">
									
							<div class="control-group">
								<label for="textfield" class="control-label">Inventory No <span class="red_star"> *</span></label>
								<div class="controls field">
								<input name="inventory_no" class="input-xlarge" placeholder="" type="text" id="inventory_no" value="<?php echo $_SESSION['h']['inventory_no'];?>
"/> 
								<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['inventory_noErr']->value;?>
 </div>
								</div>
							</div>
								<div class="control-group">
		<label for="textfield" class="control-label">Location <span class="red_star"> *</span></label>
		<div class="controls field">
		<select name="state_id" id="state_id">
		<option value="">Select</option>
<?php echo smarty_function_html_options(array('class'=>"input-medium",'placeholder'=>'','style'=>"clear:left",'options'=>$_smarty_tpl->tpl_vars['state']->value,'selected'=>$_SESSION['h']['state_id']),$_smarty_tpl);?>

	</select>
	<select name="district_id" id="district_id">
	<option value="">Select</option>
<?php echo smarty_function_html_options(array('class'=>"input-large",'placeholder'=>'','style'=>"clear:left",'options'=>$_smarty_tpl->tpl_vars['district']->value,'selected'=>$_SESSION['h']['district_id']),$_smarty_tpl);?>

</select>		
		<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['stateErr']->value;?>
 </div>
		</div>
	</div>			
						 
						</div>
								

<div class="span6">		
    <div class="control-group">
		<label for="textfield" class="control-label">Asset Description <span class="red_star">* </span></label>
		<div class="controls field">
		<input name="asset_desc" class="input-xlarge" placeholder="" type="text" id="asset_desc" value="<?php echo $_SESSION['h']['asset_desc'];?>
"/> 
		<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['asset_descErr']->value;?>
 </div>		
		</div>
	</div>

</div>
					<div class="span12">
							
										<div class="form-actions">
											<input type="submit" id="submit_previous" class="btn" name="previous" value="Previous">
											<input onclick="return validate_id()" type="submit" name="next" id="submit_next" value="Next" class="btn btn-primary">					
											<input onclick="return validate_id()" type="submit" name="confirm" id="submit_confirm" value="Confirm" class="btn btn-primary">
											<a href="list_hardware.php"><button type="button" class="btn regCancel" onclick="return cancelfunction()">Cancel</button></a>
											
										</div>
									</div>	
								
							</div>
						</div>
				


									
							
							
						</div>
					<input type="hidden" id="next_hdn" name="next_hdn">
					<input type="hidden" id="confirm_hdn" name="confirm_hdn">
					<input type="hidden" id="previous_hdn" name="previous_hdn">
					
					<!--input type="hidden" id="end_date" value="30/05/2000"-->
					
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
}
}
