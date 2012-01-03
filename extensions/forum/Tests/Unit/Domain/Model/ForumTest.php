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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Forum_Domain_Model_Forum.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage forum
 *
 */
class Tx_Forum_Domain_Model_ForumTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Forum_Domain_Model_Forum
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Forum_Domain_Model_Forum();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getTopicsReturnsInitialValueForObjectStorageContainingTx_Forum_Domain_Model_Topic() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getTopics()
		);
	}

	/**
	 * @test
	 */
	public function setTopicsForObjectStorageContainingTx_Forum_Domain_Model_TopicSetsTopics() { 
		$topic = new Tx_Forum_Domain_Model_Topic();
		$objectStorageHoldingExactlyOneTopics = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneTopics->attach($topic);
		$this->fixture->setTopics($objectStorageHoldingExactlyOneTopics);

		$this->assertSame(
			$objectStorageHoldingExactlyOneTopics,
			$this->fixture->getTopics()
		);
	}
	
	/**
	 * @test
	 */
	public function addTopicToObjectStorageHoldingTopics() {
		$topic = new Tx_Forum_Domain_Model_Topic();
		$objectStorageHoldingExactlyOneTopic = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneTopic->attach($topic);
		$this->fixture->addTopic($topic);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneTopic,
			$this->fixture->getTopics()
		);
	}

	/**
	 * @test
	 */
	public function removeTopicFromObjectStorageHoldingTopics() {
		$topic = new Tx_Forum_Domain_Model_Topic();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($topic);
		$localObjectStorage->detach($topic);
		$this->fixture->addTopic($topic);
		$this->fixture->removeTopic($topic);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getTopics()
		);
	}
	
}
?>