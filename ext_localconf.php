<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Project' => 'list, show, search, doublebox',
		'Customer' => 'list, show',
		'Technology' => 'list, show, doublebox',
	),
	array(
		'Project' => 'list, show, search, doublebox',
		'Customer' => 'list, show',
		'Technology' => 'list, show, doublebox',
	)
);

?>