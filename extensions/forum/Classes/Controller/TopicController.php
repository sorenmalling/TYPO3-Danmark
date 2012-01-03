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
class Tx_Forum_Controller_TopicController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$topics = $this->topicRepository->findAll();
		$this->view->assign('topics', $topics);
	}

	/**
	 * action new
	 *
	 * @param $newTopic
	 * @dontvalidate $newTopic
	 * @return void
	 */
	public function newAction(Tx_Forum_Domain_Model_Topic $newTopic = NULL) {
		$this->view->assign('newTopic', $newTopic);
	}

	/**
	 * action create
	 *
	 * @param $newTopic
	 * @return void
	 */
	public function createAction(Tx_Forum_Domain_Model_Topic $newTopic) {
		$this->topicRepository->add($newTopic);
		$this->flashMessageContainer->add('Your new Topic was created.');
		$this->redirect('list');
	}

	/**
	 * action show
	 *
	 * @param $topic
	 * @return void
	 */
	public function showAction(Tx_Forum_Domain_Model_Topic $topic) {
		$this->view->assign('topic', $topic);
	}

}
?>