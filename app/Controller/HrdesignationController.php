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
 
class HrDesignationController extends AppController {  
	
	public $name = 'HrDesignation';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');
	
	public $layout = 'apps';	

	/* function to list the adv. requests */
	public function index(){	
		// set the page title
		$this->set('title_for_layout', 'Designation - HRIS - BigOffice');
		// when the form is submitted for search
		if($this->request->is('post')){
			$this->redirect('/hrdesignation/?keyword='.$this->request->data['HrDesignation']['SearchText']);			
		}
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (desig_name,desig_desc) AGAINST ('".$this->params->query['keyword']."' IN BOOLEAN MODE)"); 
		}
		// fetch the advances		
		$this->paginate = array('fields' => array('id','desig_name', 'status','created_date'),'limit' => 10,'conditions' => array($keyCond, 'HrDesignation.is_deleted' => 'N'), 'order' => array('created_date' => 'desc'));
		$data = $this->paginate('HrDesignation');			
		$this->set('desig_data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You havn\'t created any designation', 'default', array('class' => 'alert alert'));	
		}
		
		
	}
	
	/* function to save the customer */
	public function create_desig(){ 
		// set the page title		
		$this->set('title_for_layout', 'Create Designation - HRIS - BigOffice');				
		if ($this->request->is('post')){ 
			// validates the form
			$this->HrDesignation->set($this->request->data);
			if ($this->HrDesignation->validates(array('fieldList' => array('desig_name','status')))) {
				$this->request->data['HrDesignation']['created_by'] = $this->Session->read('USER.Login.id');				
				$this->request->data['HrDesignation']['created_date'] = $this->Functions->get_current_date();						
				// save the data
				if($this->HrDesignation->save($this->request->data['HrDesignation'])) {					
					// show the msg.
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Designation  created successfully', 'default', array('class' => 'alert alert-success'));
					$this->redirect('/hrdesignation/');
				}else{
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));
				}
			}else{
				//print_r($this->HrDesignation->validationErrors);
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in submitting the form. please check errors...', 'default', array('class' => 'alert alert-error'));	
			}
		}
	}
	
		
	
	/* function to delete the adv. request */
	public function delete_desig($desig_id){
		if(!empty($desig_id) && intval($desig_id)){
			// authorize user before action
			$ret_value = $this->auth_action($desig_id);
			if($ret_value == 'pass'){				
				$this->HrDesignation->id = $desig_id;
				$this->HrDesignation->saveField('is_deleted', 'Y'); 
				$this->HrDesignation->saveField('modified_date', $this->Functions->get_current_date()); 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Designation deleted successfully', 'default', array('class' => 'alert alert-success'));					
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrdesignation/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrdesignation/');
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));			
		}
		$this->redirect('/hrdesignation/');
	}
	
	
	/* function to edit the grade */
	public function edit_desig($id){	
		// set the page title		
		$this->set('title_for_layout', 'Edit Designation - HRIS - BigOffice');			
		if (!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){	
				// when the form submitted
				if (!empty($this->request->data)){ 
					// validates the form
					$this->HrDesignation->set($this->request->data);
					if ($this->HrDesignation->validates(array('fieldList' => array('desig_name','status')))) {
						$this->request->data['HrDesignation']['modified_by'] = $this->Session->read('USER.Login.id');				
						$this->request->data['HrDesignation']['modified_date'] = $this->Functions->get_current_date();					
						// save the data
						if($this->HrDesignation->save($this->request->data['HrDesignation'])) {					
							// show the msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Designation details modified successfully', 'default', array('class' => 'alert alert-success'));
						}else{
							// show the error msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
						}					
					$this->redirect('/hrdesignation/');						
					}	
				}else{
					$this->request->data = $this->HrDesignation->findById($id);									
				}
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrdesignation/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrdesignation/');
			}
		}else{
			// show the error msg.
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));
			$this->redirect('/hrdesignation/');		
		}		
		
	}
	
	/* function to auth record */
	public function auth_action($id){
		$data = $this->HrDesignation->findById($id, array('fields' => 'id','is_deleted','modified_date'));	
		// check the req belongs to the user
		if($data['HrDesignation']['is_deleted'] == 'Y'){
			return $data['HrDesignation']['modified_date'];
		}		
		else if(empty($data)){	
			return 'fail';
		}else{
			return 'pass';
		}
	}
	
	/* function to view the adv. request */
	public function view_desig($id){
		// set the page title		
		$this->set('title_for_layout', 'View Designation - HRIS - BigOffice');
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){	
				$data = $this->HrDesignation->findById($id);
				$this->set('desig_data', $data);
			}else if($ret_value == 'fail'){ 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrdesignation/');	
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/hrdesignation/');	
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));		
			$this->redirect('/hrdesignation/');	
		}
		
		
	}
	
	/* clear the cache */
	
	public function beforeFilter() { 
		//$this->disable_cache();
		$this->show_tabs(19);
	}
	
	
		/* auto complete search */	
	public function search(){ 
		$this->layout = false;	 
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);
			$data = $this->HrDesignation->find('all', array('fields' => array('desig_name'),  'group' => array('desig_name'), 'conditions' => 	$conditions =  array("OR" => array ('desig_name like' => '%'.$q.'%'), 'AND' => array('is_deleted' => 'N'))));		
			$this->set('results', $data);
		}
    }
	
	
	
}