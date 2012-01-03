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
 * Schema for a whole extension
 *
 * @package ExtensionBuilder
 */
class Tx_ExtensionBuilder_Domain_Model_Extension {

	/**
	 * The extension key
	 * @var string
	 */
	protected $extensionKey;

	/**
	 * Extension's name
	 * @var string
	 */
	protected $name;

	/**
	 * Extension dir
	 * @var string
	 */
	protected $extensionDir;

	/**
	 * Extension's version
	 * @var string
	 */
	protected $version;

	/**
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * The original extension key (if an extension was renamed)
	 * @var string
	 */
	protected $originalExtensionKey;

	/**
	 *
	 * @var array
	 */
	protected $settings = array();

	/**
	 * default settings for em_conf
	 * @var array
	 */
	protected $emConfDefaults = array('dependencies' => 'cms,extbase,fluid', 'category' => 'plugin');

	/**
	 * @var string
	 */
	protected $priority = '';

	/**
	 * @var bool
	 */
	protected $shy = FALSE;

	/**
	 * @var string
	 */
	protected $category;

	/**
	 * flag that is set to TRUE if there are domain objects with
	 * properties that need mapping (because they use MYSQL protected words etc.
	 *
	 * @var boolean
	 */
	protected $propertiesThatNeedMapping = FALSE;

	/**
	 * The extension's state. One of the STATE_* constants.
	 * @var integer
	 */
	protected $state = 0;

	const STATE_ALPHA = 0;
	const STATE_BETA = 1;
	const STATE_STABLE = 2;
	const STATE_EXPERIMENTAL = 3;
	const STATE_TEST = 4;

	/**
	 * Is an upload folder required for this extension
	 *
	 * @var boolean
	 */
	protected $needsUploadFolder = FALSE;

	/**
	 *
	 * an array keeping all md5 hashes of all files in the extension to detect modifications
	 *
	 * @var array
	 */
	protected $md5Hashes = array();

	/**
	 * All domain objects
	 * @var array<Tx_ExtensionBuilder_Domain_Model_DomainObject>
	 */
	protected $domainObjects = array();

	/**
	 * The Persons working on the Extension
	 * @var array<Tx_ExtensionBuilder_Domain_Model_Person>
	 */
	protected $persons = array();

	/**
	 * plugins
	 * @var array<Tx_ExtensionBuilder_Domain_Model_Plugin>
	 */
	private $plugins;

	/**
	 * backend modules
	 * @var array<Tx_ExtensionBuilder_Domain_Model_BackendModule>
	 */
	private $backendModules;

	/**
	 * was the extension renamed?
	 * @var boolean
	 */
	private $renamed = FALSE;

	/**
	 *
	 * @return string
	 */
	public function getExtensionKey() {
		return $this->extensionKey;
	}

	/**
	 *
	 * @param string $extensionKey
	 */
	public function setExtensionKey($extensionKey) {
		$this->extensionKey = $extensionKey;
	}

	/**
	 *
	 * @return string
	 */
	public function getOriginalExtensionKey() {
		return $this->originalExtensionKey;
	}

	/**
	 *
	 * @param string $extensionKey
	 */
	public function setOriginalExtensionKey($extensionKey) {
		$this->originalExtensionKey = $extensionKey;
	}

	/**
	 *
	 * @param array $overWriteSettings
	 */
	public function setSettings($settings) {
		$this->settings = $settings;
	}

	/**
	 * @return array
	 */
	public function getSettings() {
		return $this->settings;
	}

	/**
	 *
	 *
	 * @return array settings for Extension Manager
	 */
	public function getEmConf() {

		if (isset($this->settings['emConf'])) {
			return $this->settings['emConf'];
		}
		else return $this->emConfDefaults;
	}

	/**
	 *
	 * @return string
	 */
	public function getExtensionDir() {
		if (empty($this->extensionDir)) {
			if (empty($this->extensionKey)) {
				throw new Exception('ExtensionDir can only be created if an extensionKey is defined first');
			}
			$this->extensionDir = PATH_typo3conf . 'ext/' . $this->extensionKey . '/';
		}
		return $this->extensionDir;
	}

