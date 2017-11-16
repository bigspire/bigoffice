{* Purpose : To edit ticket.
   Created : Nikitasa
   Date : 1-06-2016 *}

	{include file='include/header.tpl'}		
	<div id="page_wrapper">
	{include file='include/menu.tpl'}
	
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Edit Ticket</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="list_ticket.php">Help Desk</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="edit_ticket.php?id={$smarty.get.id}&status_id={$smarty.get.status_id}">Edit Ticket</a>
						</li>
					</ul>
					
				</div>
				<div class="row-fluid  footer_div">
					<div class="span12">
					<form action="post.php" method="POST" class="form-horizontal form-wizard ui-formwizard" id="ss" novalidate="novalidate">	
					</form>
						
					<form action="edit_ticket.php?id={$g_id}&status_id={$smarty.get.status_id}" id="formID" class="form-horizontal form-column form-bordered" enctype="multipart/form-data" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>								
	
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i>Ticket Details</h3>
							</div>
							<div class="box-content nopadding">
                     <div class="span6">
                     		<div class="control-group">
											<label for="textfield" class="control-label">Employee Name</label>
									<div class="controls">
											{$data.full_name}	
									</div>
									</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Subject</label>
									<div class="controls">
											{$data.subject}	
									</div>
									</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Priority</label>
									<div class="controls">
											{$priority}
									</div>
									</div>
								   <div class="control-group">
											<label for="textfield" class="control-label">Attachement</label>
											<div class="controls">
											<a href = "edit_ticket.php?id={$smarty.get.id}&action=download&file={$data.attach_file}">
											{$data.attach_file}
											</a>
											</div>
									</div>
				          </div>
	
	                   <div class="span6">
									<div class="control-group">
											<label for="textfield" class="control-label">Type</label>
											<div class="controls">
											{$data.type}
										   </div>
									</div>	
									<div class="control-group">
											<label for="textfield" class="control-label">Decription</label>
											<div class="controls">
											{$data.description}
										   </div>
									</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Status<span class="red_star"> *</span></label>
											<div class="controls">
					                  {html_options name='it_ticket_status_id' class="input-small" placeholder="" style="clear:left" id="HrEmployeeRecStatus1" options=$status_type selected=$type}		
											<div class="error">{$error_msg} </div>
											</div>
									</div>	
				          </div>
							 <div class="span12">
										<div class="form-actions">
											<input type="submit" name="Submit" value="Submit" class="btn btn-primary"></a>
											<a href="list_ticket.php"><button type="button" class="btn regCancel">Cancel</button></a>
										</div>
							 </div>		
							</div>
						</div>
					</form>
				   </div>
					</div>
			</div>			
		</div>
	</div>
</div>
{include file='include/footer.tpl'}
</div>
<input type="hidden" value="/" id="css_root">
{include file='include/footer_js.tpl'}