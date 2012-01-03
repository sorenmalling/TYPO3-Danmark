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
 * Schema for a Domain Object.
 *
 * @package ExtensionBuilder
 * @version $ID:$
 */
class Tx_ExtensionBuilder_Domain_Model_DomainObject {

	/**
	 * Name of the domain object
	 * @var string
	 */
	protected $name;

	/**
	 *
	 * @var string
	 */
	protected $uniqueIdentifier = NULL;

	/**
	 * Description of the domain object
	 * @var string
	 */
	protected $description;

	/**
	 * If TRUE, this is an aggregate root.
	 * @var boolean
	 */
	protected $aggregateRoot;

	/**
	 * If TRUE, this is an entity. If FALSE, it is a ValueObject
	 * @var boolean
	 */
	protected $entity;

	/**
	 * The extension this domain object belongs to.
	 * @var Tx_ExtensionBuilder_Domain_Model_Extension
	 */
	protected $extension;

	/**
	 * List of properties the domain object has
	 * @var array<Tx_ExtensionBuilder_Domain_Model_DomainObject_AbstractProperty>
	 */
	protected $properties = array();

	/**
	 * List of actions the domain object has
	 * @var array<Tx_ExtensionBuilder_Domain_Model_DomainObject_Action>
	 */
	protected $actions = array();


	/**
	 * Is an upload folder required for this domain object
	 *
	 * @var boolean
	 */
	protected $needsUploadFolder = FALSE;

	/**
	 * Set name
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set name
	 * @param string $name Name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	public function getClassName() {
		return 'Tx_' . Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->extension->getExtensionKey()) . '_Domain_Model_' . $this->getName();
	}

	public function getControllerName() {
		return 'Tx_' . Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->extension->getExtensionKey()) . '_Controller_' . $this->getName() . 'Controller';
	}

	public function getDatabaseTableName() {
		return 'tx_' . strtolower(Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->extension->getExtensionKey())) . '_domain_model_' . strtolower($this->getName());
	}

	/**
	 * Get property uniqueIdentifier
	 *
	 * @return string
	 */
	public function getUniqueIdentifier() {
		return $this->uniqueIdentifier;
	}

	/**
	 * Set property uniqueIdentifier
	 *
	 * @param string Property uniqueIdentifier
	 */
	public function setUniqueIdentifier($uniqueIdentifier) {
		$this->uniqueIdentifier = $uniqueIdentifier;
	}

	/**
	 * Get description
	 * @return string
	 */
	public function getDescription() {
		if ($this->description) {
			return $this->description;
		} else {
			return $this->getName();
		}
	}

	/**
	 * Set description
	 * @param string $description Description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * get aggregate root
	 * @return boolean TRUE if it is an aggregate root, FALSE otherwise.
	 */
	public function getAggregateRoot() {
		return $this->aggregateRoot;
	}

	public function isAggregateRoot() {
		return $this->getAggregateRoot();
	}

	/**
	 * Setter for aggregate root flag
	 * @param boolean $aggregateRoot TRUE if Domain Object should be aggregate root.
	 */
	public function setAggregateRoot($aggregateRoot) {
		$this->aggregateRoot = (boolean)$aggregateRoot;
	}

	/**
	 *
	 * @return boolean TRUE if it is an entity, FALSE if it is a ValueObject
	 */
	public function getEntity() {
		return $this->entity;
	}

	/**
	 *
	 * @return boolean TRUE if it is an entity, FALSE if it is a ValueObject
	 */
	public function isEntity() {
		return $this->getEntity();
	}

	/**
	 *
	 * @param $entity $entity TRUE if it is an entity, FALSE if it is a ValueObject
	 *
	 * @return void
	 */
	public function setEntity($entity) {
		$this->entity = (boolean)$entity;
	}

	/**
	 * Adding a new property
	 * @param Tx_ExtensionBuilder_Domain_Model_DomainObject_AbstractProperty $property The new property to add
	 *
	 * @return void
	 */
	public function addProperty(Tx_ExtensionBuilder_Domain_Model_DomainObject_AbstractProperty $property) {
		$property->setDomainObject($this);
		if (is_subclass_of($property, 'Tx_ExtensionBuilder_Domain_Model_DomainObject_Relation_AnyToManyRelation')) {
			// here we do a check if there is already a relation to the same foreign class
			if (!$this->isUniqueRelationToForeignClass($property->getForeignClass())) {
				$property->setUseExtendedRelationTableName(TRUE);
			}
		}
		if ($property->getNeedsUploadFolder()) {
			$this->needsUploadFolder = TRUE;
		}
		$this->properties[] = $property;
	}

	/**
	 * Check all relations of this object and returns TRUE
	 * if there is no other relation to the same foreign class
	 *
	 * @param string $foreignClass
	 *
	 * @return boolean
	 */
	protected function isUniqueRelationToForeignClass($foreignClass) {
		$anyToManyRelationProperties = $this->getAnyToManyRelationProperties();
		$foreignClasses = array();
		foreach ($anyToManyRelationProperties as $anyToManyRelationProperty) {
			if ($anyToManyRelationProperty->getForeignClass() == $foreignClass) {
				return FALSE;
			}
		}
		return TRUE;
	}

