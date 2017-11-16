<?php
/* Smarty version 3.1.29, created on 2017-11-16 18:16:04
  from "C:\xampp\htdocs\bigoffice\app\webroot\it\templates\fr_it_home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0d888cc2aca8_53621070',
  'file_dependency' => 
  array (
    'e517a5559ddb5c2e461d11aa61405f4c9da60f66' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bigoffice\\app\\webroot\\it\\templates\\fr_it_home.tpl',
      1 => 1473234056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d888cc2aca8_53621070 ($_smarty_tpl) {
?>


		
		<!-- basic styles -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">		
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
	<link rel="stylesheet" media="screen" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
		
	<!-- colorbox -->
	<link rel="stylesheet" href="css/plugins/colorbox/colorbox.css">
	<!-- ace styles -->
	<link rel="stylesheet" href="css/ace.min.css">
	<link rel="stylesheet" href="css/ace-rtl.min.css">
	<link rel="stylesheet" href="css/ace-skins.min.css">		
	<link rel="stylesheet" href="css/jqueryui-editable.css">
	
	<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
	<link rel="stylesheet" href="css/calhome/eventCalendar.css">
	<!-- Theme CSS file: it makes eventCalendar nicer -->
	<link rel="stylesheet" href="css/calhome/eventCalendar_theme_responsive.css">
	
	<link rel="stylesheet" href="css/jquery.bxslider.css">
 
	<style type="textcss">
	.ui-dialog .ui-dialog-titlebar{background:#438EB9; color:#ffffff;padding:.4em 1em}
	.ui-dialog .ui-dialog-titlebar-close{color:#fff}
	</style>
	 

		

			
	<!-- themes -->
	<link rel="stylesheet" href="css/themes/blue.css">
   
	<div class="widget-body">
	
	
		<div class="widget-main no-padding">
			<div>
				<div class="dialogs scrollable" data-start ="top" data-height="455" data-visible="true">
					<div class="clearfix">	
								<div class="row">
									<div class="col-sm-9" >
										<div style="position:absolute;right:15px;z-index:99999">										
										<a href="fr_add_ticket.php" class="iframeBox" val="42_95"><button class="btn btn-xs btn-info"><i class="icon-plus"></i> Create Ticket
							          </button></a> 
							         </div>
										<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#hw">
														<i class="green ace-icon fa fa-home bigger-120"></i>
														My Hardware
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#sw">
														My Software
													</a>
												</li>
								            
								            <li>
													<a data-toggle="tab" href="#car">
														Change Asset Req. <span class="badge badge-danger"><span class="count" val="$asset_count" id="ast_cnt"><?php if ($_smarty_tpl->tpl_vars['asset_count']->value > 0) {
echo $_smarty_tpl->tpl_vars['asset_count']->value;
}?></span></span>
													</a>
												</li>
												<li>
													<a data-toggle="tab" href="#tk">
														Help Desk <span class="badge badge-danger"><span class="count" val="$ticket_count" id="tkt_cnt"><?php if ($_smarty_tpl->tpl_vars['ticket_count']->value > 0) {
echo $_smarty_tpl->tpl_vars['ticket_count']->value;
}?></span></span>
													</a>
												</li>
											</ul>

											<div class="tab-content"  style="border:1px solid #c5d0dc">
											<div id="car" class="tab-pane fade">
											<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG_ASSET']->value) {
echo $_smarty_tpl->tpl_vars['ALERT_MSG_ASSET']->value;
} else { ?>	
											<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">																					
											<span id="message"  class="dn hide-1">
    											<div id="flashMessage" class="alert alert-success"  style="margin-bottom:10px;">
    												<button  class="close" id="1">×</button>
        												Change asset req deleted successfully.
        										</div>
											</span>											
												<thead>
													<tr role="row">
														<th width="500" class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Message</th>
														<th  width="150"  class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Type</th>
														<th width="150" class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Created Date</th>
														<th width="150" class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">
															Status
														</th>
														<th width="150">
															Options
														</th>
												</thead>

												<tbody>	
												<?php
$_from = $_smarty_tpl->tpl_vars['data_asset']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>		
								              <?php if ($_smarty_tpl->tpl_vars['item']->value['created_date']) {?>
												<tr role="row" class='row-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'>
														<td>
															<a href="fr_view_change_asset.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="iframeBox"  val="40_70"><?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>
</a>
														</td>
														<td>
														<?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>

														</td>
														<td class="hidden-480"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>

														<td class="hidden-480">
															<span class="label label-sm label-<?php echo $_smarty_tpl->tpl_vars['item']->value['status_cls'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</span>
														</td>
														<td>
															<a href="javascript:void(0)" id='<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
' class='deletedata' val="asset"  rel="tooltip" title="Remove" style=""><button class="btn btn-xs btn-info" val="40_70"><i class="icon-remove"></i></button></a>
														</td>
												</tr>
												 	<?php }?>
												<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>
												</tbody>
												</table>
												<?php }?>
											

												</div>
	
												<div id="hw" class="tab-pane fade in active">
												<?php
$_from = $_smarty_tpl->tpl_vars['data_hardware']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>	
													<div class="profile-user-info">
														<div class="profile-info-row">
															
															<div class="profile-info-name"> Type </div>
															
																<div class="profile-info-value">
															
																	<span><b><?php echo $_smarty_tpl->tpl_vars['item']->value['hw_type'];?>
</b></span>
																		<a href="fr_asset_change_user.php?type=H" rel="tooltip" title="Request Change" style="float:right;margin-right:150px;" class="iframeBox" val="40_70"><button class="btn btn-xs btn-info" val="40_70"><i class="icon-pencil"></i> Change</button></a>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Brand </div>

																	<div class="profile-info-value">
																		<i class="fa fa-map-marker light-orange bigger-110"></i>
																		<span><?php echo $_smarty_tpl->tpl_vars['item']->value['brand'];?>
 &nbsp;</span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Model ID </div>

																	<div class="profile-info-value">
																		<span><?php echo $_smarty_tpl->tpl_vars['item']->value['model_id'];?>
</span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Serial No. </div>

																	<div class="profile-info-value">
																		<span><?php echo $_smarty_tpl->tpl_vars['item']->value['serial_no'];?>
</span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Description </div>

																	<div class="profile-info-value">
																		<span><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</span>
																	</div>
																	
																</div>
																
															</div>
															<hr>
													<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_local_item;
}
if ($__foreach_item_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_item;
}
if ($__foreach_item_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_1_saved_key;
}
?>
													</div>

												<div id="sw" class="tab-pane fade">
												
												
													<?php
$_from = $_smarty_tpl->tpl_vars['data_software']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_2_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_2_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_2_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>	
												<div class="profile-user-info">
																<div class="profile-info-row">
															
																	<div class="profile-info-name"> Type </div>
																	<div class="profile-info-value">
																	
																		<span><b><?php echo $_smarty_tpl->tpl_vars['item']->value['sw_type'];?>
</b></span>
																	<a href="fr_asset_change_user.php?type=S" rel="tooltip" title="Request Change" style="float:right;margin-right:150px" class="iframeBox" val="40_70"><button class="btn btn-xs btn-info" val="40_70"><i class="icon-pencil"></i> Change
							</button></a>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Brand </div>

																	<div class="profile-info-value">
																		<i class="fa fa-map-marker light-orange bigger-110"></i>
																		<span><?php echo $_smarty_tpl->tpl_vars['item']->value['brand'];?>
</span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Edition </div>

																	<div class="profile-info-value">
																		<span><?php echo $_smarty_tpl->tpl_vars['item']->value['edition'];?>
</span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Description </div>

																	<div class="profile-info-value">
																		<span><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</span>
																	</div>
																</div>
												       
															</div>
															<hr>
										 <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_2_saved_local_item;
}
if ($__foreach_item_2_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_2_saved_item;
}
if ($__foreach_item_2_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_2_saved_key;
}
?>
												
												</div>

												<div id="tk" class="tab-pane fade">
												<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG_TICKET']->value) {
echo $_smarty_tpl->tpl_vars['ALERT_MSG_TICKET']->value;
} else { ?>
												<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">												
												<span id="message1" class="dn hide-2">
   												<div id="flashMessage" class="alert alert-success"  style="margin-bottom:10px;">
    													<button  class="close" id="2">×</button>
        													Ticket deleted successfully.
   												</div>
												</span>										
												<thead>
													<tr role="row">
														<th width="500" class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Subject</th>
														<th  width="150"  class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Priority</th>
														<th width="150" class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Created Date</th>
														<th width="150" class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">
															Status
														</th>
														<th width="150">
															Options
														</th>
												</thead>

												<tbody>
												<?php
$_from = $_smarty_tpl->tpl_vars['data_ticket']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_3_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_3_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_3_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>		
								              <?php if ($_smarty_tpl->tpl_vars['item']->value['priority']) {?>
												<tr role="row" class='row-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'>
														<td>
															<a href="fr_view_ticket.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="iframeBox"  val="40_70"><?php echo $_smarty_tpl->tpl_vars['item']->value['subject'];?>
</a>
														</td>
														<td>
														<?php echo $_smarty_tpl->tpl_vars['item']->value['priority'];?>

														</td>
														<td class="hidden-480"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>

														<td class="hidden-480">
															<span class="label label-sm label-<?php echo $_smarty_tpl->tpl_vars['item']->value['status_cls'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</span>
														</td>
														<td>						
														 <a href="javascript:void(0)" id='<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
' class='deletedata' val="ticket" rel="tooltip" title="Remove" style="" ><button class="btn btn-xs btn-info" val="40_70"><i class="icon-remove"></i></button></a>
														</td>
												</tr>
													<?php }?>
												<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_3_saved_local_item;
}
if ($__foreach_item_3_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_3_saved_item;
}
if ($__foreach_item_3_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_3_saved_key;
}
?>
												</tbody>
											  </table>
												<?php }?>
												</div>

												
											</div>
										
									
									
									</div><!-- /.col -->
								</div>	
												
												
												</div></div></div>

												
										</div>			
													
													
												</div>
															
															
														</div>
											
								</div>
								
								
		</div>					
	<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
		
		<?php echo '<script'; ?>
 src="js/jquery.cookie.js"><?php echo '</script'; ?>
>
		
		<?php echo '<script'; ?>
 src="js/jquery-ui-1.10.4.custom.min.js"><?php echo '</script'; ?>
>

		<?php echo '<script'; ?>
 src="js/plugins/colorbox/jquery.colorbox-min.js"><?php echo '</script'; ?>
>



		<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

		<?php echo '<script'; ?>
 src="js/jquery-ui-1.10.3.custom.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
		
		

		<?php echo '<script'; ?>
 src="js/ace-extra.min.js"><?php echo '</script'; ?>
>
		
		<?php echo '<script'; ?>
 src="js/ace-elements.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/ace.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/bootbox.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/jquery.autosize.min.js"><?php echo '</script'; ?>
>
	
	<!--script src="js/jquery.easing.1.3.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jquery.touchSwipe.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jquery.imagesloaded.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/spin.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/portfolio.min.js"><?php echo '</script'; ?>
-->	
	<?php echo '<script'; ?>
 src="js/application.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jquery.scrollTo-1.4.3.1-min.js" type="text/javascript"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="js/bootstrap-editable.min.js"><?php echo '</script'; ?>
>
	
	<?php echo '<script'; ?>
 src="js/cal_home/jquery.eventCalendar.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/jquery.bxslider.min.js"><?php echo '</script'; ?>
>

	
	<?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>							
						
								
								
												
<?php }
}
