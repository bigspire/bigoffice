<?php echo $this->element('hr_menu'); ?>
		
		
	<div class="container-fluid" id="content" style="overflow:auto">
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
							<a href="<?php echo $this->webroot;?>hrdeactivatesat/">Deactivate Saturdays</a>
							
						</li>
						
						
					</ul>
					
				</div>
				
				
				
			<?php echo $this->Session->flash();?>
			
			
			
				
					<div class="row-fluid  footer_div" >
					<div class="span12">
						<div class="box box-bordered box-color">
						
						<div class="box-title">
								<h3><i class="icon-list"></i> Deactivate Saturdays </h3>
							</div>
							
						

						<?php echo $this->Form->create('HrDeactivateSat', array('name' => '', 'type' => '', 'id' => 'formID', 'class' => '')); ?>
							<div class="box-content">
							
						<div class="dataTables_wrapper">
						
				<div class="" id="DataTables_Table_8_filter"  style="padding:15px">
				
				<span>Search:</span>  
				
				<?php echo $this->Form->input('keyword', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-large', 'value' => $this->params->query['keyword'],  'id' => 'SearchText', 'required' => false, 'autocomplete' => 'off', 'placeholder' => 'Search here...', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
												
		
				<span>From Date:</span>  
				<?php echo $this->Form->input('from', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-small monthpick', 'value' => $this->params->query['from'],   'required' => false,  'placeholder' => 'From', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

<span>To Date:</span>  
				<?php echo $this->Form->input('to', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-small monthpick', 'value' => $this->params->query['to'],   'required' => false,  'placeholder' => 'To', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
				
				
				
											
											<input type="submit" value="Search" class="btn btn-primary" style="margin-bottom:9px;margin-left:4px;">
											
													<a href="<?php echo $this->webroot;?>hrdeactivatesat/"><button style="margin-bottom:9px;margin-left:4px;" type="button" class="btn btn-primary"><i class="icon-refresh"></i> Reset</button></a>
													
													
												<a href="<?php echo $this->webroot;?>hrdeactivatesat/create/"><button type="button" class="btn btn-primary" style="float:right"><i class="icon-plus"></i> Deactivate Saturdays</button></a>
					
						
								</div>			
								
								

								<table class="table table-hover table-nomargin table-bordered usertable dataTable">
									<thead>
										
										<tr>
											
											<th width="180">
											<?php echo $this->Paginator->sort('HrEmployee.first_name', 'Employee', array('escape' => false,'direction' => 'desc'));?>
												</th>
												
												<th width="110" >
											<?php echo $this->Paginator->sort('HrEmployee.emp_no', 'Emp. No.', array('escape' => false,'direction' => 'desc'));?>
												</th>
													
												<th width="180">
											<?php echo $this->Paginator->sort('from_date', 'Date From', array('escape' => false,'direction' => 'desc'));?>
												</th>
												
<th width="80">
											<?php echo $this->Paginator->sort('to_date', 'Date To', array('escape' => false,'direction' => 'desc'));?>
												</th>												
										
																			
										
												
												<th width="110">
											<?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false,'direction' => 'desc'));?>
												</th>
											
											
										</tr>
									</thead>
									<tbody>
									
										
									
										<?php  foreach($sat_data as $sat): ?>
										
										<tr>
											
											<td><?php echo ucwords($sat['HrEmployee']['first_name'].' '.$sat['HrEmployee']['last_name']);?></td>
											<td><?php echo $sat['HrEmployee']['emp_no'];?></td>
												<td><?php echo date('d-M-Y', strtotime($sat['HrDeactivateSat']['from_date']));?></td>
														
														
															
	<td><?php echo date('d-M-Y', strtotime($sat['HrDeactivateSat']['to_date']));?></td>
															
											
											<td><?php echo $this->Functions->format_date($sat['HrDeactivateSat']['created_date']);?></td>
										
									
										
										</tr>
										
									<?php endforeach; ?>
									</tbody>
								</table>
								

								<?php echo $this->element('paging');?>
								
								




								
							</div>	

							</div>
							
							<input type="hidden" value="1" id="paygen">
						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>hrdeactivatesat/" id="webroot">
						 <?php echo $this->Form->end(); ?>
						</div>
					</div>
				</div>
					
					
				</div>
		
			
			</div>
			

		</div>