<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	/**
	 * @var Components used by all controllers
	 */
	public $components = array(
			'Session',
			'Auth' => array(
					'loginRedirect'  => array( 'controller' => 'posts', 'action' => 'index' ),
					'logoutRedirect' => array( 'controller' => 'posts', 'action' => 'index' ),
					'authorize'      => array( 'Controller' ),
			)
	);

	/* (non-PHPdoc)
	 * @see Controller::beforeFilter()
	 */
	public function beforeFilter() {
		$this->Auth->allow( 'index', 'view','display' );
		$this->set( 'admin', $this->Auth->user() );
	}

	/**
	 * This method returns true if a user can access the current page
	 *
	 * @param array $user The current user's information
	 * @return boolean
	 */
	public function isAuthorized($user) {
		// Admin can access every action
		if ( isset( $user['role'] ) && $user['role'] === 'admin' ) {
			return true;
		}

		// Default deny
		return false;
	}

}
