<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
class HrattwaiveController extends AppController {  
	
	public $name = 'HrAttWaive';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');
	
	public $layout = 'apps';	

	/* function to list the adv. requests */
	public function index(){	
		// set the page title
		$this->set('title_for_layout', 'Approve Waive Off Request- HRIS - BigOffice');
		
		// get employee list		
		$emp_list = $this->HrAttWaive->get_team($this->Session->read('USER.Login.id'),'L');
		$format_list = $this->Functions->format_dropdown($emp_list, 'u','id','first_name', 'last_name');		
		$this->set('empList', $format_list);
		
	
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','emp_id','from','to'),'HrAttWaive'); 
			$this->redirect('/hrattwaive/?'.$url_vars);			
		}					
		
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (reason) AGAINST ('".$this->params->query['keyword']."' IN BOOLEAN MODE)"); 
		}
		if($this->params->query['emp_id'] != ''){
			$empCond = array('HrAttWaive.app_users_id' => $this->params->query['emp_id']); 
		}
		// for date search
		if($this->params->query['from'] != '' || $this->params->query['to'] != ''){
			$from = $this->Functions->format_date_save($this->params->query['from']);
			$to = $this->Functions->format_date_save($this->params->query['to']);			
			$dateCond = array('HrAttWaive.created_date between ? and ?' => array($from, $to)); 
		}
		
		
		// fetch the attendance data		
		$this->paginate = array('fields' => array('id', 'created_date',	"date_format(HrAttWaive.date, '%Y-%m') as month",
		"date_format(HrAttWaive.date, '%M, %Y') as month_display", 'HrEmployee.first_name', 'HrEmployee.last_name','status','approve_date', 'HrEmployee.id', 'count(*) no_req'),
		'limit' => 10,'conditions' => array($keyCond, 
		$empCond, $dateCond, 'is_draft' => 'N'), 'group' => array('HrEmployee.id',"date_format(HrAttWaive.date, '%Y-%m')"),
		'order' => array('HrAttWaive.created_date' => 'desc'));
		$data = $this->paginate('HrAttWaive');
		
		$this->set('att_data', $data);
		
		
	
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You have no waive-off request to approve', 'default', array('class' => 'alert alert'));	
		}
		
		
	}
	
	
	
	/* function to update the attendance */
	public function update_attendance(){ 
		$this->loadModel('HrAttendance');
		foreach($this->request->data as $key => $data){
			$count = count($data['date']);
			// iterate all the values
			for($i = 0; $i < $count; $i++){ 
				// for waive off requests
				if($data['chk'][$i] == 'on'){
					$status = 'A';
					$waive = '1';
				}else{
					$status = 'R';
					$waive =  NULL;
				}
				$month = $data['date'][$i];
				$user_att_data = $this->HrAttendance->find('all', array('fields' => array('HrAttendance.id'), 
				'conditions' => array("in_time like" =>  $data['date'][$i].'%', 
				'app_users_id' => $this->request->data['HrAttWaive']['user_id']), 'limit' => '1'));
				// format array
				$ar_data = array('modified_date' => $this->Functions->get_current_date(), 'att_waive' => $waive, 'waive_msg' => $data['remark'][$i]);
				$fieldList = array('att_waive', 'modified_date', 'waive_msg');
				$this->HrAttendance->id = $user_att_data[0]['HrAttendance']['id'];
				if($this->HrAttendance->id != ''){
					if($this->HrAttendance->save($ar_data, true, $fieldList)){
						// save in the waive off request table
						$ar_data = array('id' => $data['id'][$i], 'status' => $status, 'approve_date' => $this->Functions->get_current_date(),
						'remark' => $data['remark'][$i], 'approve_by' => $this->Session->read('USER.Login.id'));
						$fieldList = array('approve_date', 'remark', 'approve_by', 'id','status');
						$this->HrAttWaive->save($ar_data, true, $fieldList);
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Waive-off request approved successfully', 'default', array('class' => 'alert alert-success'));	
						$req_status = 'success';
					}else{ 
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in updating the attendance, pls contact admin..', 'default', array('class' => 'alert alert-error'));
					}
				}
			}
		}
		// send mail to user
		if($req_status == 'success'){
			$this->notify_user($this->request->data['HrAttWaive']['user_id'], date('M, Y', strtotime($month)));
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in updating the attendance, pls contact admin..', 'default', array('class' => 'alert alert-error'));
		}
		$this->redirect('/hrattwaive/');	
		
	}
		
	
	/* function to notify user */
	public function notify_user($id,$month){
		$user_data = $this->HrAttWaive->HrEmployee->find('first', array('fields' => array('email_address', 'first_name','last_name'), 
		'conditions' => array('HrEmployee.id' => $id)));			
		$sub = 'BigOffice - Waive Off Request is processed by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
		$template = 'notify_waive_req';
		$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
		$name = $user_data['HrEmployee']['first_name'].' '.$user_data['HrEmployee']['last_name'];					
		$vars = array('from_name' => $from, 'name' => $name, 'month' => $month, 
		'employee' => $user_data['HrEmployee']['first_name'].' '.$user_data['HrEmployee']['last_name']);
		// notify superiors						
		if(!$this->send_email($sub, $template, 'noreply@mypdca.in', $user_data['HrEmployee']['email_address'],$vars)){	
			// show the msg.								
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to user...', 
			'default', array('class' => 'alert alert-error'));				
		}		
	}
	

	
	/* function to view the leave request */
	public function view_req($month,$id,$status){
		// set the page title		
		$this->set('title_for_layout', 'Waive Off Request- Approve/Reject - HRIS - BigOffice');
		if(!empty($id) && intval($id) && !empty($month) && !empty($status)){
			if($status == 'pass'  || $status == 'view_only'){	
				$options = array(			
					array('table' => 'hr_attendance',
							'alias' => 'Attendance',					
							'type' => 'LEFT',
							'conditions' => array('`Attendance`.`app_users_id` = `HrAttWaive`.`app_users_id`',
							'HrAttWaive.date like  date_format(`Attendance`.`in_time`, "%Y-%m-%d")')
					)
				);
				// get the employee
				$emp_data = $this->HrAttWaive->HrEmployee->find('first', array('conditions' => array('HrEmployee.id'  => $id)));
				$this->set('empData', $emp_data);				
				$data = $this->HrAttWaive->find('all', array('conditions' => array("date_format(HrAttWaive.date, '%Y-%m')"  => $month,
				'HrAttWaive.app_users_id' => $id),
				'fields' => array('id','date','reason','Attendance.in_time','status',
				'HrEmployee.first_name','HrEmployee.last_name','remark'), 'order' => array('HrAttWaive.date' => 'asc'), 'joins' => $options));	
				$this->set('att_data', $data);
				// for view mode
				if($status == 'view_only'){					
					$this->set('VIEW_ONLY', 1);
				}
			}else if($ret_value == 'fail'){ 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrattwaive/');	
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrattwaive/');	
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));		
			$this->redirect('/hrattwaive/');	
		}
		
		
	}
	
	/* clear the cache */	
	public function beforeFilter() { 
		//$this->disable_cache();
		$this->show_tabs(105);
		// check module access
		
	}
	
	
	
	
}