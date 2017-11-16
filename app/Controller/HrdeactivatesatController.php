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
 
App::uses('Sanitize', 'Utility');
 
class HrdeactivatesatController extends AppController {  
	
	public $name = 'HrDeactivateSat';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions','Excel');
	
	public $layout = 'apps';	

	
	/* function to list the adv. requests */
	public function index(){	
	
		// set the page title
		$this->set('title_for_layout', 'Deactivate Saturdays - HRIS - BigOffice');
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to'),'HrDeactivateSat'); 
			$this->redirect('/hrdeactivatesat/?'.$url_vars);					
		}
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (HrEmployee.first_name) AGAINST ('".$this->params->query['keyword']."' IN BOOLEAN MODE)"); 
		}
		 			
		// for date search
		if($this->params->query['from'] != '' || $this->params->query['to'] != ''){
			$from = $this->params->query['from'];
			$to = $this->params->query['to'];
			$dateCond = array('or' => array("date_format(HrDeactivateSat.from_date, '%m/%Y') between ? and ?" => array($from, $to),
			"date_format(HrDeactivateSat.to_date, '%m/%Y')" => array($from, $to))); 			
		}	
		
		// assign url vars.
		if(!empty($this->request->query['from']) || !empty($this->request->query['to'])){
			$urlvar = '?keyword='.$this->request->query['keyword'].'&from='.$this->request->query['from'].'&to='.$this->request->query['to'];
			$this->set('url_var', $urlvar);
		}
			
	
		$this->paginate = array('fields' => array('id', 'HrEmployee.id', 'from_date', 'to_date', 'HrEmployee.first_name', 'HrEmployee.last_name', 'HrDeactivateSat.created_date','HrEmployee.emp_no'),'limit' => 10,  'conditions' => array($keyCond, $dateCond, 'HrDeactivateSat.is_deleted' => 'N'), 'order' => array('HrDeactivateSat.created_date' => 'desc'));
		$data = $this->paginate('HrDeactivateSat');	
		$this->set('sat_data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You havn\'t created any records', 'default', array('class' => 'alert alert'));	
		}
		
	}
			
	/* function to save the saturdays */
	public function create(){ 
		// set the page title		
		$this->set('title_for_layout', 'Deactivate Saturdays - HRIS - BigOffice');	
		$this->set('msg_type', array('M' => 'Every Month', 'N' =>  'Particular Date Only'));
		$this->set('show_type', array('A' => 'All Users', 'L' =>  'Approver\'s Only'));
		
		// get employee list
		
		$emp_list = $this->HrDeactivateSat->get_team();
		$format_list = $this->Functions->format_dropdown($emp_list, 'u','id','first_name', 'last_name');			
		$this->set('empList', $format_list);
		
		if ($this->request->is('post')){ 
			// validates the form
			$this->HrDeactivateSat->set($this->request->data);
			// validate file		
			if ($this->HrDeactivateSat->validates(array('fieldList' => array('app_users_id','from_date','to_date')))){
				$this->request->data['HrDeactivateSat']['created_date'] = $this->Functions->get_current_date();
				$this->request->data['HrDeactivateSat']['from_date'] = $this->Functions->format_date_save($this->request->data['HrDeactivateSat']['from_date']);	
				$this->request->data['HrDeactivateSat']['to_date'] = $this->Functions->format_date_save($this->request->data['HrDeactivateSat']['to_date']);					
				foreach($this->request->data['HrDeactivateSat']['app_users_id'] as $user){
					$this->request->data['HrDeactivateSat']['app_users_id'] = $user;
					// save the data
					$this->HrDeactivateSat->create();
					if($this->HrDeactivateSat->save($this->request->data['HrDeactivateSat'], array('validate' => false))){										
						// show the msg.
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Deactivation created successfully', 'default', array('class' => 'alert alert-success'));
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));
					}
				}
				$this->redirect('/hrdeactivatesat/');
			}else{
				//$errors = $this->HrDeactivateSat->validationErrors;
				//print_r($errors);
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in submitting the form. please check errors...', 'default', array('class' => 'alert alert-error'));	
			}
			

		}
	}
	
	
	/* function to upload the file */
	public function upload_attachment($data, $id){
		// validate the file				
		if(!empty($data['tmp_name'])){
			$file = $id.'_'.$data['name']; 
			if($this->upload_file($data['tmp_name'], WWW_ROOT.'/uploads/message/'.$file)){
				return $file;
			}			
		}
				
	}
	
		
	
	/* function to delete the adv. request */
	public function delete_message($gr_id){
		if(!empty($gr_id) && intval($gr_id)){
			// authorize user before action
			$ret_value = $this->auth_action($gr_id);
			if($ret_value == 'pass'){		
				$this->HrDeactivateSat->id = $gr_id;
				$this->HrDeactivateSat->saveField('is_deleted', 'Y'); 
				$this->HrDeactivateSat->saveField('modified_date', $this->Functions->get_current_date()); 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Message deleted successfully', 'default', array('class' => 'alert alert-success'));			
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrmessage/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrmessage/');
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));			
		}
		$this->redirect('/hrmessage/');
	}
	
	
	/* function to edit the form */
	public function edit_message($id){	
		// set the page title		
		$this->set('title_for_layout', 'Edit Message - HRIS - BigOffice');
		$this->set('msg_type', array('M' => 'Every Month', 'N' =>  'Particular Date Only'));
		$this->set('show_type', array('A' => 'All Users', 'L' =>  'Approver\'s Only'));		
		if (!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){	
				// when the form submitted
				if (!empty($this->request->data)){ 
					// validates the form
					$this->HrDeactivateSat->set($this->request->data);
					// validate the file
					$this->HrDeactivateSat->validate_file();
					// empty the fields
					$this->empty_date_fields();
					if ($this->HrDeactivateSat->validates(array('fieldList' => array('title','status','desc','upload_file','display_type', 'show_type', 'end_date', 'end_day')))) {
						$this->request->data['HrDeactivateSat']['modified_by'] = $this->Session->read('USER.Login.id');		
						$this->request->data['HrDeactivateSat']['modified_date'] = $this->Functions->get_current_date();		
						// save the data
						if($this->HrDeactivateSat->save($this->request->data['HrDeactivateSat'])) {	
							// upload the file
							if($file = $this->upload_attachment($this->request->data['HrDeactivateSat']['upload_file'], $id)){						
								$this->HrDeactivateSat->saveField('attachment', $file);
							}
							// show the msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Message details modified successfully', 'default', array('class' => 'alert alert-success'));
							$this->redirect('/hrmessage/');		
						}else{
							// show the error msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));									
						}					
									
					}	
				}else{
					$this->request->data = $this->HrDeactivateSat->findById($id);
					if($this->request->data['HrDeactivateSat']['display_type'] == 'N'){
						$this->request->data['HrDeactivateSat']['start_date']	= $this->Functions->format_date_show($this->request->data['HrDeactivateSat']['start_date']);		
						$this->request->data['HrDeactivateSat']['end_date']	= $this->Functions->format_date_show($this->request->data['HrDeactivateSat']['end_date']);
					}		
				}
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrmessage/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrmessage/');
			}
		}else{
			// show the error msg.
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));
			$this->redirect('/hrmessage/');		
		}		
		
	}
	
	
	/* function to check attendance already exists */
	public function check_attendance_exists($id, $date){
		$upload_data = $this->HrDeactivateSat->HrAttendance->find('all', array('fields' => array('id'), 
		'conditions' => array('HrAttendance.app_users_id' => $id, 'HrAttendance.in_time like' => $date.'%'), 'limit' => '1'));
		return $upload_data[0]['HrDeactivateSat']['id'];
	}
	
	
	/* function to auth record */
	public function auth_action($id){
		$data = $this->HrDeactivateSat->findById($id, array('fields' => 'id','is_deleted','modified_date'));	
		// check the req belongs to the user
		if($data['HrDeactivateSat']['is_deleted'] == 'Y'){
			return $data['HrDeactivateSat']['modified_date'];
		}		
		else if(empty($data)){	
			return 'fail';
		}else{
			return 'pass';
		}
	}
	
	
	
	
	
	/* clear the cache */
	
	public function beforeFilter() { 
		//$this->disable_cache();
		$this->show_tabs(104);
	}
	
	
		/* auto complete search */	
	public function search(){ 
		$this->layout = false;	 
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);
			$data = $this->HrDeactivateSat->find('all', array('fields' => array('HrEmployee.first_name'), 
			'group' => array('HrEmployee.first_name'), 
			'conditions' => array("OR" => array ('HrEmployee.first_name like' => $q.'%'), 
			'AND' => array('HrDeactivateSat.is_deleted' => 'N','HrEmployee.is_deleted' => 'N'))));		
			$this->set('results', $data);
		}
    }
	
	

	
}