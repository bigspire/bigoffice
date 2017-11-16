/* function to validate add software details page */
function validate_sd(){
	//Note: assign field name
	var field_name = new Array('softwaretype','edition','subscription_based','license_no',
	'system_req','brand','architechture_no');
	//Note: assign field type
	var field_type = new Array("required","required","required","required","required","required",
	"required","required");		
	var field_msg = new Array('','','','','','','');		
	var field_error_msg = new Array('Please select the Type','Please enter the Edition',
	'Please select the subscription based ','Please select the No. of license',
	'Please enter the system requirements','Please select the brand',
	'Please select the Architecture ');		
	var field_adv_error_msg = new Array('','','','','','','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add software details page */
function validate_pd(){
 
	
	//Note: assign field name
	var field_name = new Array('amount','currency_type','paid_by','paid_date');
	//Note: assign field type
	var field_type = new Array("float","required","required","required");		
	var field_msg = new Array('','','','');		
	var field_error_msg = new Array('Please enter the amount','Please select the Currency Type','Please select the Paid By','Please enter the Paid Date');		
	var field_adv_error_msg = new Array('','','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add software details page */
function validate_vd(){
	//Note: assign field name
	var field_name = new Array('company_name','contact_number','city','contact_person','address');
	//Note: assign field type
	var field_type = new Array("required","phone","required","required","required");		
	var field_msg = new Array('','','','','');		
	var field_error_msg = new Array('Please enter the Company Name','Please enter the Contact Number','Please enter the City','Please enter the Contact Person Name','Please enter the Address');		
	var field_adv_error_msg = new Array('','','','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add hardware details page */
function validate_hd(){
	//Note: assign field name
	var field_name = new Array('hardware_type_id','color','model_id','it_brand_id','serial_no','subscription_validity');
	//Note: assign field type
	var field_type = new Array("required","required","required","required","required","required");		
	var field_msg = new Array('','','','','','');		
	var field_error_msg = new Array('Please select the type','Please enter the color ','Please enter the model id/name','Please select the brand','Please enter the serial number ','Please enter the Subscription validity ');		
	var field_adv_error_msg = new Array('','','','','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add hardware details page */
function validate_id(){
	//Note: assign field name
	var field_name = new Array('inventory_no','state_id','asset_desc','district_id');
	//Note: assign field type
	var field_type = new Array("required","required","required","required");		
	var field_msg = new Array('','','','');		
	var field_error_msg = new Array('Please enter the Inventory No ','Please select the State','Please enter the Asset Description','Please select the Location');		
	var field_adv_error_msg = new Array('','','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add hardware details page */
function validate_hpd(){
	//Note: assign field name
	var field_name = new Array('amount','currency_type','paid_by','paid_date');
	//Note: assign field type
	var field_type = new Array("float","required","required","required");		
	var field_msg = new Array('','','','');		
	var field_error_msg = new Array('Please enter the Amount','Please select the Currency type','Please select the Paid By','Please enter the Paid Date ');		
	var field_adv_error_msg = new Array('','','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add hardware details page */
function validate_hvd(){
	//Note: assign field name
	var field_name = new Array('company_name','contact_number','city','contact_person','address');
	//Note: assign field type
	var field_type = new Array("required","phone","required","required","required");		
	var field_msg = new Array('','','','','');		
	var field_error_msg = new Array('Please enter the Company Name','Please enter the Contact Number','Please enter the City','Please enter the Contact Person Name','Please enter the Address');		
	var field_adv_error_msg = new Array('','','','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add login details page */
function validate_login(){
	//Note: assign field name
	var field_name = new Array('app_users','username','server','login_type','password','status');
	//Note: assign field type
	var field_type = new Array("required","required","required","required","password","required");		
	var field_msg = new Array('','','','','','');		
	var field_error_msg = new Array('Please select the Employee','Please enter the Username ','Please enter the Server','Please select the Login Type','Please enter the Password','Please select the Status ');		
	var field_adv_error_msg = new Array('','','','','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add role details page */
function validate_role(){
	//Note: assign field name
	var field_name = new Array('role_name','RolePermission','status');
	//Note: assign field type
	var field_type = new Array("required","required","required");		
	var field_msg = new Array('','','');		
	var field_error_msg = new Array('Please enter the Role Name ','Please select the Permissions','Please select the Status');		
	var field_adv_error_msg = new Array('','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add hardware type details page */
function validate_hwtype(){
	//Note: assign field name
	var field_name = new Array('title','code','status');
	//Note: assign field type
	var field_type = new Array("required","required","required");		
	var field_msg = new Array('','','');		
	var field_error_msg = new Array('Please enter the Title','Please enter the CT Code','Please select the Status ');		
	var field_adv_error_msg = new Array('','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add software type details page */
function validate_swtype(){
	//Note: assign field name
	var field_name = new Array('title','status');
	//Note: assign field type
	var field_type = new Array("required","required");		
	var field_msg = new Array('','');		
	var field_error_msg = new Array('Please enter the Title','Please select the Status ');		
	var field_adv_error_msg = new Array('','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add login type details page */
function validate_logtype(){
	//Note: assign field name
	var field_name = new Array('title','status');
	//Note: assign field type
	var field_type = new Array("required","required");		
	var field_msg = new Array('','');		
	var field_error_msg = new Array('Please enter the Title','Please select the Status ');		
	var field_adv_error_msg = new Array('','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}

/* function to validate add brand details page */
function validate_brand(){
	//Note: assign field name
	var field_name = new Array('title','status','type');
	//Note: assign field type
	var field_type = new Array("required","required","required");		
	var field_msg = new Array('','','');		
	var field_error_msg = new Array('Please enter the Title','Please select the Status','Please select the Type ');		
	var field_adv_error_msg = new Array('','','');		
	var field_length=field_name.length;		
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,'');		
	if(validation == true){
		return true;
	}else{
		return false;
	}	 
	return false;
}



