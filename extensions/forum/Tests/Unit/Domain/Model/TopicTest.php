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
 * Test case for class Tx_Forum_Domain_Model_Topic.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage forum
 *
 */
class Tx_Forum_Domain_Model_TopicTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Forum_Domain_Model_Topic
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Forum_Domain_Model_Topic();
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
	public function getPostReturnsInitialValueForTx_Forum_Domain_Model_Post() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getPost()
		);
	}

	/**
	 * @test
	 */
	public function setPostForTx_Forum_Domain_Model_PostSetsPost() { 
		$dummyObject = new Tx_Forum_Domain_Model_Post();
		$this->fixture->setPost($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getPost()
		);
	}
	
	/**
	 * @test
	 */
	public function getResponsesReturnsInitialValueForObjectStorageContainingTx_Forum_Domain_Model_Post() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getResponses()
		);
	}

	/**
	 * @test
	 */
	public function setResponsesForObjectStorageContainingTx_Forum_Domain_Model_PostSetsResponses() { 
		$response = new Tx_Forum_Domain_Model_Post();
		$objectStorageHoldingExactlyOneResponses = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneResponses->attach($response);
		$this->fixture->setResponses($objectStorageHoldingExactlyOneResponses);

		$this->assertSame(
			$objectStorageHoldingExactlyOneResponses,
			$this->fixture->getResponses()
		);
	}
	
	/**
	 * @test
	 */
	public function addResponseToObjectStorageHoldingResponses() {
		$response = new Tx_Forum_Domain_Model_Post();
		$objectStorageHoldingExactlyOneResponse = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneResponse->attach($response);
		$this->fixture->addResponse($response);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneResponse,
			$this->fixture->getResponses()
		);
	}

	/**
	 * @test
	 */
	public function removeResponseFromObjectStorageHoldingResponses() {
		$response = new Tx_Forum_Domain_Model_Post();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($response);
		$localObjectStorage->detach($response);
		$this->fixture->addResponse($response);
		$this->fixture->removeResponse($response);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getResponses()
		);
	}
	
}
?>