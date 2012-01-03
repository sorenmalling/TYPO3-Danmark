<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Forum',
	'Forum'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . forum;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .forum. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'forum');


t3lib_extMgm::addLLrefForTCAdescr('tx_forum_domain_model_forum', 'EXT:forum/Resources/Private/Language/locallang_csh_tx_forum_domain_model_forum.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_forum_domain_model_forum');
$TCA['tx_forum_domain_model_forum'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:forum/Resources/Private/Language/locallang_db.xml:tx_forum_domain_model_forum',
		'label' => 'title',
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Forum.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_forum_domain_model_forum.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_forum_domain_model_topic', 'EXT:forum/Resources/Private/Language/locallang_csh_tx_forum_domain_model_topic.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_forum_domain_model_topic');
$TCA['tx_forum_domain_model_topic'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:forum/Resources/Private/Language/locallang_db.xml:tx_forum_domain_model_topic',
		'label' => 'title',
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Topic.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_forum_domain_model_topic.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_forum_domain_model_post', 'EXT:forum/Resources/Private/Language/locallang_csh_tx_forum_domain_model_post.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_forum_domain_model_post');
$TCA['tx_forum_domain_model_post'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:forum/Resources/Private/Language/locallang_db.xml:tx_forum_domain_model_post',
		'label' => 'content',
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Post.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_forum_domain_model_post.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_forum_domain_model_author', 'EXT:forum/Resources/Private/Language/locallang_csh_tx_forum_domain_model_author.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_forum_domain_model_author');
$TCA['tx_forum_domain_model_author'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:forum/Resources/Private/Language/locallang_db.xml:tx_forum_domain_model_author',
		'label' => 'uid',
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Author.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_forum_domain_model_author.gif'
	),
);

?>