<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Marit AG References'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Marit AG References');

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');


t3lib_extMgm::addLLrefForTCAdescr('tx_maritreferences_domain_model_industrialsector','EXT:marit_references/Resources/Private/Language/locallang_csh_tx_maritreferences_domain_model_industrialsector.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_maritreferences_domain_model_industrialsector');
$TCA['tx_maritreferences_domain_model_industrialsector'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_industrialsector',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_maritreferences_domain_model_industrialsector.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_maritreferences_domain_model_customer','EXT:marit_references/Resources/Private/Language/locallang_csh_tx_maritreferences_domain_model_customer.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_maritreferences_domain_model_customer');
$TCA['tx_maritreferences_domain_model_customer'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_customer',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_maritreferences_domain_model_customer.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_maritreferences_domain_model_technology','EXT:marit_references/Resources/Private/Language/locallang_csh_tx_maritreferences_domain_model_technology.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_maritreferences_domain_model_technology');
$TCA['tx_maritreferences_domain_model_technology'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_technology',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_maritreferences_domain_model_technology.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_maritreferences_domain_model_project','EXT:marit_references/Resources/Private/Language/locallang_csh_tx_maritreferences_domain_model_project.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_maritreferences_domain_model_project');
$TCA['tx_maritreferences_domain_model_project'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_maritreferences_domain_model_project.gif'
	)
);

t3lib_div::loadTCA('tt_address');
$TCA['tt_address']['columns']['image'] = txdam_getMediaTCA('image_field', 'tt_address_image');
$TCA['tt_address']['columns']['image']['label'] = 'LLL:EXT:lang/locallang_general.xml:LGL.image';
$TCA['tt_address']['columns']['image']['config']['foreign_table'] = 'tx_dam';
?>