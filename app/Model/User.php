<?php
/**
 * User Model
 *
 * This file is User Model file. All data-centric methods relating to users
 * should be in here.
 *
 * PHP 5
 *
 * Copyright 2005-2013, Edinburgh University Computer Gaming Society. (http://gamesoc.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2013, Edinburgh University Computer Gaming Society (http://gamesoc.org)
 * @link          http://gamesoc.org Edinburgh University Computer Gaming Society
 * @package       app.Model
 * @since         GameSoc v4.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * All data-centric methods relating to users should be in here.
 *
 * @package       app.Model
 */
class User extends AppModel {

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array(
                		'president',
                		'secretary',
                		'treasurer',
                		'kit_monkey',
                		'clan_leader',
                		'server_admin',
                		'webmaster',
                		'publicity_officer',
                		'social_secretary',
                		'ordinary_member',
                )),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    /**
     * Define the child relationships
     *
     * @var array
     */
    public $hasMany = 'Post';

    /**
     * The list of virtual fields used by this model
     *
     * A Virtual field is one created from the data stored
     * in the database table using SQL Commands
     *
     * @var array
     */
    public $virtualFields = array(
    		'full_name' => 'CONCAT(User.first_name, " ", User.last_name)'
    );

    /* (non-PHPdoc)
     * @see Model::beforeSave()
     */
    public function beforeSave($options = array()) {
    	if ( isset( $this->data[$this->alias]['password'] ) ) {
    		$this->log( "Password exists within the data array, value will be hashed before it is saved" );
    		$this->data[$this->alias]['password'] = AuthComponent::password( $this->data[$this->alias]['password'] );
    	}
    	return true;
    }
}
?>