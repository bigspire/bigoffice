<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class HrDeactivateSat extends AppModel {
	
	public $name = 'HrDeactivateSat';
	 
	public $useTable = 'hr_deactivate_sat';
	  
	public $primaryKey = 'id';

	public $belongsTo = array(
		'HrEmployee' => array(
            'className'  => 'HrEmployee',
			'foreignKey' => 'app_users_id'		
        )
	);
	
		
	public $validate = array(       
		'to_date' => array(		
            'empty' => array(
                'rule'     => 'check_date',
                'required' => true,
                'message'  => 'Please select from and to date'
            )
		),
		
		'app_users_id' => array(		
            'empty' => array(
                'rule'     => 'validate_employee',
                'required' => true,
                'message'  => 'Please select at least one employee'
			)
		 )
	);
		
	/* function to get the team members */
	public function get_team(){
		return $this->get_full_team($id);
	}
	
	/* function to check the dates */
	public function check_date(){
		if($this->data['HrDeactivateSat']['from_date'] == '' || $this->data['HrDeactivateSat']['to_date'] == ''){
			return false;
		}else{	
			return true;
		}		
	}
	
	/* function to validate the employee */
	public function validate_employee(){ 
		if($this->data['HrDeactivateSat']['app_users_id'][0] > 0){
			return true;
		}else{
			return false;
		}
	}
	
}