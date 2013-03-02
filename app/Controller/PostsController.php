<?php
/**
 * News Post Controller
 *
 * This file is News Posts controller file. All methods relating to news posts
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
 * News Post Controller
 *
 * All methods relating to news posts should be in here.
 *
 * @package       app.Controller
 */
class PostsController extends AppController {

    /**
     * Helpers used in this controller's views
     *
     * @var array
     */
    public $helpers = array( 'Html', 'Form', 'Session' );

    /**
     * Components used in this controller
     *
     * @var array
     */
    public $components = array( 'Session' );

    /**
     * The configuration for the paginate method
     *
     * @var array
     */
    public $paginate = array(
    	'limit' => 3,
    	'order' => array(
    		'Post.created' => 'desc'
    	)
    );

    /**
     * Returns a paged list of items
     */
    public function index() {
         $this->set( 'posts', $this->paginate() );
    }

    /* (non-PHPdoc)
     * @see AppController::isAuthorized()
     */
    public function isAuthorized( $user ) {
    	// All registered users can add posts
    	if ( $this->action === 'add' ) {
    		return true;
    	}

    	// The owner of a post can edit and delete it
    	if ( in_array( $this->action, array( 'edit', 'delete' ) ) ) {
    		$postId = $this->request->params['pass'][0];
    		if ( $this->Post->isOwnedBy( $postId, $user['id'] ) ) {
    			return true;
    		}
    	}

    	return parent::isAuthorized( $user );
    }

    /**
     * Returns an individual item given it's ID
     *
     * @param string $id The UID of the a news post
     * @throws NotFoundException
     */
    public function view( $id = null ) {
        if ( !$id ) {
            throw new NotFoundException( __( 'Invalid post' ) );
        }

        $post = $this->Post->findById( $id );
        if ( !$post ) {
            throw new NotFoundException( __( 'Invalid post' ) );
        }
        $this->set( 'post', $post );
    }

    /**
     * Creates a new item
     */
    public function add() {
    	if ( $this->request->is( 'post' ) ) {
    		$this->request->data['Post']['user_id'] = $this->Auth->user( 'id' );
    		$this->Post->create();
    		if ( $this->Post->save( $this->request->data ) ) {
    			$this->Session->setFlash( 'Your post has been saved.' );
    			$this->redirect( array( 'action' => 'index' ) );
    		} else {
    			$this->Session->setFlash( 'Unable to add your post.' );
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
    	if ( !$id ) {
    		throw new NotFoundException( __( 'Invalid post' ) );
    	}

    	$post = $this->Post->findById( $id );
    	if ( !$post ) {
    		throw new NotFoundException( __( 'Invalid post' ) );
    	}

    	if ( $this->request->is( 'post' ) || $this->request->is( 'put' ) ) {
    		$this->Post->id = $id;
    		if ( $this->Post->save( $this->request->data ) ) {
    			$this->Session->setFlash( 'Your post has been updated.' );
    			$this->redirect( array( 'action' => 'index' ) );
    		} else {
    			$this->Session->setFlash( 'Unable to update your post.' );
    		}
    	}

    	if ( !$this->request->data ) {
    		$this->request->data = $post;
    	}
    }

    /**
     * Delete an item given it's ID
     *
     * @param string $id
     * @throws MethodNotAllowedException
     */
    public function delete( $id ) {
    	if ( $this->request->is( 'get' ) ) {
    		throw new MethodNotAllowedException();
    	}

    	if ( $this->Post->delete( $id ) ) {
    		$this->Session->setFlash( 'The post with id: ' . $id . ' has been deleted.' );
    		$this->redirect( array( 'action' => 'index' ) );
    	}
    }
}

?>