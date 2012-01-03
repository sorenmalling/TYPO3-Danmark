<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Jochen Rau
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
 * @package ExtensionBuilder
 * @version $ID:$
 */
abstract class Tx_ExtensionBuilder_Domain_Model_DomainObject_Relation_AnyToManyRelation extends Tx_ExtensionBuilder_Domain_Model_DomainObject_Relation_AbstractRelation {

	/**
	 * The mm relation table name
	 *
	 * @var string
	 */
	protected $relationTableName;

	/**
	 * Use tbl1_field1_tbl2_mm as table name to enable multiple relations
	 * to the same foreign class
	 *
	 * @var boolean
	 */
	protected $useExtendedRelationTableName = FALSE;

	/**
	 * Returns the relation table name. It is build by having 'tx_myextension_' followed by the
	 * first domain object name followed by the second domain object name followed by '_mm'.
	 *
	 * @return void
	 */
	public function getRelationTableName() {
		if (!empty($this->relationTableName)) {
			return $this->relationTableName;
		}
		$relationTableName = 'tx_'
							 . strtolower(Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->domainObject->getExtension()->getExtensionKey()))
							 . '_'
							 . strtolower($this->domainObject->getName());

		if ($this->useExtendedRelationTableName) {
			$relationTableName .= '_' . strtolower($this->getName());
		}
		$relationTableName .= '_' . strtolower($this->foreignClass->getName()) . '_mm';
		return $relationTableName;
	}

	/**
	 * Setter for useExtendedRelationTableName
	 * @param boolean $useExtendedRelationTableName
	 */
	public function setUseExtendedRelationTableName($useExtendedRelationTableName) {
		$this->useExtendedRelationTableName = $useExtendedRelationTableName;
	}

	/**
	 * setter for relation table name
	 * if a table name is configured in TCA the table name is ste to the configured name
	 *
	 * @param $relationTableName
	 * @return void
	 */
	public function setRelationTableName($relationTableName) {
		$this->relationTableName = $relationTableName;
	}

	/**
	 * Is a MM table needed for this relation?
	 *
	 * @return void
	 */
	public function getUseMMTable() {
		if ($this->getInlineEditing()) {
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

}

?>