	/**
	 *
	 * @param string $extensionDir
	 */
	public function setExtensionDir($extensionDir) {
		$this->extensionDir = $extensionDir;
	}

	/**
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 *
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 *
	 * @return string
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 *
	 * @param string $version
	 */
	public function setVersion($version) {
		$this->version = $version;
	}

	/**
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 *
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 *
	 * @return integer
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 *
	 * @param integer $state
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 *
	 * @return array<Tx_ExtensionBuilder_Domain_Model_DomainObject>
	 */
	public function getDomainObjects() {
		return $this->domainObjects;
	}

	/**
	 * An array of domain objects for which a controller should be built.
	 * This is done in the following two cases:
	 * - Domain Objects which are aggregate roots
	 * - Actions defined for these domain objects
	 *
	 * @return array
	 */
	public function getDomainObjectsForWhichAControllerShouldBeBuilt() {
		$domainObjects = array();
		foreach ($this->domainObjects as $domainObject) {
			if (count($domainObject->getActions()) || $domainObject->isAggregateRoot()) {
				$domainObjects[] = $domainObject;
			}
		}
		return $domainObjects;
	}

	/**
	 * Add a domain object to the extension. Creates the reverse link as well.
	 * @param Tx_ExtensionBuilder_Domain_Model_DomainObject $domainObject
	 */
	public function addDomainObject(Tx_ExtensionBuilder_Domain_Model_DomainObject $domainObject) {
		$domainObject->setExtension($this);
		if (count($domainObject->getPropertiesWithMappingStatements()) > 0) {
			$this->propertiesThatNeedMapping = TRUE;
		}
		if (in_array($domainObject->getName(), array_keys($this->domainObjects))) {
			throw new Tx_ExtensionBuilder_Domain_Exception_ExtensionException('Duplicate domain object name "' . $domainObject->getName() . '".', Tx_ExtensionBuilder_Domain_Validator_ExtensionValidator::ERROR_DOMAINOBJECT_DUPLICATE);
		}
		if ($domainObject->getNeedsUploadFolder()) {
			$this->needsUploadFolder = TRUE;
		}
		$this->domainObjects[$domainObject->getName()] = $domainObject;
	}

	/**
	 *
	 * @param string $domainObjectName
	 * @return Tx_ExtensionBuilder_Domain_Model_DomainObject
	 */
	public function getDomainObjectByName($domainObjectName) {
		if (isset($this->domainObjects[$domainObjectName])) {
			return $this->domainObjects[$domainObjectName];
		}
		return NULL;
	}

	/**
	 * returns the extension key a prefix tx_  and without underscore
	 */
	public function getShortExtensionKey() {
		return 'tx_' . str_replace('_', '', $this->getExtensionKey());
	}

	/**
	 * Returns the Persons
	 *
	 * @return array<Tx_ExtensionBuilder_Domain_Model_Person>
	 */
	public function getPersons() {
		return $this->persons;
	}

	/**
	 * Sets the Persons
	 *
	 * @param array<Tx_ExtensionBuilder_Domain_Model_Person> $persons
	 * @return void
	 */
	public function setPersons($persons) {
		$this->persons = $persons;
	}

	/**
	 * Adds a Person to the end of the current Set of Persons.
	 *
	 * @param Tx_ExtensionBuilder_Domain_Model_Person $person
	 * @return void
	 */
	public function addPerson($person) {
		$this->persons[] = $person;
	}

	/**
	 * Setter for plugin
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_ExtensionBuilder_Domain_Model_Plugin> $plugins
	 * @return void
	 */
	public function setPlugins(Tx_Extbase_Persistence_ObjectStorage $plugins) {
		$this->plugins = $plugins;
	}

	/**
	 * Getter for $plugin
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_ExtensionBuilder_Domain_Model_Plugin>
	 */
	public function getPlugins() {
		return $this->plugins;
	}

