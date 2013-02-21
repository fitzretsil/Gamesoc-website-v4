<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session' );
    public $components = array('Session');
    
    public $paginate = array(
    	'limit' => 3,
    	'order' => array(
    		'Post.created' => 'desc'		
    	)	
    );

    public function index() {
         //$this->set('posts', $this->Post->find('all'));
         $this->set( 'posts', $this->paginate() );
    }
    
    public function isAuthorized($user) {
    	// All registered users can add posts
    	if ($this->action === 'add') {
    		return true;
    	}
    
    	// The owner of a post can edit and delete it
    	if (in_array($this->action, array('edit', 'delete'))) {
    		$postId = $this->request->params['pass'][0];
    		if ($this->Post->isOwnedBy($postId, $user['id'])) {
    			return true;
    		}
    	}
    
    	return parent::isAuthorized($user);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    
    public function add() {
    	if ($this->request->is('post')) {
    		$this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
    		$this->Post->create();
    		if ($this->Post->save($this->request->data)) {
    			$this->Session->setFlash('Your post has been saved.');
    			$this->redirect(array('action' => 'index'));
    		} else {
    			$this->Session->setFlash('Unable to add your post.');
    		}
    	}
    }
    
    public function edit($id = null) {
    	if (!$id) {
    		throw new NotFoundException(__('Invalid post'));
    	}
    
    	$post = $this->Post->findById($id);
    	if (!$post) {
    		throw new NotFoundException(__('Invalid post'));
    	}
    
    	if ($this->request->is('post') || $this->request->is('put')) {
    		$this->Post->id = $id;
    		if ($this->Post->save($this->request->data)) {
    			$this->Session->setFlash('Your post has been updated.');
    			$this->redirect(array('action' => 'index'));
    		} else {
    			$this->Session->setFlash('Unable to update your post.');
    		}
    	}
    
    	if (!$this->request->data) {
    		$this->request->data = $post;
    	}
    }
    
    public function delete($id) {
    	if ($this->request->is('get')) {
    		throw new MethodNotAllowedException();
    	}
    
    	if ($this->Post->delete($id)) {
    		$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
    		$this->redirect(array('action' => 'index'));
    	}
    }
}

?>