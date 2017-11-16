<?php echo $this->element('hr_menu'); ?>
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Waive-Off Request - Approve/Reject</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo $this->webroot;?>hrhome/">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="<?php echo $this->webroot;?>hrattwaive/">Approve Waive-Off Request</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="#">View Waive-Off Request</a>
						</li>
					</ul>
					
				</div>
				
				
								<?php echo $this->Session->flash();?>

				<div class="row-fluid">
				<div class="span12" style="clear:left">
						<div class="box box-color box-bordered">
							<div class="box-title">
							
														<h3><i class="icon-list"></i> Approve / Reject Waive-Off Request</h3>
															
							</div>
							<div class="box-content" id="expForm" style="color:#555;">
															<?php echo $this->Form->create('HrAttChangeApprove', array('id' => 'formID', 'class' => 'form-vertical')); ?>

								
							
									<div class="row-fluid" style="margin-bottom:10px;margin-left:10px;">
									
										
										
										<div class="span2" style="margin-top:10px">
											<div class="control-group">
												<label for="textfield" class="control-label"><b>Employee</b></label>
												<div class="controls controls-row">
													<?php echo $empData['HrEmployee']['first_name'].' '.$empData['HrEmployee']['last_name'];?>
													
													 
												</div>
											</div>
										</div>
										
									
										
										<div class="span3" style="margin-top:10px">
											<div class="control-group">
												<label for="textfield" class="control-label"><b>Month</b></label>
												<div class="controls controls-row">
													<?php echo date('M, Y', strtotime($this->params->pass[0]));?>
													
													 
												</div>
											</div>
										</div>
									
									</div>
									
									
									
									
								
									<?php foreach($att_data as $key => $data):?>								
									<div class="row-fluid row0" style="margin-left:10px;">
										
										<div class="span1">
											<div class="control-group">
										<?php if($key == '0'):?>
										<label for="textfield" class="control-label" style="margin-bottom:10px"><b>Date</b></label> 
										<?php endif; ?>
												<div class="controls controls-row">
													<?php echo $this->Functions->format_date($data['HrAttWaive']['date']);?>									
													</div>
											</div>
										</div>
										<div class="span1" style="width:120px;">
											<div class="control-group">
											<?php if($key == '0'):?>
											<label for="textfield" class="control-label" style="margin-bottom:10px"><b>Actual In Time</b></label>
											
											<?php endif; ?>
												<div class="controls controls-row">
													<?php 
													if($data['Attendance']['in_time'] != ''):
													echo date('H:i:s', strtotime($data['Attendance']['in_time']));
													else:
													echo 'Not Marked';
													endif;
													?>  
											
												</div>
											</div>
										</div>
										<div class="span1">
											<div class="control-group">
											<?php if($key == '0'):?>
													<label for="textfield" class="control-label" style="margin-bottom:10px"><b>Late Mins.</b></label>
													<?php endif; ?>
													
													<?php 
													$color = ($data['HrAttWaive']['status'] == 'P' || $data['HrAttWaive']['status'] == 'R')  ? '#ff0000' : '#26c115';?> 
													
												<div class="controls controls-row" style="color:<?php echo $color;?>">
																							
																							
													<?php 
													if($data['Attendance']['in_time'] != ''):
													echo $this->Functions->time_diff_late($data['Attendance']['in_time'], date('Y-m-d 09:30:00', strtotime($data['Attendance']['in_time'])));													
													else:
													echo 'Not Marked';
													endif;?>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
											<?php if($key == '0'):?>
						<label for="textfield" class="control-label" style="margin-bottom:10px"><b>Reason for Late </b></label>
						<?php endif; ?>
																							<div class="controls controls-row">
												<?php echo $data['HrAttWaive']['reason'];?> 
												</div>
											</div>
										</div>
									
										<div class="span1" style="width:50px">
											<div class="control-group">
											<?php if($key == '0'):?>
							<label for="textfield" class="control-label" style="margin-bottom:10px"><b>Approve </b></label>
							<?php endif; ?>
										<div class="controls controls-row">
										<?php if($VIEW_ONLY == 1):?>
											<?php echo $data['HrAttWaive']['status'] == 'A' ? 'Yes' : 'No';?> 
											<?php else: ?>
													<input type="checkbox" name="data[HrAttWaive][chk][]" />
														<input type="hidden" name="data[HrAttWaive][id][]" value="<?php echo $data['HrAttWaive']['id'];?>"/>
														<input type="hidden" name="data[HrAttWaive][date][]" value="<?php echo $data['HrAttWaive']['date'];?>"/>
											<?php endif; ?>
											</div>
											</div>
										</div>
										
											<div class="span2">
											<div class="control-group">
											<?php if($key == '0'):?>
							<label for="textfield" class="control-label" style="margin-bottom:10px"><b>Remarks </b></label>
							<?php endif; ?>
										<div class="controls controls-row">
											<?php if($VIEW_ONLY == 1):?>
											<?php echo $data['HrAttWaive']['remark'];?> 
											<?php else: ?>
											<textarea type="text" name="data[HrAttWaive][remark][]" rows="2"></textarea>
											<?php endif; ?>
												</div>
											</div>
										</div>
											
								</div>
								
								<?php endforeach;?>
							
												<input type="hidden" name="data[HrAttWaive][user_id]" value="<?php echo $this->request->params['pass'][1];?>"/>								
									<div class="form-actions">
										<?php if($VIEW_ONLY == 1):?>
												<a href="<?php echo $this->webroot;?>hrattwaive/"><button type="button" class="btn"><< Go Back</button></a>
										<?php else: ?>
										<a class="" href="javascript:void(0);">
											<button type="button" name="<?php echo $this->webroot;?>hrattwaive/update_attendance/<?php echo $this->request->params['pass'][0];?>/<?php echo $this->request->params['pass'][1];?>/" class="btn btn-green approveRec">Submit</button></a>
											
											<a href="<?php echo $this->webroot;?>hrattwaive/"><button type="button" class="btn">Cancel</button></a>
											
										<?php endif; ?>
										
									</div>
										
																				
										
									
									</form></div>
									</div>
						</div>
					</div>	
						
				
					
				</div>
		
			
			</div>
		</div>	
			
		
<div id="dialog-confirm" title="Confirmation!" class="dn">
	<p>Are you sure you want to process?</p>
</div>	


