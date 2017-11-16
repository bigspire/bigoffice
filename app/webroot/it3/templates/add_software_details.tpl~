{* Purpose : To add software details.
   Created : Gayathri
   Date : 04-06-2016 *}
   

	{include file='include/header.tpl'}
	<div id="page_wrapper">
{include file='include/menu.tpl'}
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
{html_options class="input-xlarge"  style="clear:left"  options=$row selected=$smarty.session['s'].softwaretype}										
</select>

<div class="errorMsg error" id="">{$softwaretypeErr} </div>

										</div>
										</div>
										
										
										<div class="control-group">
											<label for="textfield" class="control-label">Edition <span class="red_star"> *</span></label>
											<div class="controls field">
										
 <input name="edition" class="input-xlarge" placeholder="" type="text" id="edition" value="{$smarty.session['s'].edition}"/> 
 {$edition}
  <div class="errorMsg error">{$editionErr}{$editionE} </div>
											</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">Subscription Based <span class="red_star"> *</span></label>
											<div class="controls field">
												
											{html_options name=subscription_based class="input-xlarge change_subscription_based" placeholder="" style="clear:left" id="subscription_based" options=$subscription_based selected=$smarty.session['s'].subscription_based}
															
											<div class="errorMsg error ">{$subscription_basedErr} </div>
											</div>
										
										<div class="control-group">
											<label for="password" class="control-label sValidity">Validity <span class="red_star"> *</span></label>
											<div class="controls field">
											{html_options name=subscription_validity class="input-small sValidity" placeholder="" style="clear:left" id="subscription_validity" options=$subscription_validity selected=$smarty.session['s'].subscription_validity}
											
 <input name="valid_till" class="input-medium datepick sValidity" placeholder="Valid Till" type="text" id="valid_till" value="{$smarty.session['s'].valid_till}"/> 

 											<!--span class="error" style="color:#ff0000" >{$valid_tillErr}</span-->

 
											<div class="errorMsg error sValidity">{$subscription_validityErr} </div>

											</div>
										</div>
																				
	
										</div>
										<div class="control-group">
											<label for="textfield" class="control-label">System Requirements <span class="red_star"> *</span></label>
											<div class="controls field">
										<textarea name="system_req" rows="2" class="input-xlarge" placeholder="" cols="30" id="system_req">{$smarty.session['s'].system_req}</textarea> 

<div class="errorMsg error">{$system_reqErr} </div>											
											</div>
										</div>
									</div>
<div class="span6">		

	<div class="control-group">
											<label for="textfield" class="control-label">Brand <span class="red_star"> *</span></label>
											<div class="controls field">
											<select name="brand" id="brand">
										<option value="">Select</option>
{html_options class="input-xlarge" placeholder="" style="clear:left" id="brand" options=$sw_brand selected=$smarty.session['s'].brand}
											</select>
<div class="errorMsg error">{$brandErr} </div>
											</div>
										</div>
										
										
	 <div class="control-group">
											<label for="textfield" class="control-label"> Architecture<span class="red_star"> *</span></label>
											<div class="controls field">
{html_options name=architechture_no class="input-xlarge" placeholder="" style="clear:left" id="architechture_no" options=$architechtures selected=$smarty.session['s'].architechture_no}

<div class="errorMsg error">{$architechture_noErr} </div>										
											</div>
										</div>
										
										
											<div class="control-group">
											<label for="textfield" class="control-label">No. of PC / License <span class="red_star"> *</span></label>
											<div class="controls field">
											<select name="license_no" id="license_no">
											<option value="">Select</option>	
										{html_options class="input-xlarge" placeholder="" style="clear:left" id="license_no" options=$license_nos selected=$smarty.session['s'].license_no}
											</select>
											<div class="errorMsg error">{$license_noErr}</div>
											</div>
										</div>

	
									
								<div class="control-group">
											<label for="password" class="control-label">Description<span class="red_star"></span></label>
											<div class="controls">
                                  
												<textarea name="description" rows="2" class="input-xlarge" placeholder="" cols="30" id="description" value="description">{$smarty.session['s'].description}</textarea> 
											</div>
										</div>
																
								
									</div>
						<div class="span12">
										<div class="form-actions">
									<input onclick="return validate_sd()" type="submit" name="next" id="submit_next" value="Next" class="btn btn-primary">
									{if !empty ($smarty.session['s'].confirm)}  											
									<input onclick="return validate_sd()" type="submit" name="confirm" id="submit_confirm" value="Confirm" class="btn btn-primary">
				                     {/if}   
											
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
  				{include file='include/footer.tpl'}
		
		</div>
	
	<input type="hidden" value="/" id="css_root">

{include file='include/footer_js.tpl'}

