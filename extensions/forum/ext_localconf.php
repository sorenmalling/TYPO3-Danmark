<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Forum',
	array(
		'Forum' => 'list, new, create, show',
		'Topic' => 'list, new, create, show',
		
	),
	// non-cacheable actions
	array(
		'Forum' => 'create',
		'Topic' => 'create, ',
		
	)
);

?>