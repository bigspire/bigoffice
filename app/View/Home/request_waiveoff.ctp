<div class="">
	
	<div class="modal-dialog">

      <div class="modal-content">
       <div class="container"></div>
        <div class="">
			<?php if($waive_submit == 1): ?>							
<div class="alert alert-warning draftMsg">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<strong>
												
Waive-Off request saved as draft successfully</strong>											<br>
										</div>
						<?php endif; ?>
						
	
						
						<?php if($waive_complete == 1): ?>							
        <div class="alert alert-block alert-success chgSuccess">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<p>
												Thank You. You have finished submitting the request successfully!
											</p>

										</div>
					
										
		
							
															<span style="margin-left:20px;font-size:12px;">You will be redirected to home page in <span id="timeRef">5</span> secs. automatically...</span>
						
			<?php endif; ?>						
		
			
			<?php if(!$waive_complete): ?>	
			
			<div align="center">
		
<div class="">

<div class="" style="display: block;">
												<div class="no-padding">
											

			<?php echo $this->Form->create('HrReqWaive', array( 'id' => 'formID', 'class' => 'form-vertical')); ?>
			
								

									<div class="space-4"></div>
						<div id="sheepItForm" class="sheepitWaive">
						 <div id="sheepItForm_template">
									<div class="form-group" style="text-align:left;float:left;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2" style="color:#1b3ab7;font-size:13px;width:82%"><?php echo $data['HrSurveyQuestion']['question'];?></label>

										<div class="col-sm-3">
										

											<?php echo $this->Form->input('date#index#', array('div'=> false, 'style' => 'width:120px;',  'id' => 'date#index#', 'type' => 'text',  'label' => false, 'placeholder' => 'Attendance Date',  'class' => 'datepick required input-small',  'required' => false,'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
											<?php echo $this->Form->input('reason#index#', array('div'=> false, 'style' => 'width:400px;', 'id' => 'reason#index#', 'type' => 'textarea', 'rows' => '1',  'placeholder' => 'Reason for late...',  'label' => false, 'class' => 'msgBox required autosize-transition input-block-level',  'required' => false,  'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

																						
											<div class="error"></div>
										
										</div>
									</div>
									
									<a id="sheepItForm_remove_current" tabindex="-1"  rel="tooltip2" title="Remove" style="float:left;margin-right:10px;margin-top:10px;">
    <span><button type="button"  rel="tooltip2" tabindex="-1"  class="btn btn-xs btn-danger" style="padding:4px" data-placement="top" title="Remove"><i class="icon-trash"></i></button></span>
    </a>
	
							</div>
							<div id="sheepItForm_noforms_template"></div>
							<div id="sheepItForm_controls" style="width:125px;float:left;">
    <div id="sheepItForm_add"><a> <span><button rel="tooltip2" title="Add another late reason box" type="button" style="margin:10px;" class="btn btn-xs btn-warning" title="Add Another"><i class="icon-plus"></i> Add Another</button></span></a></div>
  
  </div>
									</div>		
						
						
<div class="clearfix form-actions" style="clear:left;">
<?php echo $this->Form->input('tot_msg', array( 'type' => 'hidden', 'value' => '1',  'id' => 'tot_msg')); 
echo $this->Form->input('is_draft', array( 'type' => 'hidden', 'id' => 'is_draft')); 
echo $this->Form->input('end_date', array( 'type' => 'hidden', 'value' => date('d/m/Y'), 'id' => 'end_date')); 

$count = count($waive_data);
echo $this->Form->input('tot_edit', array( 'type' => 'hidden', 'id' => 'tot_edit', 'value' => $count ? $count : '1' )); ?>  


										<div class="col-md-9">
											<button rel="tooltip2"  title="Send Now!" class="waiveSend btn btn-success btn-sm" type="submit">
												<i class="icon-ok bigger-110"></i>
												Send
											</button>

											<button rel="tooltip2" title="Save as draft and send it later when you are ready" class="survey_draft btn btn-primary btn-sm" style="margin-left:10px" rel="draft" type="submit">
												<i class="icon-save bigger-110"></i>
												Save as Draft
											</button>
										</div>
									</div>
									
									
								<input type="hidden" id="post_data" value="<?php echo $this->webroot;?>home/request_waiveoff/">	
								

<?php foreach($waive_data as $key => $record):?>
<input type="hidden" id="Wreason<?php echo $key;?>" value="<?php echo $record['HrReqWaive']['reason'];?>">
<input type="hidden" id="Wdate<?php echo $key;?>" value="<?php echo $this->Functions->format_date_show($record['HrReqWaive']['date']);?>">

<?php endforeach; ?>								
								
								<?php echo $this->Form->end(); ?>

									</div><!-- /widget-main -->
											</div></div>
									</div>
        
			<?php endif; ?>
						<input type="hidden" id="survey_status" value="<?php echo $survey_complete;?>"/>

			<input type="hidden" id="survey_close" value="<?php echo $waive_close?>"/>

        </div>
       
      </div>
    </div>
	
	
	</div>
	

