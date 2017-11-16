{* Purpose : To Edit hardware details.
   Created : Gayathri
   Date : 16-06-2016 *}
   
	{include file='include/header.tpl'}	
	<div id="page_wrapper">
{include file='include/menu.tpl'}
	
	
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
							<a href="edit_hardware_inventory_details.php?id={$getid}">Edit Hardware</a>
						</li>
					</ul>
					
				</div>
				
								
				
					
					<div class="row-fluid  footer_div">
					
					
					<div class="span12">
					
								<form action="edit_hardware_inventory_details.php?id={$getid}" method="POST" class="form-horizontal form-column form-bordered form-wizard ui-formwizard" id="formID" novalidate="novalidate">
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
								<input name="inventory_no" class="input-xlarge" placeholder="" type="text" id="inventory_no" value="{$smarty.session['h'].inventory_no}"/> 
								<div class="errorMsg error">{$inventory_noErr} </div>
								</div>
							</div>
								<div class="control-group">
		<label for="textfield" class="control-label">Location <span class="red_star"> *</span></label>
		<div class="controls field">
		<select name="state_id" id="state_id">
		<option value="">Select</option>
{html_options class="input-medium" placeholder="" style="clear:left"  options=$state selected=$smarty.session['h'].state_id}
	</select>
	<select name="district_id" id="district_id">
	<option value="">Select</option>
{html_options class="input-large" placeholder="" style="clear:left"  options=$district selected=$smarty.session['h'].district_id}
</select>		
		<div class="errorMsg error">{$stateErr} </div>
		</div>
	</div>			
						 
						</div>
								

<div class="span6">		
    <div class="control-group">
		<label for="textfield" class="control-label">Asset Description <span class="red_star">* </span></label>
		<div class="controls field">
		<input name="asset_desc" class="input-xlarge" placeholder="" type="text" id="asset_desc" value="{$smarty.session['h'].asset_desc}"/> 
		<div class="errorMsg error">{$asset_descErr} </div>		
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
		
  				{include file='include/footer.tpl'}
		
		</div>
	
	<input type="hidden" value="/" id="css_root">
{include file='include/footer_js.tpl'}