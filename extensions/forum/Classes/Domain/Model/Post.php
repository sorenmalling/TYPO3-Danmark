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
class Tx_Forum_Domain_Model_Post extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * content
	 *
	 * @var string
	 */
	protected $content;

	/**
	 * Author
	 *
	 * @var Tx_Forum_Domain_Model_Author
	 */
	protected $author;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the content
	 *
	 * @return string $content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Sets the content
	 *
	 * @param string $content
	 * @return void
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * Returns the author
	 *
	 * @return Tx_Forum_Domain_Model_Author $author
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Sets the author
	 *
	 * @param Tx_Forum_Domain_Model_Author $author
	 * @return void
	 */
	public function setAuthor(Tx_Forum_Domain_Model_Author $author) {
		$this->author = $author;
	}

}
?>