{* Purpose : To edit Hardware details.
   Created : Gayathri
   Date : 15-06-2016 *}
   
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
							<a href="edit_hardware_confirmation.php?id={$getid}">Edit Hardware</a>
						</li>
					</ul>
					
				</div>
				
								
				
					
					<div class="row-fluid  footer_div">
					
					
					<div class="span12">
					
								<form action="edit_hardware_confirmation.php?id={$getid}" method="POST" class="form-horizontal form-column form-bordered form-wizard ui-formwizard" id="formID" novalidate="novalidate">
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
										
											
				<li class="">
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
											
																				
											<li class="active">
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
								<h3><i class="icon-list"></i> Hardware Details</h3>
							</div>
							
						
							<div class="box-content nopadding">
								
								
								
								
								
									<div class="span6">
									
						<div class="control-group">
											<label for="textfield" class="control-label">Type </label>
											<div class="controls">
	                            {ucfirst($smarty.session['h'].hardware_type)}
										</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">Color </label>
											<div class="controls">
											{$smarty.session['h'].color}
													</div>
										</div>
										
										
										
											<div class="control-group">
											<label for="textfield" class="control-label">Model ID / Name </label>
											<div class="controls">
											{$smarty.session['h'].model_id}
											</div>
										</div>
										<div class="control-group">
											<label for="password" class="control-label">Description</label>
											<div class="controls">
												{$smarty.session['h'].description}
										</div>
										</div>
								
									</div>
									
								

<div class="span6">	

										<div class="control-group">
											<label for="textfield" class="control-label">Brand </label>
											<div class="controls">
										{ucfirst($smarty.session['h'].brand_name)}
													</div>
										</div>
										
										<div class="control-group">
											<label for="password" class="control-label">Serial Number </label>
											<div class="controls">
											{$smarty.session['h'].serial_no}
										</div>
										</div>
										<div class="control-group">
										<label for="textfield" class="control-label">Subscription validity   </label>
											<div class="controls">
											{if ($smarty.session['h'].validitydate == '')}
												{$smarty.session['h'].validityyear}
											{else}
											{$smarty.session['h'].validityyear} ( {$smarty.session['h'].validitydate} )
											{/if}											
											</div>
									</div>
										
										
									
										
							
										
									</div>

								
							</div>
						</div>
				


							
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i> Inventory Details</h3>
								</div>
							
						
							<div class="box-content nopadding">
											<div class="span6">
									
													
										<div class="control-group">
											<label for="textfield" class="control-label">Inventory No </label>
											<div class="controls">
										    {$smarty.session['h'].inventory_no}
												</div>
										</div>
											<div class="control-group">
											<label for="textfield" class="control-label">Location </label>
											<div class="controls">
												{$smarty.session['h'].district_name} ( {$smarty.session['h'].state_name} )
													</div>
										</div>
														
																			
		
										
		</div>
									
									
						
									

									<div class="span6">	
									<div class="control-group">
											<label for="textfield" class="control-label">Asset Description </label>
											<div class="controls">
										 {$smarty.session['h'].asset_desc}
											</div>
										</div>								
						
									
										
										
									</div>
						</div>
						</div>
				

						<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i> Pricing Details</h3>
							</div>
													
							<div class="box-content nopadding">
								
								
								
					
												
																<div class="span6" style="">
										<div class="control-group">
											<label for="textfield" class="control-label">Amount </label>
											<div class="controls">
											{$smarty.session['h'].amount} {$smarty.session['h'].currencytype}
													</div>
										</div>
										
										
																					
									<div class="control-group">
											<label for="textfield" class="control-label">Paid By </label>
											<div class="controls">
											{$smarty.session['h'].paidby}
												</div>
										</div>
									
                         <div class="control-group">
		                         <label for="password" class="control-label">Attach Warranty </label>
									    <div class="controls">
										{if !empty($smarty.session['h'].warfile_edit)}
									    	<a href = "edit_hardware_confirmation.php?id={$smarty.get.id}&action=download&file={$smarty.session['h'].warfile_edit}">{$smarty.session['h'].warfile_edit}</a> 
										{else}									    
									    	<a href = "edit_hardware_confirmation.php?id={$smarty.get.id}&action=download&file={$smarty.session['h'].warfile}">{$smarty.session['h'].warfile}</a> 
										{/if}	
										</div>
										</div>
									
										
									</div>
									
								
									<div class="span6">									

	<div class="control-group">
											<label for="password" class="control-label">Paid Date</label> </label>
											<div class="controls">
											{$smarty.session['h'].paiddate}
											</div>
										</div>
										
										
	<div class="control-group">
											<label for="password" class="control-label">Attach Bill</label> </label>
											<div class="controls">
												{if !empty($smarty.session['h'].billfile_edit)}
												<a href = "edit_hardware_confirmation.php?id={$smarty.get.id}&action=download&file={$smarty.session['h'].billfile_edit} ">{$smarty.session['h'].billfile_edit} </a>
												{else} 
												<a href = "edit_hardware_confirmation.php?id={$smarty.get.id}&action=download&file={$smarty.session['h'].billfile} ">{$smarty.session['h'].billfile} </a> 
											{/if}	
											</div>
						</div>

								
									</div>
					
							
								
							</div>
						</div>
				

						
<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i> Vendor Details</h3>
							</div>
							
						
							<div class="box-content nopadding">
								
								
								
					
												
																<div class="span6" style="">
				<div class="control-group">
											<label for="textfield" class="control-label">Company Name</label>
											<div class="controls">
											{$smarty.session['h'].vendor_name}
													</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">Contact Number</label>
											<div class="controls">
											{$smarty.session['h'].vendor_phone}
											</div>
										</div>
										<div class="control-group">
											<label for="textfield" class="control-label">City </label>
											<div class="controls">
											{$smarty.session['h'].vendor_city} 	
											</div>
										</div>											
										
									</div>
									
									
									<div class="span6">									
	
   <div class="control-group">
											<label for="textfield" class="control-label">Contact Person </label>
											<div class="controls">
											{$smarty.session['h'].vendor_person}	
											</div>
										</div>
	<div class="control-group">
											<label for="textfield" class="control-label">Address </label>
											<div class="controls">
											{$smarty.session['h'].vendor_address}																						
											</div>
										</div>
										
								
									</div>
					
							
										
							<div class="span12">
										<div class="form-actions">
										<a href="edit_hardware_vendor_details.php?id={$getid}"><button type="button" id="submit_previous" class="btn"><i class="icon-arrow-left"></i> Previous</button></a>
											<input type="submit" name="finish" id="submit_next" value="Finish" class="btn btn-primary">
											
											<a href="list_hardware.php"><button type="button" class="btn regCancel" onclick="return cancelfunction()">Cancel</button></a>
											
										</div>
									</div>	
								
							</div>
						</div>
				
						
							
							
						</div>
					
					
					
					<input type="hidden" id="next_hdn" name="next_hdn">
					<input type="hidden" id="confirm_hdn" name="confirm_hdn">
					<input type="hidden" id="previous_hdn" name="previous_hdn">
					<!--input type="hidden" id="end_date" value="02/06/2000"-->
					
					</form>

					
				</div>
					</div>
		
			</div>		
					
				</div>
		
			
  				{include file='include/footer.tpl'}
		
		</div>
	
	<input type="hidden" value="/" id="css_root">


{include file='include/footer_js.tpl'}
