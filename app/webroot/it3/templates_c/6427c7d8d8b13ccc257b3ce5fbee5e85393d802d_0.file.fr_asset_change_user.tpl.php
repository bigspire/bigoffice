<?php
/* Smarty version 3.1.29, created on 2017-11-16 18:16:13
  from "C:\xampp\htdocs\bigoffice\app\webroot\it\templates\fr_asset_change_user.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0d8895229093_35871902',
  'file_dependency' => 
  array (
    '6427c7d8d8b13ccc257b3ce5fbee5e85393d802d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bigoffice\\app\\webroot\\it\\templates\\fr_asset_change_user.tpl',
      1 => 1468319360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d8895229093_35871902 ($_smarty_tpl) {
?>

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

	<?php echo '<script'; ?>
 src="js/ace-extra.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
	
	<!--link rel="stylesheet" media="screen" href="css/plugins/jquery-ui/smoothness/jquery-ui.css"-->	
	
	
	<!--script src="js/jquery-ui-1.10.4.custom.min.js"><?php echo '</script'; ?>
-->
	<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/bootstrap-editable.min.js"><?php echo '</script'; ?>
>
	
	<?php echo '<script'; ?>
 src="js/plugins/colorbox/jquery.colorbox-min.js"><?php echo '</script'; ?>
>
	
	<?php echo '<script'; ?>
 src="js/jquery.autosize.min.js"><?php echo '</script'; ?>
>
	
	<?php echo '<script'; ?>
 src="js/jquery.sheepItPlugin-1.1.1.js"><?php echo '</script'; ?>
>
	

	
	

	</head>
	<body>


<div class="">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
       
          <h4 class="modal-title">Change Asset</h4>
        </div><div class="container"></div>
        <div class="">
		<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG1']->value) {?>
		<div class="alert alert-danger chgError">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<strong>
												<i class="icon-remove"></i>
												
											</strong>

											<?php echo $_smarty_tpl->tpl_vars['ALERT_MSG1']->value;?>

											<br>
										</div>
									<?php }?>	
										<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
        <div class="alert alert-block alert-success chgSuccess">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<p>
												
												<?php echo $_smarty_tpl->tpl_vars['ALERT_MSG']->value;?>

											</p>
									
											
										</div>
										<?php }?>
		
				 <div class="chgReqFrm" align="center">
		
<div class="" ><div class="" style="display: block;">
												<div class="no-padding">
											
<?php if (!$_smarty_tpl->tpl_vars['ALERT_MSG']->value && !$_smarty_tpl->tpl_vars['ALERT_MSG1']->value) {?>
			<form action="fr_asset_change_user.php?type=<?php echo $_smarty_tpl->tpl_vars['get_type']->value;?>
" id="formID" class="" method="post" accept-charset="utf-8">
			<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>			
								

									<div class="space-4"></div>
									
									

									<div class="space-4"></div>
									<div class="form-group" style="text-align:left">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Message <span class="red"> *</span> </label>

										<div class="col-sm-3">
											<textarea id="field0" rows="8" cols="48" name="message" ><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</textarea><br>
											<div class="error error0"><?php echo $_smarty_tpl->tpl_vars['messageErr']->value;?>
</div>
										
										</div>
									</div>
									
<div class="space-4"></div>
									
									
									
									
<div class="clearfix form-actions">

<input type="hidden" id="change_req" value="submit" name="submit">
										<div class="col-md-9">
											<input  rel="PE" class="btn btn-info btn-sm" value="Submit" id="btnReq" type="submit"/>
										</div>
									</div>
									
									
									
									
									<input type="hidden" value="PE" id="type">
								</form>
								<?php }?>
									</div><!-- /widget-main -->
											</div></div>
									</div>
        
		
        </div>
       
      </div>
    </div>
</div>
</body>
</html><?php }
}
