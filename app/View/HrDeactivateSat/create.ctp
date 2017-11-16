<?php echo $this->element('hr_menu'); ?>
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Deactivate Saturdays</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo $this->webroot;?>hrhome/">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="<?php echo $this->webroot;?>deactivatesat/">Deactivate Saturdays</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="#">New Request</a>
						</li>
					</ul>
					
				</div>
				
				<?php echo $this->Session->flash();?>
				
					<div class="row-fluid footer_div">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3><i class="icon-list"></i> Please fill the form to create a new request</h3>
							</div>
							<div class="box-content nopadding">
								
								
								<?php echo $this->Form->create('HrDeactivateSat', array('type' => 'file', 'id' => 'formID', 'class' => 'form-horizontal form-column form-bordered')); ?>
								
								
									<div class="span12">
									
								
										
										
										<div class="control-group">
											<label for="textfield" class="control-label">Employee <span class="red_star">*</span></label>
											<div class="controls">
										
	<?php echo $this->Form->input('app_users_id', array('multiple' => 'multiple', 'size' => '10', 'required' => false, 'legend' => false, 'before' => '','after' => '',    'between' => '  ',   'separator' => '  ','type' => 'select', 'label' => false, 'div' => false, 'class' => 'input-xlarge', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error', 'style' => 'clear:left')), 'options' => $empList, 'class' => 'multi_select')); ?>
											</div>
										</div>
										
											
									
					
										<div class="control-group">
											<label for="textfield" class="control-label">From Date / To Date <span class="red_star">*</span></label>
											<div class="controls">
	
	<?php echo $this->Form->input('from_date', array('div'=> false,'type' => 'text', 'id' => '', 'label' => false,  'class' => 'input-medium dpd1',  'required' => false, 'placeholder' => 'Start', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error serverErr')))); ?>     
	<?php echo $this->Form->input('to_date', array('div'=> false,'type' => 'text', 'id' => '',  'label' => false, 'class' => 'input-medium dpd2',  'required' => false, 'placeholder' => 'End', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error serverErr')))); ?> 
										</div>
										</div>
												
									
									
									
								
									</div>


										
										
									<div class="span12">
										<div class="form-actions">
											<input type="submit" value="Save changes" class="btn btn-primary">
											<a href="<?php echo $this->webroot;?>hrdeactivatesat/"><button type="button" class="btn">Cancel</button></a>
										</div>
									</div>
									<input type="hidden" id="sameDatePos" value="1">
									<?php echo $this->Form->input('page', array('type' => 'hidden', 'value' => 'add')); ?> 
											</div>
											
								<?php echo $this->Form->end(); ?>
							</div>
						</div>
					</div>
				
					
					
				</div>
		
			
			</div>
		</div>	
			
