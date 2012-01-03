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
class Tx_Forum_Domain_Model_Forum extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * topics
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Forum_Domain_Model_Topic>
	 */
	protected $topics;

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
		$this->topics = new Tx_Extbase_Persistence_ObjectStorage();
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
	 * Adds a Topic
	 *
	 * @param Tx_Forum_Domain_Model_Topic $topic
	 * @return void
	 */
	public function addTopic(Tx_Forum_Domain_Model_Topic $topic) {
		$this->topics->attach($topic);
	}

	/**
	 * Removes a Topic
	 *
	 * @param Tx_Forum_Domain_Model_Topic $topicToRemove The Topic to be removed
	 * @return void
	 */
	public function removeTopic(Tx_Forum_Domain_Model_Topic $topicToRemove) {
		$this->topics->detach($topicToRemove);
	}

	/**
	 * Returns the topics
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Forum_Domain_Model_Topic> $topics
	 */
	public function getTopics() {
		return $this->topics;
	}

	/**
	 * Sets the topics
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Forum_Domain_Model_Topic> $topics
	 * @return void
	 */
	public function setTopics(Tx_Extbase_Persistence_ObjectStorage $topics) {
		$this->topics = $topics;
	}

}
?>