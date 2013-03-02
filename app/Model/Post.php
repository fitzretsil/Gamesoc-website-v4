<?php
/**
 * News Post Model
 *
 * This file is News Posts Model file. All data-centric methods relating to news posts
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

/**
 * News Post Model
 *
 * All data-centric methods relating to news posts should be in here.
 *
 * @package       app.Model
 */
class Post extends AppModel {

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	public $validate = array(
			'title' => array(
					'rule' => 'notEmpty'
			),
			'body' => array(
					'rule' => 'notEmpty'
			)
	);

	/**
	 * Define the parent relationships of this Model
	 *
	 * @var array
	 */
	public $belongsTo = 'User';

	/**
	 * Returns true if the specified User created the specified Post
	 *
	 * @param string $post The Post's UID
	 * @param string $user The User's UID
	 * @return boolean
	 */
	public function isOwnedBy( $post, $user ) {
		return $this->field( 'id', array( 'id' => $post, 'user_id' => $user ) ) === $post;
	}
}
?>
