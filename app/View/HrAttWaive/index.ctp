<?php echo $this->element('hr_menu'); ?>
		
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Approve Waive Off Request</h1>
					</div>
				
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo $this->webroot;?>hrhome/">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						
						
						<li>
							<a href="<?php echo $this->webroot;?>hrattwaive/">Approve Waive Off Request</a>
							
						</li>
						
						
					</ul>
					
				</div>
				
				
				
				<?php echo $this->Session->flash();?>
				
					<div class="row-fluid  footer_div">
					<div class="span12">
						<div class="box box-bordered box-color">
						
						<div class="box-title">
								<h3><i class="icon-list"></i> Approve Waive-Off Request</h3>
							</div>
							
						

						<?php echo $this->Form->create('HrAttWaive', array('name' => '', 'type' => '', 'id' => 'formID', 'class' => '')); ?>
							<div class="box-content">
							
						<div class="dataTables_wrapper">
						
				<div class="" id="DataTables_Table_8_filter"  style="padding:15px">
				
			<span>Search:</span>  <?php echo $this->Form->input('keyword', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-large', 'value' => $this->params->query['keyword'], 'required' => false, 'autocomplete' => 'off', 'placeholder' => 'Search here...', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
		
											

								<span>Employee:</span>		<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-large', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
								
								<span>From:</span>  
				<?php echo $this->Form->input('from', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-small datepick', 'value' => $this->params->query['from'],   'required' => false,  'placeholder' => 'From', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

<span>To:</span>  
				<?php echo $this->Form->input('to', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-small datepick', 'value' => $this->params->query['to'],   'required' => false,  'placeholder' => 'To', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
											
											<input class="btn btn-primary" type="submit" style="margin-bottom:9px;margin-left:4px;" value="Search"/>
											
				<a href="<?php echo $this->webroot;?>hrattwaive/"><button style="margin-bottom:9px;margin-left:4px;" type="button" class="btn btn-primary"><i class="icon-refresh"></i> Reset</button></a>
						
								</div>			
								
								

	<table class="table table-hover table-nomargin table-bordered usertable dataTable">
									<thead>
										
										<tr>
										
									<th  width="240">	<?php echo $this->Paginator->sort('HrEmployee.first_name', 'Employee', array('escape' => false,'direction' => 'desc'));?>
									</th>
										
								<th  width="140">	<?php echo $this->Paginator->sort('month_display', 'Month', array('escape' => false,'direction' => 'desc'));?>
									</th>			
										
											
											<th width="150"><?php echo $this->Paginator->sort('no_req', 'No. of Request', array('escape' => false,'direction' => 'desc'));?></th>
											<th width="200">	
										<?php echo $this->Paginator->sort('created_date', 'Created On', array('escape' => false,'direction' => 'desc'));?></th>

																				<th  width="200">Pending</th>
										
										
																					<th width="200">	<?php echo $this->Paginator->sort('approve_date', 'Approved On', array('escape' => false,'direction' => 'desc'));?></th>

											<!--th width="">Pay Status</th-->
											<th>Verify</th>
											
										</tr>
										
								
										
									</thead>
									<tbody>
									
										
									
										<?php  foreach($att_data  as $key => $att):?>
										
										<tr>
										
											<td><?php echo ucfirst($att['HrEmployee']['first_name']).' '.ucfirst($att['HrEmployee']['last_name']);?></td>
											
								<td><?php echo  $att[0]['month_display']?></td>
								
												<td><?php echo  $att[0]['no_req']?></td>
												
											<td><?php echo $this->Functions->format_date($att['HrAttWaive']['created_date']);?></td>
											

											<td><?php
											if($att['HrAttWaive']['status'] == 'P'):
											echo $this->Functions->time_diff($att['HrAttWaive']['created_date'], 0);
											endif;
											?>
										
											</td>
										
											
											
											<td><?php echo $this->Functions->format_date($att['HrAttWaive']['approve_date']);?></td>

											
											<?php  
											$st = $att['HrAttWaive']['status'] == 'P' ? 'pass' : 'view_only';
											$icon = $this->Functions->show_verify_icon($st);
											$title = $this->Functions->show_verify_title($st);
											
											
											?>
											
									
											
										
											
											<td>											
											
												<a href="<?php echo $this->webroot;?>hrattwaive/view_req/<?php echo $att[0]['month'];?>/<?php echo $att['HrEmployee']['id'];?>/<?php echo $st;?>" class="btn" rel="tooltip" title="<?php echo $title;?>"><i class="<?php echo $icon;?>"></i></a>
												
											
												
									
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
								

								
								<?php echo $this->element('paging');?>
								
								
							</div>
					</div>
						 <?php echo $this->Form->end(); ?>
						</div>
					</div>
				</div>
					
					
				</div>
		
			
			</div>
			

		</div>	
			
		
		
		
		
				
		