	/**
	 *
	 * @return boolean
	 */
	public function hasPlugins() {
		if (count($this->plugins) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * Add $plugin
	 *
	 * @param Tx_ExtensionBuilder_Domain_Model_Plugin
	 * @return void
	 */
	public function addPlugin(Tx_ExtensionBuilder_Domain_Model_Plugin $plugin) {
		$this->plugins[] = $plugin;
	}

	/**
	 * Setter for backendModule
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_ExtensionBuilder_Domain_Model_BackendModule> $backendModules
	 * @return void
	 */
	public function setBackendModules(Tx_Extbase_Persistence_ObjectStorage $backendModules) {
		$this->backendModules = $backendModules;
	}

	/**
	 * Getter for $backendModule
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_ExtensionBuilder_Domain_Model_Plugin>
	 */
	public function getBackendModules() {
		return $this->backendModules;
	}

	/**
	 * Add $backendModule
	 *
	 * @param Tx_ExtensionBuilder_Domain_Model_BackendModule
	 * @return void
	 */
	public function addBackendModule(Tx_ExtensionBuilder_Domain_Model_BackendModule $backendModule) {
		$this->backendModules[] = $backendModule;
	}

	/**
	 *
	 * @return boolean
	 */
	public function hasBackendModules() {
		if (count($this->backendModules) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function getReadableState() {
		switch ($this->getState()) {
			case self::STATE_ALPHA:
				return 'alpha';
			case self::STATE_BETA:
				return 'beta';
			case self::STATE_STABLE:
				return 'stable';
			case self::STATE_EXPERIMENTAL:
				return 'experimental';
			case self::STATE_TEST:
				return 'test';
		}
	}


	public function getCssClassName() {
		return 'tx-' . str_replace('_', '-', $this->getExtensionKey());
	}

	public function isModified($filePath) {
		if (is_file($filePath) && isset($this->md5Hashes[$filePath])) {
			if (md5_file($filePath) != $this->md5Hashes[$filePath]) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * setter for md5 hashes
	 * @return void
	 */
	public function setMD5Hashes($md5Hashes) {
		$this->md5Hashes = $md5Hashes;
	}

	/**
	 * getter for md5 hashes
	 * @return array $md5Hashes
	 */
	public function getMD5Hashes() {
		return $this->md5Hashes;
	}

	/**
	 * calculates all md5 hashes
	 * @return
	 */
	public function setMD5Hash($filePath) {
		$this->md5Hashes[$filePath] = md5_file($filePath);

	}

	/**
	 *
	 * @reutn boolean
	 */
	public function hasPropertiesThatNeedMapping() {
		return $this->propertiesThatNeedMapping;
	}

	/**
	 * Get the previous extension directory
	 * if the extension was renamed it is different from $this->extensionDir
	 *
	 * @return void
	 */
	public function getPreviousExtensionDirectory() {
		if ($this->isRenamed()) {
			$originalExtensionKey = $this->getOriginalExtensionKey();
			$this->previousExtensionDirectory = PATH_typo3conf . 'ext/' . $originalExtensionKey . '/';
			$this->previousExtensionKey = $originalExtensionKey;
			return $this->previousExtensionDirectory;
		}
		else {
			return $this->extensionDir;
		}
	}

	/**
	 *
	 * @return boolean
	 */
	public function isRenamed() {
		$originalExtensionKey = $this->getOriginalExtensionKey();
		if (!empty($originalExtensionKey) && $originalExtensionKey != $this->getExtensionKey()) {
			$this->renamed = TRUE;
		}
		return $this->renamed;
	}

	/**
	 * Getter for $needsUploadFolder
	 *
	 * @return boolean $needsUploadFolder
	 */
	public function getNeedsUploadFolder() {
		if ($this->needsUploadFolder) {
			return 1;
		}
		else {
			return 0;
		}
	}

	/**
	 *
	 * @return string $uploadFolder
	 */
	public function getUploadFolder() {
		return 'uploads/' . $this->getShortExtensionKey();
	}

	/**
	 * @return string
	 */
	public function getPriority() {
		return $this->priority;
	}

	/**
	 * @param string $priority
	 */
	public function setPriority($priority) {
		$this->priority = $priority;
	}

	/**
	 * @return boolean
	 */
	public function getShy(){
		return $this->shy;
	}

	/**
	 * @param boolean $shy
	 * @return void
	 */
	public function setShy($shy){
		$this->shy = $shy;
	}

	/**
	 * @return string
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param string $category
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

}

?>
