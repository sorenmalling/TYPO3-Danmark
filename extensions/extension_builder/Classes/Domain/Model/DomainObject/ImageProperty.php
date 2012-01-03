<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Nico de Haen
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
 *
 * Image property
 *
 * @package ExtensionBuilder
 * @version $ID:$
 */
class Tx_ExtensionBuilder_Domain_Model_DomainObject_ImageProperty extends Tx_ExtensionBuilder_Domain_Model_DomainObject_AbstractProperty {

	/**
	 * flag that this property needs an upload folder
	 *
	 * @var boolean
	 */
	protected $needsUploadFolder = TRUE;

	/**
	 * allowed file types for this property
	 * @var string (comma separated filetypes)
	 */
	protected $allowedFileTypes = '';

	/**
	 * not allowed file types for this property
	 * @var string (comma separated filetypes)
	 */
	protected $disallowedFileTypes = '';

	public function getTypeForComment() {
		return 'string';
	}

	public function getTypeHint() {
		return '';
	}

	public function getSqlDefinition() {
		return $this->getFieldName() . " text NOT NULL,";
	}

	/**
	 * getter for allowed file types
	 *
	 * @return boolean
	 */
	public function getAllowedFileTypes() {
		if (empty($this->allowedFileTypes)) {
			$this->allowedFileTypes = $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'];
		}
		return $this->allowedFileTypes;
	}

	/**
	 * setter for allowed file types
	 *
	 * @return string
	 */
	public function setAllowedFileTypes($allowedFileTypes) {
		return $this->allowedFileTypes = $allowedFileTypes;
	}

	/**
	 * getter for disallowed file types
	 *
	 * @return boolean
	 */
	public function getDisallowedFileTypes() {
		return $this->disallowedFileTypes;
	}

	/**
	 * setter for disallowed file types
	 *
	 * @return string
	 */
	public function setDisallowedFileTypes($disallowedFileTypes) {
		return $this->disallowedFileTypes = $disallowedFileTypes;
	}
}

?>