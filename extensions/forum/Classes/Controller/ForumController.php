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
class Tx_Forum_Controller_ForumController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Forum repository
	 * 
	 * @var Tx_Forum_Domain_Repository_ForumRepository
	 */
	protected $forumRepository;
	
	/**
	 * Inject forum repository
	 * 
	 * @param Tx_Forum_Domain_Repository_ForumRepository $forumRepository
	 */
	public function injectForumRepository(Tx_Forum_Domain_Repository_ForumRepository $forumRepository) {
		$this->forumRepository = $forumRepository;
	}


	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$forums = $this->forumRepository->findAll();
		$this->view->assign('forums', $forums);
	}

	/**
	 * action new
	 *
	 * @param $newForum
	 * @dontvalidate $newForum
	 * @return void
	 */
	public function newAction(Tx_Forum_Domain_Model_Forum $newForum = NULL) {
		$this->view->assign('newForum', $newForum);
	}

	/**
	 * action create
	 *
	 * @param $newForum
	 * @return void
	 */
	public function createAction(Tx_Forum_Domain_Model_Forum $newForum) {
		$this->forumRepository->add($newForum);
		$this->flashMessageContainer->add('Your new Forum was created.');
		$this->redirect('list');
	}
	
	/**
	 * action show
	 *
	 * @param $forum
	 * @return void
	 */
	public function showAction(Tx_Forum_Domain_Model_Forum $forum) {
		$this->view->assign('forum', $forum);
	}

}
?>