{* Purpose : To add ticket in front end.
   Created : Nikitasa
   Date : 02-07-2016 *}
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<head>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">		
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
	
	<!-- colorbox -->
	<link rel="stylesheet" href="css/plugins/colorbox/colorbox.css">
	
	<link rel="stylesheet" href="css/ace.min.css">
	<link rel="stylesheet" href="css/ace-rtl.min.css">
	<link rel="stylesheet" href="css/ace-skins.min.css">

	<script src="js/ace-extra.min.js"></script>
	<script src="js/jquery.min.js"></script>
	
	<!--link rel="stylesheet" media="screen" href="css/plugins/jquery-ui/smoothness/jquery-ui.css"-->	
	<script src="js/main.js"></script>

	
	<!--script src="js/jquery-ui-1.10.4.custom.min.js"></script-->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-editable.min.js"></script>
	
	<script src="js/plugins/colorbox/jquery.colorbox-min.js"></script>
	
	<script src="js/jquery.autosize.min.js"></script>
	
	<script src="js/jquery.sheepItPlugin-1.1.1.js"></script>
	
	{literal}
	<style>
	.form-group {
		margin-bottom: 6px;
	}
	</style>
	{/literal}

	
	

	</head>
	<body>


<div class="">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
       
          <h4 class="modal-title">Create Ticket</h4>
        </div><div class="container"></div>
        <div class="">
									{if $ALERT_MSG1}
										<div class="alert alert-danger chgError">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<strong>
												<i class="icon-remove"></i>
												Oops!
											</strong>
											{$ALERT_MSG1}
											<br>
										</div>
									{/if}	
									{if $ALERT_MSG}	
       							 <div class="alert alert-block alert-success chgSuccess">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										<p>
											{$ALERT_MSG}
										</p>
										</div>
									{/if}
		
				 <div class="chgReqFrm" align="center">
		
<div class="" ><div class="" style="display: block;">
												<div class="no-padding">
											
{if !$ALERT_MSG1 and !$ALERT_MSG}
			<form action="fr_add_ticket.php" id="formID" enctype= "multipart/form-data" method="post" accept-charset="utf-8">
									

									<div class="space-4"></div>
									
									<div class="form-group" style="clear:left;text-align:left">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Priority <span class="red"> *</span></label>

										<div class="col-sm-3">
											{html_options name='priority' class="input-medium" placeholder=""  style="width:300px;" id="HrEmployeeRecStatus" options=$priority_type selected=$smarty.post.priority}			    
											<br>
											<div class="error error0">{$priorityErr}</div>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group" style="text-align:left;clear:left;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Subject <span class="red"> *</span></label>

										<div class="col-sm-3">
											<input type="text" name="subject" value="{$smarty.post.subject}" style="width:300px;"><br>
											<div class="error error0">{$subjectErr}</div>
										
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group" style="text-align:left;clear:left;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Description <span class="red"> *</span></label>

										<div class="col-sm-3">
											<textarea id="field0" rows="2" cols="40" name="description">{$smarty.post.description}</textarea><br>
											<div class="error error0">{$descriptionErr}</div>
										
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group" style="text-align:left;clear:left;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Type <span class="red"> *</span></label>

										<div class="col-sm-3">
											{html_options name='it_ticket_type' class="input-medium" placeholder=""  style="width:300px;" id="HrEmployeeRecStatus" options=$ticket_data selected=$smarty.post.it_ticket_type}			    
											<br>
											<div class="error error0">{$ticket_typeErr}</div>
										
										</div>
									</div>
									
<div class="space-4"></div>
									
									<div class="form-group" style="text-align:left;clear:left;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Attachment </label>

										<div class="col-sm-3">
											<input type="file" name="ticket_file" class="upload" id="ticket_file"/>
											<div class="error error0">{$attachmentuploadErr}</div>
										
										</div>
									</div>
									
									
									
<div class="clearfix form-actions">
<input type="hidden" id="change_req" value="submit" name="submit">
										<div class="col-md-9">
											<input  rel="PE" class="btn btn-info btn-sm" value="Submit" id="btnReq" type="submit"/>
										</div>
									</div>
									
									
									
									
									<input type="hidden" value="PE" id="type">
								</form>
								{/if}
									</div><!-- /widget-main -->
											</div></div>
									</div>
        
		
        </div>
       
      </div>
    </div>
</div>
</body>
</html>