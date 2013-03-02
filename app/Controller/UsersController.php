<?php
/**
 * Users Controller
 *
 * This file is the Users controller file. All methods relating to users
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
 * @package       app.Controller
 * @since         GameSoc v4.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Users Controller
 *
 * All methods relating to users should be in here.
 *
 * @package       app.Controller
 */
class UsersController extends AppController {

	/* (non-PHPdoc)
	 * @see AppController::beforeFilter()
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow( 'add' );
	}

	/**
	 * Handles User Login
	 */
	public function login() {
		if ( $this->request->is( 'post' ) ) {
			if ( $this->Auth->login() ) {
				$this->redirect( $this->Auth->redirect() );
			} else {
				$this->Session->setFlash( __( 'Invalid username or password, try again' ) );
			}
		}
	}

	/**
	 * Handles User Logout
	 */
	public function logout() {
		$this->redirect( $this->Auth->logout() );
	}

	/**
	 * Returns a paged list of items
	 */
	public function index() {
		$this->User->recursive = 0;
		$this->set( 'users', $this->paginate() );
	}

	/**
	 * Returns an individual item given it's ID
	 *
	 * @param string $id The UID of the a news post
	 * @throws NotFoundException
	 */
	public function view( $id = null ) {
		$this->User->id = $id;
		if ( !$this->User->exists() ) {
			throw new NotFoundException( __( 'Invalid user' ) );
		}
		$this->set( 'user', $this->User->read( null, $id ) );
	}

	/**
	 * Creates a new item
	 */
	public function add() {
		if ( $this->request->is( 'post' )) {
			$this->User->create();
			if ( $this->User->save( $this->request->data ) ) {
				$this->Session->setFlash( __( 'The user has been saved' ) );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( __( 'The user could not be saved. Please, try again.' ) );
			}
		}
	}

	/**
	 * Update an existing item given it's ID
	 *
	 * @param string $id
	 * @throws NotFoundException
	 */
	public function edit( $id = null ) {
		$this->User->id = $id;
		if ( !$this->User->exists() ) {
			throw new NotFoundException( __( 'Invalid user' ) );
		}
		if ( $this->request->is( 'post' ) || $this->request->is( 'put' ) ) {
			if ( $this->User->save( $this->request->data ) ) {
				$this->Session->setFlash( __( 'The user has been saved' ) );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( __( 'The user could not be saved. Please, try again.' ) );
			}
		} else {
			$this->request->data = $this->User->read( null, $id );
			unset($this->request->data['User']['password']);
		}
	}

	/**
	 * Delete an item given it's ID
	 *
	 * @param string $id
	 * @throws MethodNotAllowedException
	 */
	public function delete( $id = null ) {
		if ( !$this->request->is( 'post' ) ) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if ( !$this->User->exists() ) {
			throw new NotFoundException( __( 'Invalid user' ) );
		}
		if ( $this->User->delete() ) {
			$this->Session->setFlash( __( 'User deleted' ) );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Session->setFlash( __( 'User was not deleted' ) );
		$this->redirect( array( 'action' => 'index' ) );
	}
}
?>