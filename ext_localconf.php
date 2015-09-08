<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Titelei.' . $_EXTKEY,
	'Titelei',
	array(
		'Titel' => 'list, show, new, create, edit, update, delete, epub',
		'Chapter' => 'list, show, new, create, edit, update',
		
	),
	// non-cacheable actions
	array(
		'Titel' => 'create, update, delete, epub',
		'Chapter' => 'create, update',
		
	)
);
