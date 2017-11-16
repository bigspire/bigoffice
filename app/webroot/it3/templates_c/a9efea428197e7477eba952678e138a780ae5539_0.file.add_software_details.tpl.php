<?php
/* Smarty version 3.1.29, created on 2016-08-23 16:16:38
  from "/var/www/html/itasset/templates/add_software_details.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bc298e516495_89099507',
  'file_dependency' => 
  array (
    'a9efea428197e7477eba952678e138a780ae5539' => 
    array (
      0 => '/var/www/html/itasset/templates/add_software_details.tpl',
      1 => 1470118431,
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
function content_57bc298e516495_89099507 ($_smarty_tpl) {
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
						<h1>Create Software</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="list_software.php">Software</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="add_software_details.php">Add Software</a>
						</li>
					</ul>
					
				</div>
				<div class="row-fluid  footer_div">
				
					<div class="span12">
					
								<form action="add_software_details.php" method="POST" class="form-column form-bordered form-horizontal form-wizard ui-formwizard" id="formID" novalidate="novalidate">
									<div class="step ui-formwizard-content" id="firstStep" style="width:99%;margin-top:20px;">
										<ul class="wizard-steps steps-4">
												<li class="active">
												<div class="single-step">
													<span class="title">
														1</span>
													<span class="circle">
													</span>
													<span class="description">
																				Software Details 		
																		</span>
												</div>
											</li>
																		
										
				<li class="">
												<div class="single-step">
													<span class="title">
														2</span>
													<span class="circle">
														<span class="active"></span>
													</span>
													<span class="description">
																						Pricing Details 		
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
																					Vendor Details 		
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
																						Confirm 		
																				</span>
												</div>
											</li>
																					</ul>
									</div>
								
						
									
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i> Software Details</h3>
							</div>
							
					
							<div class="box-content nopadding">
							<div class="span6">
									
										<div class="control-group">
											<label for="textfield" class="control-label">Type <span class="red_star"> *</span></label>
											<div class="controls field">
							
<select name="softwaretype" id="softwaretype">
<option value="">Select</option>			
<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'style'=>"clear:left",'options'=>$_smarty_tpl->tpl_vars['row']->value,'selected'=>$_SESSION['s']['softwaretype']),$_smarty_tpl);?>
										
</select>

<div class="errorMsg error" id=""><?php echo $_smarty_tpl->tpl_vars['softwaretypeErr']->value;?>
 </div>

										</div>
										</div>
										
										
										<div class="control-group">
											<label for="textfield" class="control-label">Edition <span class="red_star"> *</span></label>
											<div class="controls field">
										
 <input name="edition" class="input-xlarge" placeholder="" type="text" id="edition" value="<?php echo $_SESSION['s']['edition'];?>
"/> 
 <?php echo $_smarty_tpl->tpl_vars['edition']->value;?>

  <div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['editionErr']->value;
echo $_smarty_tpl->tpl_vars['editionE']->value;?>
 </div>
											</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">Subscription Based <span class="red_star"> *</span></label>
											<div class="controls field">
												
											<?php echo smarty_function_html_options(array('name'=>'subscription_based','class'=>"input-xlarge change_subscription_based",'placeholder'=>'','style'=>"clear:left",'id'=>"subscription_based",'options'=>$_smarty_tpl->tpl_vars['subscription_based']->value,'selected'=>$_SESSION['s']['subscription_based']),$_smarty_tpl);?>

															
											<div class="errorMsg error "><?php echo $_smarty_tpl->tpl_vars['subscription_basedErr']->value;?>
 </div>
											</div>
										
										<div class="control-group">
											<label for="password" class="control-label sValidity">Validity <span class="red_star"> *</span></label>
											<div class="controls field">
											<?php echo smarty_function_html_options(array('name'=>'subscription_validity','class'=>"input-small sValidity",'placeholder'=>'','style'=>"clear:left",'id'=>"subscription_validity",'options'=>$_smarty_tpl->tpl_vars['subscription_validity']->value,'selected'=>$_SESSION['s']['subscription_validity']),$_smarty_tpl);?>

											
 <input name="valid_till" class="input-medium datepick sValidity" placeholder="Valid Till" type="text" id="valid_till" value="<?php echo $_SESSION['s']['valid_till'];?>
"/> 

 											<!--span class="error" style="color:#ff0000" ><?php echo $_smarty_tpl->tpl_vars['valid_tillErr']->value;?>
</span-->

 
											<div class="errorMsg error sValidity"><?php echo $_smarty_tpl->tpl_vars['subscription_validityErr']->value;?>
 </div>

											</div>
										</div>
																				
	
										</div>
										<div class="control-group">
											<label for="textfield" class="control-label">System Requirements <span class="red_star"> *</span></label>
											<div class="controls field">
										<textarea name="system_req" rows="2" class="input-xlarge" placeholder="" cols="30" id="system_req"><?php echo $_SESSION['s']['system_req'];?>
</textarea> 

<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['system_reqErr']->value;?>
 </div>											
											</div>
										</div>
									</div>
<div class="span6">		

	<div class="control-group">
											<label for="textfield" class="control-label">Brand <span class="red_star"> *</span></label>
											<div class="controls field">
											<select name="brand" id="brand">
										<option value="">Select</option>
<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"brand",'options'=>$_smarty_tpl->tpl_vars['sw_brand']->value,'selected'=>$_SESSION['s']['brand']),$_smarty_tpl);?>

											</select>
<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['brandErr']->value;?>
 </div>
											</div>
										</div>
										
										
	 <div class="control-group">
											<label for="textfield" class="control-label"> Architecture<span class="red_star"> *</span></label>
											<div class="controls field">
<?php echo smarty_function_html_options(array('name'=>'architechture_no','class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"architechture_no",'options'=>$_smarty_tpl->tpl_vars['architechtures']->value,'selected'=>$_SESSION['s']['architechture_no']),$_smarty_tpl);?>


<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['architechture_noErr']->value;?>
 </div>										
											</div>
										</div>
										
										
											<div class="control-group">
											<label for="textfield" class="control-label">No. of PC / License <span class="red_star"> *</span></label>
											<div class="controls field">
											<select name="license_no" id="license_no">
											<option value="">Select</option>	
										<?php echo smarty_function_html_options(array('class'=>"input-xlarge",'placeholder'=>'','style'=>"clear:left",'id'=>"license_no",'options'=>$_smarty_tpl->tpl_vars['license_nos']->value,'selected'=>$_SESSION['s']['license_no']),$_smarty_tpl);?>

											</select>
											<div class="errorMsg error"><?php echo $_smarty_tpl->tpl_vars['license_noErr']->value;?>
</div>
											</div>
										</div>

	
									
								<div class="control-group">
											<label for="password" class="control-label">Description<span class="red_star"></span></label>
											<div class="controls">
                                  
												<textarea name="description" rows="2" class="input-xlarge" placeholder="" cols="30" id="description" value="description"><?php echo $_SESSION['s']['description'];?>
</textarea> 
											</div>
										</div>
																
								
									</div>
						<div class="span12">
										<div class="form-actions">
									<input onclick="return validate_sd()" type="submit" name="next" id="submit_next" value="Next" class="btn btn-primary">
									<?php if (!empty($_SESSION['s']['confirm'])) {?>  											
									<input onclick="return validate_sd()" type="submit" name="confirm" id="submit_confirm" value="Confirm" class="btn btn-primary">
				                     <?php }?>   
											
											<a href="list_software.php"><button type="button" class="btn regCancel" onclick="return cancelfunction()">Cancel</button></a>
											
										</div>
									</div>	
								
							</div>
						</div>
						</div>
						
					<input type="hidden" id="next_hdn" name="next_hdn">
					<input type="hidden" id="confirm_hdn" name="confirm_hdn">
					
					
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
?>


<?php }
}
