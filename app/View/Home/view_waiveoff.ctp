
	<div class="modal-dialog">

      <div class="modal-content">
	  
	   <div class="modal-header">
          <h4 class="modal-title">Waive-Off Request - <?php echo date('M, Y'); ?></h4>
        </div>
		
       <div class="">
      
			
			<div align="center">
		
<div class="">

<div class="" style="display: block;">
												<div class="no-padding">
											

			<?php echo $this->Form->create('HrReqWaive', array( 'id' => 'formID', 'class' => 'form-vertical')); ?>
			
			
			<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom" style="border-top:1px solid #DDD">
															<tr>
																	<th width="100">
																Date
																</th>
																
																<th width="100">
																
																	Status
																	
																	</th>

																<th>
																	
																	Remarks																</th>

															
																
															</tr>
														</thead>

														<tbody>
														<?php foreach($waive_data as $key => $record):?>
															<tr>
															<td> 										<?php echo  $this->Functions->format_date($record['HrReqWaive']['date']);?>
 </td>
																

																<td>
<?php echo  $this->Functions->get_waive_status($record['HrReqWaive']['status']);?>
																
																</td>
<td class=""><?php echo  $record['HrReqWaive']['remark'];?></td>
																
															</tr>
												<?php endforeach;?>	
														
														</tbody>
													</table>
													
											

							
								
								<?php echo $this->Form->end(); ?>

									</div><!-- /widget-main -->
											</div></div>
									</div>
        
</div>

       
       
      </div>
    </div>

	