	/**
	 * Get all properties
	 * @return array<Tx_ExtensionBuilder_Domain_Model_DomainObject_AbstractProperty>
	 */
	public function getProperties() {
		return $this->properties;
	}

	/**
	 * Get property
	 *
	 * @return object <Tx_ExtensionBuilder_Domain_Model_DomainObject_AbstractProperty>
	 */
	public function getPropertyByName($propertyName) {
		foreach ($this->properties as $property) {
			if ($property->getName() == $propertyName) {
				return $property;
			}
		}
		return NULL;
	}

	/**
	 * Get all properties holding relations of type Property_Relation_ZeroToManyRelation
	 *
	 * @return array<Tx_ExtensionBuilder_Domain_Model_DomainObject_Relation_ZeroToManyRelation>
	 */
	public function getZeroToManyRelationProperties() {
		$relationProperties = array();
		foreach ($this->properties as $property) {
			if (is_a($property, 'Tx_ExtensionBuilder_Domain_Model_DomainObject_Relation_ZeroToManyRelation')) {
				$relationProperties[] = $property;
			}
		}
		return $relationProperties;
	}

	/**
	 * Get all properties holding relations of type Property_Relation_AnyToManyRelation
	 *
	 * @return array<Tx_ExtensionBuilder_Domain_Model_DomainObject_Relation_AnyToManyRelation>
	 */
	public function getAnyToManyRelationProperties() {
		$relationProperties = array();
		foreach ($this->properties as $property) {
			if (is_subclass_of($property, 'Tx_ExtensionBuilder_Domain_Model_DomainObject_Relation_AnyToManyRelation')) {
				$relationProperties[] = $property;
			}
		}
		return $relationProperties;
	}

	/**
	 * Adding a new action
	 * @param Tx_ExtensionBuilder_Domain_Model_DomainObject_Action $action The new action to add
	 *
	 * @return void
	 */
	public function addAction(Tx_ExtensionBuilder_Domain_Model_DomainObject_Action $action) {
		$action->setDomainObject($this);
		if (!in_array($action, $this->actions)) {
			$this->actions[] = $action;
		}

	}

	/**
	 * Get all actions
	 *
	 * @return array<Tx_ExtensionBuilder_Domain_Model_DomainObject_Action>
	 */
	public function getActions() {
		return $this->actions;
	}

	/**
	 * returns TRUE if the domainObject has actions
	 *
	 * @return boolean
	 */
	public function hasActions() {
		return count($this->actions) > 0;
	}

	/**
	 * DO NOT CALL DIRECTLY! This is being called by addDomainModel() automatically.
	 * @param Tx_ExtensionBuilder_Domain_Model_Extension $extension the extension this domain model belongs to.
	 */
	public function setExtension(Tx_ExtensionBuilder_Domain_Model_Extension $extension) {
		$this->extension = $extension;
	}

	/**
	 * @return Tx_ExtensionBuilder_Domain_Model_Extension
	 */
	public function getExtension() {
		return $this->extension;
	}


	/**
	 * Get the base class for this Domain Object (different if it is entity or value object)
	 *
	 * @return string name of the base class
	 */
	public function getBaseClass() {
		if ($this->entity) {
			return 'Tx_Extbase_DomainObject_AbstractEntity';
		} else {
			return 'Tx_Extbase_DomainObject_AbstractValueObject';
		}
	}

	/**
	 * returns the name of the domain repository class name, if it is an aggregateroot.
	 *
	 * @return string
	 */
	public function getDomainRepositoryClassName() {
		if (!$this->aggregateRoot) return '';
		return 'Tx_' . Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase($this->extension->getExtensionKey()) . '_Domain_Repository_' . $this->getName() . 'Repository';
	}

	/**
	 * @return string
	 */
	public function getCommaSeparatedFieldList() {
		$fieldNames = array();
		foreach ($this->properties as $property) {
			$fieldNames[] = $property->getFieldName();
		}
		return implode(',', $fieldNames);
	}

	/**
	 * Get the label to display in the list module.
	 * TODO: Needs to be configurable. Currently, the first property is the label in the backend.
	 * @return <type>
	 */
	public function getListModuleValueLabel() {
		if (isset($this->properties[0])) {
			return $this->properties[0]->getFieldName();
		} else {
			return 'uid';
		}
	}

	/**
	 * @return string
	 */
	public function getLabelNamespace() {
		return $this->extension->getShortExtensionKey() . '_domain_model_' . strtolower($this->getName());
	}

	/**
	 * @return bool
	 */
	public function getHasBooleanProperties() {
		foreach ($this->properties as $property) {
			if ($property->isBoolean()) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * @return array
	 */
	public function getPropertiesWithMappingStatements() {
		$propertiesWithMappingStatements = array();
		foreach ($this->properties as $property) {
			if ($property->getMappingStatement()) {
				$propertiesWithMappingStatements[] = $property;
			}
		}
		return $propertiesWithMappingStatements;
	}

	/**
	 * Getter for $needsUploadFolder
	 *
	 * @return boolean $needsUploadFolder
	 */
	public function getNeedsUploadFolder() {
		return $this->needsUploadFolder;
	}
}

?>