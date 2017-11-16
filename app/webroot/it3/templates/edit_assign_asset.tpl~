{* Purpose : To edit assign asset.
   Created : Gayathri
   Date : 22-06-2016 *}		
		{include file='include/header.tpl'}
	
	<div id="page_wrapper">
	{include file='include/menu.tpl'}	
	
<input type="hidden" value="/" id="site_root"/>	
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Edit Assign Asset</h1>
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
							<a href="edit_assign_asset.php?id={$getid}">Edit Assign Asset</a>
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
											
											<div class="controls">
											<select name="app_users_id">
										<option value="">Select</option>
										{html_options class="input-xlarge" placeholder="" style="clear:left" id="employee" options=$emp_name selected=$app_users_id}
										</select>
				<div class="error">{$app_users_idErr} </div>

										</div>
										</div>
										<div class="control-group swDiv">
											<label for="textfield" class="control-label">Software Type <span class="red_star"> *</span></label>
											<div class="controls">
											<select name="sw_type_id">
										<option value="">Select</option>
												{html_options class="input-xlarge" placeholder="" style="clear:left" id="sw_type_id" options=$sw_type selected=$sw_type_id}			
										</select>
				<div class="error">{$sw_type_idErr} </div>
										</div>
										</div>
														<div class="control-group dn hwDiv">
											<label for="textfield" class="control-label">Hardware Type <span class="red_star"> *</span></label>
											
											<div class="controls">
											<select name="hw_type_id">
										<option value="">Select</option>
											{html_options class="input-xlarge" placeholder="" style="clear:left" id="hw_type_id" options=$hw_type selected=$hw_type_id}
										</select>
				<div class="error">{$hw_type_idErr} </div>
										</div>
										</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Brand <span class="red_star"> *</span></label>
										<div class="controls swDiv">
										<select name="it_sw_brand_id">
										<option value="">Select</option>
												{html_options class="input-xlarge" placeholder="" style="clear:left" id="it_sw_brand_id" options=$sw_brand selected=$it_sw_brand_id}
										</select>				
				<div class="error">{$it_sw_brand_idErr} </div>
										</div>
										
										<div class="controls dn hwDiv">
										<select name="it_hw_brand_id">
										<option value="">Select</option>
												{html_options class="input-xlarge" placeholder="" style="clear:left" id="it_hw_brand_id" options=$hw_brand selected=$it_hw_brand_id}
										</select>
				<div class="error">{$it_hw_brand_idErr} </div>
				
				
										</div>
										<div class="control-group">
											<label for="password" class="control-label">Description <span class="red_star"></span></label>
											<div class="controls">
                                  
												<textarea name="description" rows="2" class="input-xlarge" placeholder="" cols="30" id="description">{$description}</textarea> 

											</div>
										</div>
										</div>		
										
												
										
		
										
										</div>
								
									
<div class="span6">		
        <div class="control-group">
        
										<label for="textfield" class="control-label">Asset Type <span class="red_star"> *</span></label> 
										
										<div class="controls">
									
				<input type="radio" class="change_asset_type" name="type"{if $type && $type == 'S'}{'checked'}{/if} value="S"> Software
             <input type="radio" class="change_asset_type" name="type"{if $type && $type == 'H'}{'checked'} {/if} value="H"> Hardware
								  
										  <div class="error">{$typeE} </div>
										  
										 </div>
										</div>
								<div class="control-group swDiv">
											<label for="password" class="control-label">Edition <span class="red_star"> *</span></label>
											<div class="controls">
											<select name="edition_it_id">
										<option value="">Select</option>
												{html_options class="input-xlarge" placeholder="" style="clear:left" id="edition" options=$s_edition selected=$edition_it_id}
											</select>
<div class="error">{$it_idErr} </div>
											</div>
										</div>		
											<div class="control-group dn hwDiv">
											<label for="password" class="control-label">Inventory No <span class="red_star"> *</span></label>
											<div class="controls">
											<select name="inventory_it_id">
										<option value="">Select</option>
												{html_options class="input-xlarge" placeholder="" style="clear:left" id="inventory" options=$h_inventory selected=$inventory_it_id} 
											</select>
<div class="error">{$it_idErr} </div>
											</div>
										</div> 
										
											<div class="control-group">
											<label for="textfield" class="control-label">Status <span class="red_star"> *</span></label>
											<div class="controls">
	{html_options name=status class="input-xlarge" placeholder="" style="clear:left" id="status" options=$assignasset_status selected=$status}	
<div class="error">{$statusErr} </div>
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
			{include file='include/footer.tpl'}
		
		</div>
	
	<input type="hidden" value="/" id="css_root">

{include file='include/footer_js.tpl'}
