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

class HrBusinessUnit extends AppModel {
	
	public $name = 'HrBusinessUnit';
	 
	public $useTable = 'hr_business_unit';
	  
	public $primaryKey = 'id';
	
	
	
	public $validate = array(			
        'business_unit' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the business unit'
            ),
			 'unique' => array(
                'rule'     => 'isUnique',
                'required' => true,
				'create'	=> 'on',
                'message'  => 'Business unit already exists'
            )
			
        ),
		'status' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the status'
            )
		)
		
	);
	
	

	
}