{namespace k=Tx_ExtensionBuilder_ViewHelpers}<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
<f:for each="{extension.Plugins}" as="plugin">
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'<k:format.uppercaseFirst>{plugin.key}</k:format.uppercaseFirst>',
	'<k:format.quoteString>{plugin.name}</k:format.quoteString>'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . {plugin.key};
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .{plugin.key}. '.xml');


</f:for>

<f:if condition="{extension.BackendModules}">
if (TYPO3_MODE === 'BE') {
<f:for each="{extension.BackendModules}" as="backendModule">
	/**
	 * Registers a Backend Module
	 */
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'{backendModule.mainModule}',	 // Make module a submodule of '{backendModule.mainModule}'
		'{backendModule.key}',	// Submodule key
		'',						// Position
		array(
			<f:for each="{extension.domainObjectsForWhichAControllerShouldBeBuilt}" as="domainObject" iteration="domainObjectIterator">'{domainObject.name}' => '<f:for each="{domainObject.actions}" as="action" iteration="actionIterator"><f:if condition="{actionIterator.index} > 0">, </f:if>{action.name}</f:for>',<f:if condition="{domainObjectIterator.isLast}"><f:then/><f:else>
+			</f:else></f:if></f:for>
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_{backendModule.key}.xml',
		)
	);
</f:for>
}
</f:if>

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', '<k:format.quoteString>{extension.name}</k:format.quoteString>');

<f:for each="{extension.domainObjects}" as="domainObject">
t3lib_extMgm::addLLrefForTCAdescr('{domainObject.databaseTableName}', 'EXT:{extension.extensionKey}/Resources/Private/Language/locallang_csh_{domainObject.databaseTableName}.xml');
t3lib_extMgm::allowTableOnStandardPages('{domainObject.databaseTableName}');
$TCA['{domainObject.databaseTableName}'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:{extension.extensionKey}/Resources/Private/Language/locallang_db.xml:{domainObject.databaseTableName}',
		'label' => '{domainObject.listModuleValueLabel}',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/{domainObject.name}.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/{domainObject.databaseTableName}.gif'
	),
);
</f:for>
?>