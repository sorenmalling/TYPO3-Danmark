<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 *
 *
 * @package forum
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_Forum_Domain_Model_Topic extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * First post
	 *
	 * @var Tx_Forum_Domain_Model_Post
	 */
	protected $post;

	/**
	 * Responses
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Forum_Domain_Model_Post>
	 */
	protected $responses;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->responses = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the post
	 *
	 * @return Tx_Forum_Domain_Model_Post $post
	 */
	public function getPost() {
		return $this->post;
	}

	/**
	 * Sets the post
	 *
	 * @param Tx_Forum_Domain_Model_Post $post
	 * @return void
	 */
	public function setPost(Tx_Forum_Domain_Model_Post $post) {
		$this->post = $post;
	}

	/**
	 * Adds a Post
	 *
	 * @param Tx_Forum_Domain_Model_Post $response
	 * @return void
	 */
	public function addResponse(Tx_Forum_Domain_Model_Post $response) {
		$this->responses->attach($response);
	}

	/**
	 * Removes a Post
	 *
	 * @param Tx_Forum_Domain_Model_Post $responseToRemove The Post to be removed
	 * @return void
	 */
	public function removeResponse(Tx_Forum_Domain_Model_Post $responseToRemove) {
		$this->responses->detach($responseToRemove);
	}

	/**
	 * Returns the responses
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Forum_Domain_Model_Post> $responses
	 */
	public function getResponses() {
		return $this->responses;
	}

	/**
	 * Sets the responses
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Forum_Domain_Model_Post> $responses
	 * @return void
	 */
	public function setResponses(Tx_Extbase_Persistence_ObjectStorage $responses) {
		$this->responses = $responses;
	}

}
?>