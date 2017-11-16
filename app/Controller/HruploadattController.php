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
 
class HruploadattController extends AppController {  
	
	public $name = 'HrUploadAtt';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions','Excel');
	
	public $layout = 'apps';	

	
	/* function to list the adv. requests */
	public function index(){	
	
		// set the page title
		$this->set('title_for_layout', 'Upload Attendance - HRIS - BigOffice');
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to'),'HrUploadAtt'); 
			$this->redirect('/hruploadatt/?'.$url_vars);					
		}
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (HrEmployee.first_name) AGAINST ('".$this->params->query['keyword']."' IN BOOLEAN MODE)"); 
		}
		 			
		// for date search
		if($this->params->query['from'] != '' || $this->params->query['to'] != ''){
			$from = $this->Functions->format_date_search($this->params->query['from']).'-1';
			$to = $this->Functions->format_date_search($this->params->query['to']).'-1';			
			$dateCond = array('or' => array('att_month between ? and ?' => array($from, $to),'att_month between ? and ?' => array($from, $to))); 			
		}else{
			// set default date condition
			$from = date('Y-m', strtotime('-0 months')).'-1';
			$to =  date('Y-m', strtotime('-0 months')).'-1';
			$dateCond = array('or' => array('att_month between ? and ?' => array($from, $to),'att_month between ? and ?' => array($from, $to)));
			// set the default search dates
			$this->request->data['HrUploadAtt']['from'] =  date('m/Y', strtotime('-0 months'));
			$this->request->data['HrUploadAtt']['to'] =  date('m/Y', strtotime('-0 months'));
		}	
	
		
		// assign url vars.
		if(!empty($this->request->query['from']) || !empty($this->request->query['to'])){
			$urlvar = '?keyword='.$this->request->query['keyword'].'&from='.$this->request->query['from'].'&to='.$this->request->query['to'];
			$this->set('url_var', $urlvar);
		}
			
	
		$this->paginate = array('fields' => array('id', 'HrEmployee.id', 'att_month', 'upload_file', 'HrEmployee.first_name', 'HrEmployee.last_name', 'HrUploadAtt.created_date','HrEmployee.email_address', 'HrEmployee.emp_no'),'limit' => 10,  'conditions' => array($keyCond, $dateCond, 'HrUploadAtt.is_deleted' => 'N'), 'order' => array('HrUploadAtt.created_date' => 'desc'));
		$data = $this->paginate('HrUploadAtt');	
		$this->set('att_data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You havn\'t uploaded any attendance', 'default', array('class' => 'alert alert'));	
		}
		
	}
			
	
	/* function to edit the form */
	public function upload(){		
		// set the page title		
		$this->set('title_for_layout', 'Upload Attendance - HRIS - BigOffice');		
		// when the form submitted
		if (!empty($this->request->data)){ 
			// validates the form
			$this->HrUploadAtt->set($this->request->data);				
			if ($this->HrUploadAtt->validates(array('fieldList' => array('upload_file')))) {				
				$this->request->data['HrUploadAtt']['created_date'] = $this->Functions->get_current_date();
				$this->request->data['HrUploadAtt']['created_by'] = $this->Session->read('USER.Login.id');
				$this->request->data['HrUploadAtt']['att_month'] = $this->request->data['HrUploadAtt']['sal_year']['year'].'-'.$this->request->data['HrUploadAtt']['sal_month']['att_month'].'-'.'01';
				// upload excel file				
				$file = $this->upload_attachment($this->request->data['HrUploadAtt']['upload_file']);	
				// read the excel file
				$data = $this->Excel->read_data('uploads/attendance/'.$file);
				$suc_start = "<span class='out_suc'>";
				$fail_start = "<span class='out_fail'> ";
				$end = ' </span>';
				$output = '';
				// iterate excel array
				foreach($data as $key =>  $attendance){	
					if($key == '1'){
						$emp_no = $attendance['A'];
					}
					// skip the headers and title
					if($key >= 3){	
						// make sure it has value
						if(!empty($attendance['B'])){
							$this->HrUploadAtt->HrEmployee->unBindModel(array('belongsTo' => array('HrDepartment','HrDesignation','HrGrade','Role','HrCompany','HrBranch')));
							// check user exists
							$emp_detail = $this->check_employee_exists($emp_no);
							if(!empty($emp_detail[0]['HrEmployee']['id'])){ 
								// format the data
								$date = explode('-', $attendance['A']);
								$exists = $this->check_attendance_exists($emp_detail[0]['HrEmployee']['id'], $date[2].'-'.$date[1].'-'.$date[0]);								
								$this->request->data['HrAttendance']['in_time'] = $date[2].'-'.$date[1].'-'.$date[0].' '.$attendance['B'];
								$this->request->data['HrAttendance']['out_time'] = $date[2].'-'.$date[1].'-'.$date[0].' '.$attendance['C'];
								$this->request->data['HrAttendance']['app_users_id'] = $emp_detail[0]['HrEmployee']['id'];
								// if attendance already loaded		
								if($exists != ''){
									$output_str = 'modified';
									$this->HrUploadAtt->HrAttendance->id = $exists;		
									$output .= $suc_start.$attendance['A'] ." attendance $output_str successfully<br>".$end;
									
								}else{
									$output_str = 'created';
									$this->HrUploadAtt->HrAttendance->create();
									$output .= $suc_start.$attendance['A'] ." attendance $output_str successfully<br>".$end;
								}
								// save 
								$data = array('app_users_id' => $emp_detail[0]['HrEmployee']['id'],
								'in_time' => $date[2].'-'.$date[1].'-'.$date[0].' '.$attendance['B'],
								'out_time' => $date[2].'-'.$date[1].'-'.$date[0].' '.$attendance['C']);
								$this->HrUploadAtt->HrAttendance->save($data, array('validate' => false));								
							}else{
								 $output .= $fail_start.$emp_no ." doesn't exists in the company<br>".$end;
							}
						}						
					}
					
					
				}	
				
				// format the upload att. data
				$this->request->data['HrUploadAtt']['app_users_id'] = $emp_detail[0]['HrEmployee']['id'];
				$this->request->data['HrUploadAtt']['created_date'] = $this->Functions->get_current_date();
				$this->request->data['HrUploadAtt']['upload_file'] = $file;
				$this->request->data['HrUploadAtt']['att_month'] = $date[2].'-'.$date[1].'-01';
				// save into database							
				if($this->HrUploadAtt->save($this->request->data['HrUploadAtt'])) {		
					// $output .= $suc_start.$attendance['A'] ." attendance $output_str successfully<br>".$end;
				}else{
					// $output .= $suc_start.$attendance['A'] ." attendance failed to upload <br>".$end;
				}
				$file = $this->write_report($output);				
				// show the msg.
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>'.$output."<br><a href=".$this->webroot.'hruploadatt/download_report/'.$file.'>Download Report</a>', 'default', array('class' => 'alert alert-success'));
				
			}	
		}
	}
	
	/* function to check attendance already exists */
	public function check_attendance_exists($id, $date){
		$upload_data = $this->HrUploadAtt->HrAttendance->find('all', array('fields' => array('id'), 
		'conditions' => array('HrAttendance.app_users_id' => $id, 'HrAttendance.in_time like' => $date.'%'), 'limit' => '1'));
		return $upload_data[0]['HrAttendance']['id'];
	}
	
	/* function to create report */
	public function write_report($op){ 		
		$file = time().'_attendance.txt';
		$path = WWW_ROOT.'/uploads/report/'.$file;
		$fp = fopen($path, 'w+');
		$op_new = str_replace(array("<span class='out_suc'>", "<span class='out_fail'>","</span>"), array('', '', ''), $op);
		$op_ar = explode('<br>', $op_new);		
		foreach($op_ar as $key =>  $str){ 
			if(trim($str) != ''){		
				fputs($fp, ++$key.') '.trim($str)."\r\n");
			}
		}
		fclose($fp);
		return $file;
		
	}
	
	/* function to download the file */
	public function download_report($file){
		$this->download_file(WWW_ROOT.'/uploads/report/'.$file);
		die;
	
	}
	
	/* function to download the file */
	public function download_attendance($file){		
		$this->download_file(WWW_ROOT.'/uploads/attendance/'.$file);
		die;
	}
	
	/* function to download the file */
	public function download_sample($file){		
		$this->download_file(WWW_ROOT.'/uploads/sample/'.$file);
		die;
	}
	
	
	/* function to delete the adv. request */
	public function delete_payslip($id){
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){		
				$this->HrUploadAtt->id = $id;
				$this->HrUploadAtt->saveField('is_deleted', 'Y'); 
				$this->HrUploadAtt->saveField('modified_date', $this->Functions->get_current_date()); 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Payslip deleted successfully', 'default', array('class' => 'alert alert-success'));			
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hruploadatt/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hruploadatt/');
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));			
		}
		$this->redirect('/hruploadatt/');
	}
	
	/* function to auth record */
	public function auth_action($id){
		$data = $this->HrUploadAtt->findById($id, array('fields' => 'id','is_deleted','modified_date'));	
		// check the req belongs to the user
		if($data['HrUploadAtt']['is_deleted'] == 'Y'){
			return $data['HrUploadAtt']['modified_date'];
		}		
		else if(empty($data)){	
			return 'fail';
		}else{
			return 'pass';
		}
	}
	
	/* function to check employee exists */
	public function check_employee_exists($id){
		$data = $this->HrUploadAtt->HrEmployee->find('all', array('fields'=> array('HrEmployee.id'), 'conditions' => array('HrEmployee.emp_no' => $id, 'HrEmployee.is_deleted' => 'N',
		'HrEmployee.status' => '1'), 'limit' => '1'));
		return $data;
	}
	
	
	
	/* function to upload the file */
	public function upload_attachment($data){
		// validate the file				
		if(!empty($data['tmp_name'])){
			$file = time().'_'.$data['name']; 
			if($this->upload_file($data['tmp_name'], WWW_ROOT.'/uploads/attendance/'.$file)){
				return $file;
			}			
		}
				
	}
	
	
	/* clear the cache */
	
	public function beforeFilter() { 
		//$this->disable_cache();
		$this->show_tabs(103);
	}
	
	
		/* auto complete search */	
	public function search(){ 
		$this->layout = false;	 
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);
			$data = $this->HrUploadAtt->find('all', array('fields' => array('HrEmployee.first_name'), 
			'group' => array('HrEmployee.first_name'), 
			'conditions' => array("OR" => array ('HrEmployee.first_name like' => $q.'%'), 
			'AND' => array('HrUploadAtt.is_deleted' => 'N','HrEmployee.is_deleted' => 'N'))));		
			$this->set('results', $data);
		}
    }
	
	

	
}