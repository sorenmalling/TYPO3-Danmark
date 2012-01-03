<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 Ingmar Schlecht
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
 * Creates a request an dispatches it to the controller which was specified
 * by TS Setup, Flexform and returns the content to the v4 framework.
 *
 * This class is the main entry point for extbase extensions in the frontend.
 *
 * @package ExtensionBuilder
 * @version $ID:$
 */
abstract class Tx_ExtensionBuilder_Domain_Model_DomainObject_Relation_AbstractRelation extends Tx_ExtensionBuilder_Domain_Model_DomainObject_AbstractProperty {

	/**
	 * The schema of the foreign class
	 * @var Tx_ExtensionBuilder_Domain_Model_DomainObject
	 */
	protected $foreignClass;

	/**
	 * If this flag is set to TRUE the relation is rendered as IRRE field (Inline Relational Record Editing). Default is FALSE.
	 * @var boolean
	 */
	protected $inlineEditing = FALSE;

	/**
	 * If this flag is set to TRUE the relation will be lazy loading. Default is FALSE
	 */
	protected $lazyLoading = FALSE;

	/**
	 *
	 * @return Tx_ExtensionBuilder_Domain_Model_DomainObject The foreign class
	 */
	public function getForeignClass() {
		return $this->foreignClass;
	}

	/**
	 *
	 * @param Tx_ExtensionBuilder_Domain_Model_DomainObject $foreignClass Set the foreign class of the relation
	 */
	public function setForeignClass(Tx_ExtensionBuilder_Domain_Model_DomainObject $foreignClass) {
		$this->foreignClass = $foreignClass;
	}

	/**
	 * Sets the flag, if the relation should be rendered as IRRE field.
	 *
	 * @param bool $inlineEditing
	 * @return void
	 **/
	public function setInlineEditing($inlineEditing) {
		$this->inlineEditing = (bool)$inlineEditing;
	}

	/**
	 * Returns the state of the flag, if the relation should be rendered as IRRE field.
	 *
	 * @return bool TRUE if the field shopuld be rendered as IRRE field; FALSE otherwise
	 **/
	public function getInlineEditing() {
		return (bool)$this->inlineEditing;
	}

	/**
	 * Sets the lazyLoading flag
	 *
	 * @param  $lazyLoading
	 * @return void
	 */
	public function setLazyLoading($lazyLoading) {
		$this->lazyLoading = $lazyLoading;
	}

	/**
	 * Gets the lazyLoading flag
	 *
	 * @return bool
	 */
	public function getLazyLoading() {
		return $this->lazyLoading;
	}

	public function getSqlDefinition() {
		return $this->getFieldName() . " int(11) unsigned DEFAULT '0' NOT NULL,";
	}

	public function getIsDisplayable() {
		return FALSE;
	}
}

?>
