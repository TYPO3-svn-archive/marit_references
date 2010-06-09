<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Project' => 'list, show, search, doublebox, contextbox',
		'Customer' => 'list, show',
		'Technology' => 'list, show',
	),
	array(
		'Project' => 'doublebox, contextbox'
	)
);


if($TYPO3_CONF_VARS['EXTCONF']['realurl']){
	$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['fixedPostVars']['_DEFAULT'][] = array(
		'GETvar' => 'tx_maritreferences_pi1[action]',	
		'valueMap' => array (
			'list' => 'list',
			'show' => 'show',
			'search' => 'search',
			'doublebox' => 'doublebox',
			'contextbox' => 'contextbox',
		),
		'valueDefault' => 'list',
		'noMatch' => 'bypass',
	);
	$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['fixedPostVars']['_DEFAULT'][] = array(
		'GETvar' => 'tx_maritreferences_pi1[controller]',
	);
	$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['fixedPostVars']['_DEFAULT'][] = array(
		'cond' => array(
			'prevValueInList' => 'Project',
		),
		'GETvar' => 'tx_maritreferences_pi1[project]',
		'lookUpTable' => array (
			'table' => 'tx_maritreferences_domain_model_project',
			'id_field' => 'uid',
			'alias_field' => 'title',
			'addWhereClouse' => 'AND NOT deleted',
			'useUniqueCache' => 1,
			'useUniqueCache_conf' => array (
				'strtolower' => 1,
				'spaceCharacter' => '-',
			),
		),
		'noMatch' => 'valueMap',
	);
	$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['fixedPostVars']['_DEFAULT'][] = array(
		'cond' => array(
			'prevValueInList' => 'Customer',
		),
		'GETvar' => 'tx_maritreferences_pi1[customer]',
		'lookUpTable' => array (
			'table' => 'tx_maritreferences_domain_model_customer',
			'id_field' => 'uid',
			'alias_field' => 'title',
			'addWhereClouse' => 'AND NOT deleted',
			'useUniqueCache' => 1,
			'useUniqueCache_conf' => array (
				'strtolower' => 1,
				'spaceCharacter' => '-',
			),
		),
		'noMatch' => 'valueMap',
	);
	$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['fixedPostVars']['_DEFAULT'][] = array(
		'cond' => array(
			'prevValueInList' => 'Technology',
		),
		'GETvar' => 'tx_maritreferences_pi1[technology]',
		'lookUpTable' => array (
			'table' => 'tx_maritreferences_domain_model_technology',
			'id_field' => 'uid',
			'alias_field' => 'title',
			'addWhereClouse' => 'AND NOT deleted',
			'useUniqueCache' => 1,
			'useUniqueCache_conf' => array (
				'strtolower' => 1,
				'spaceCharacter' => '-',
			),
		),
		'noMatch' => 'valueMap',
	);
}

?>