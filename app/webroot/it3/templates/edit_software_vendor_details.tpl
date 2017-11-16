
		{include file='include/header.tpl'}
	
	<div id="page_wrapper">
	{include file='include/menu.tpl'}
	
	
	
		<input type="hidden" value="/" id="site_root"/>	
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Edit Software</h1>
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
							<a href="edit_software_vendor_details.php?id={$getid}">Edit Software</a>
						</li>
					</ul>
					
				</div>
				
								
				
					
					<div class="row-fluid  footer_div">
					
					
					<div class="span12">
					
								<form action="edit_software_vendor_details.php?id={$getid}" method="POST" class="form-column form-bordered form-horizontal form-wizard ui-formwizard" id="formID" novalidate="novalidate">
									<div class="step ui-formwizard-content" id="firstStep" style="width:99%;margin-top:20px;">
										<ul class="wizard-steps steps-4">
												<li class="">
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
													</span>
													<span class="description">
																					Pricing Details 		
																				</span>
												</div>
											</li>
											
																				
											<li class="active">
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
								<h3><i class="icon-list"></i> Vendor Details</h3>
							</div>
							
						
							<div class="box-content nopadding">
								
								
								
								
								
									<div class="span6">
									
										<div class="control-group">
											<label for="textfield" class="control-label">Company Name <span class="red_star"> *</span></label>
											<div class="controls field">
												<input name="vendor_name" class="input-xlarge" placeholder="" type="text" id="company_name" value="{$smarty.session['s'].vendor_name}"/> 	
											<div class="errorMsg error">{$company_nameErr}</div>
											</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">Contact Number <span class="red_star"> *</span></label>
											<div class="controls field">
												<input name="vendor_phone" class="input-xlarge" placeholder="" type="text" id="contact_number" value="{$smarty.session['s'].vendor_phone}"/> 	
											<div class="errorMsg error">{$contact_numberErr} {$contact_numberE} {$contact_numberEr}</div>
											</div>
										</div>
										<div class="control-group">
											<label for="textfield" class="control-label">City <span class="red_star"> *</span></label>
											<div class="controls field">
												<input name="vendor_city" class="input-xlarge" placeholder="" type="text" id="city" value="{$smarty.session['s'].vendor_city}"/> 	
											<div class="errorMsg error">{$cityErr} </div>
											</div>
										</div>											
									
								
									</div>
									
							

<div class="span6">	
	
   <div class="control-group">
											<label for="textfield" class="control-label">Contact Person <span class="red_star"> *</span></label>
											<div class="controls field">
												<input name="vendor_person" class="input-xlarge" placeholder="" type="text" id="contact_person" value="{$smarty.session['s'].vendor_person}"/> 	
											<div class="errorMsg error">{$contact_personErr} </div>
											</div>
										</div>
	<div class="control-group">
											<label for="textfield" class="control-label">Address <span class="red_star"> *</span></label>
											<div class="controls field">
													<textarea name="vendor_address" rows="2" class="input-xlarge" placeholder="" cols="30" id="address">{$smarty.session['s'].vendor_address}</textarea> 
												<div class="errorMsg error">{$addressErr}</div>	
												
											</div>
										</div>
										
										
	

								
</div>


										
										
							<div class="span12">
										<div class="form-actions">
										<input type="submit" class="btn" id="submit_previous" name="previous" value="Previous">
										<input onclick="return validate_vd()" type="submit" name="next" id="submit_next" value="Next" class="btn btn-primary">
				
											
											<a href="list_software.php"><button type="button" class="btn regCancel" onclick="return cancelfunction()">Cancel</button></a>
											
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
