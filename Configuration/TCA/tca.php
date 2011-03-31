<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$projectFiles = txdam_getMediaTCA('media_field', 'project_files');
$projectFiles['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.files';
$projectFiles['config']['foreign_table'] = 'tx_dam';
$projectFiles['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';

$projectImages = txdam_getMediaTCA('image_field', 'project_images');
$projectImages['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.images';
$projectImages['config']['foreign_table'] = 'tx_dam';
$projectImages['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';

$projectListImage = txdam_getMediaTCA('image_field', 'project_list_image');
$projectListImage['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.list_image';
$projectListImage['config']['foreign_table'] = 'tx_dam';
$projectListImage['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';
$projectListImage['config']['maxitems'] = 1;
$projectListImage['config']['size'] = 1;

$projectDoubleboxImage = txdam_getMediaTCA('image_field', 'project_doublebox_image');
$projectDoubleboxImage['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.doublebox_image';
$projectDoubleboxImage['config']['foreign_table'] = 'tx_dam';
$projectDoubleboxImage['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';
$projectDoubleboxImage['config']['maxitems'] = 1;
$projectDoubleboxImage['config']['size'] = 1;

$technologyImages = txdam_getMediaTCA('image_field', 'technology_images');
$technologyImages['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_technology.images';
$technologyImages['config']['foreign_table'] = 'tx_dam';
$technologyImages['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';

$technologyListImage = txdam_getMediaTCA('image_field', 'technology_list_image');
$technologyListImage['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_technology.list_image';
$technologyListImage['config']['foreign_table'] = 'tx_dam';
$technologyListImage['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';
$technologyListImage['config']['maxitems'] = 1;
$technologyListImage['config']['size'] = 1;

$technologyDoubleboxImage = txdam_getMediaTCA('image_field', 'technology_doublebox_image');
$technologyDoubleboxImage['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_technology.doublebox_image';
$technologyDoubleboxImage['config']['foreign_table'] = 'tx_dam';
$technologyDoubleboxImage['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';
$technologyDoubleboxImage['config']['maxitems'] = 1;
$technologyDoubleboxImage['config']['size'] = 1;

$customerImages = txdam_getMediaTCA('image_field', 'customer_images');
$customerImages['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_customer.images';
$customerImages['config']['foreign_table'] = 'tx_dam';
$customerImages['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';

$customerListImage = txdam_getMediaTCA('image_field', 'customer_list_image');
$customerListImage['label'] = 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_customer.list_image';
$customerListImage['config']['foreign_table'] = 'tx_dam';
$customerListImage['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Dam';
$customerListImage['config']['maxitems'] = 1;
$customerListImage['config']['size'] = 1;


$TCA['tx_maritreferences_domain_model_project'] = array(
	'ctrl' => $TCA['tx_maritreferences_domain_model_project']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,subtitle,teaser,description,url,customer_statement,year,files,images,list_image,doublebox_image,industrial_sector,contact_person,customer,technologies'
	),
	'types' => array(
		'1' => array('showitem' => 'title,subtitle,teaser,description;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3,url,customer_statement;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3,year,files,images,list_image,doublebox_image,industrial_sector,contact_person,customer,technologies')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tx_maritreferences_domain_model_project',
				'foreign_table_where' => 'AND tx_maritreferences_domain_model_project.uid=###REC_FIELD_l18n_parent### AND tx_maritreferences_domain_model_project.sys_language_uid IN (-1,0)', 
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'subtitle' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.subtitle',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'teaser' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.teaser',
			'config'  => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.description',
			'config'  => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'softref' => 'typolink_tag,images,email[subst],url',
				'wizards' => Array(
					'_PADDING' => 4,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
        )
			)
		),
		'url' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.url',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'customer_statement' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.customer_statement',
			'config'  => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'softref' => 'typolink_tag,images,email[subst],url',
				'wizards' => Array(
					'_PADDING' => 4,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
        )
			)
		),
		'year' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.year',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'trim,int',
		 		'range' => array('lower' => 1000,'upper' => 9999),
		 		'default' => date('Y')
			)
		),
		'files' => $projectFiles,
		'images' => $projectImages,
		'list_image' => $projectListImage,
		'doublebox_image' => $projectDoubleboxImage,
		'industrial_sector' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.industrial_sector',
			'config'  => array(
				'type' => 'group',
        'internal_type' => 'db',
				'minitems' => 1,
				'maxitems' => 1,
				'size' => 1,
				'allowed' => 'tx_maritreferences_domain_model_industrialsector',
				'foreign_table' => 'tx_maritreferences_domain_model_industrialsector',
        'wizards' => array(
            'suggest' => array(
                'type' => 'suggest',
                'tx_maritreferences_domain_model_industrialsector' => array(
                    'maxItemsInResultList' => 5,
                    'searchWholePhrase' => 1
                ),
            ),
        ),
			)
		),
		'contact_person' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.contact_person',
			'config'  => array(				
				'type' => 'group',
        'internal_type' => 'db',
				'minitems' => 1,
				'maxitems' => 1,
				'size' => 1,
				'allowed' => 'tt_address',
				'foreign_table' => 'tt_address',
        'wizards' => array(
            'suggest' => array(
                'type' => 'suggest',
                'tt_address' => array(
                    'maxItemsInResultList' => 5,
                    'searchWholePhrase' => 1
                ),
            ),
        ),
			)
		),
		'customer' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.customer',
			'config'  => array(
				'type' => 'group',
        'internal_type' => 'db',
				'minitems' => 1,
				'maxitems' => 1,
				'size' => 1,
				'allowed' => 'tx_maritreferences_domain_model_customer',
				'foreign_table' => 'tx_maritreferences_domain_model_customer',
        'wizards' => array(
            'suggest' => array(
                'type' => 'suggest',
                'tx_maritreferences_domain_model_customer' => array(
                    'maxItemsInResultList' => 5,
                    'searchWholePhrase' => 1
                ),
            ),
        ),
			)
		),
		'technologies' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.technologies',
			'config'  => array(
				'type' => 'select',
       	//'internal_type' => 'db',
				'size' => 10,
				'minitems' => 1,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 1,
				'allowed' => 'tx_maritreferences_domain_model_technology',
				'foreign_class' => 'Tx_MaritReferences_Domain_Model_Technology',
				'foreign_table' => 'tx_maritreferences_domain_model_technology',
				'foreign_table_where' => ' AND tx_maritreferences_domain_model_technology.deleted+tx_maritreferences_domain_model_technology.hidden=0 ',
				'MM' => 'tx_maritreferences_project_technology_mm',
			),
		),
	),
);


$TCA['tx_maritreferences_domain_model_technology'] = array(
	'ctrl' => $TCA['tx_maritreferences_domain_model_technology']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,description,images,list_image,doublebox_image,contact_person'
	),
	'types' => array(
		'1' => array('showitem' => 'title,description;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3,images,list_image,doublebox_image,contact_person')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tx_maritreferences_domain_model_technology',
				'foreign_table_where' => 'AND tx_maritreferences_domain_model_technology.uid=###REC_FIELD_l18n_parent### AND tx_maritreferences_domain_model_technology.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_technology.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_technology.description',
			'config'  => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'softref' => 'typolink_tag,images,email[subst],url',
				'wizards' => Array(
					'_PADDING' => 4,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
            	)
			)
		),
		'images' => $technologyImages,
		'list_image' => $technologyListImage,
		'doublebox_image' => $technologyDoubleboxImage,
		'contact_person' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_technology.contact_person',
			'config'  => array(				
				'type' => 'group',
        		'internal_type' => 'db',
				'minitems' => 1,
				'maxitems' => 1,
				'size' => 1,
				'allowed' => 'tt_address',
				'foreign_table' => 'tt_address',
		        'wizards' => array(
		            'suggest' => array(
		                'type' => 'suggest',
		                'tt_address' => array(
		                    'maxItemsInResultList' => 5,
		                    'searchWholePhrase' => 1
		                ),
		            ),
		        ),
			),
		),
	),
);

$TCA['tx_maritreferences_domain_model_customer'] = array(
	'ctrl' => $TCA['tx_maritreferences_domain_model_customer']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,description,url,images,list_image'
	),
	'types' => array(
		'1' => array('showitem' => 'title,description;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3,url,images,list_image')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tx_maritreferences_domain_model_customer',
				'foreign_table_where' => 'AND tx_maritreferences_domain_model_customer.uid=###REC_FIELD_l18n_parent### AND tx_maritreferences_domain_model_customer.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_customer.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_customer.description',
			'config'  => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'softref' => 'typolink_tag,images,email[subst],url',
				'wizards' => Array(
					'_PADDING' => 4,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
            	)
			)
		),
		'url' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_customer.url',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'images' => $customerImages,
		'list_image' => $customerListImage,
	),
);

$TCA['tx_maritreferences_domain_model_industrialsector'] = array(
	'ctrl' => $TCA['tx_maritreferences_domain_model_industrialsector']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,description'
	),
	'types' => array(
		'1' => array('showitem' => 'title,description;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tx_maritreferences_domain_model_industrialsector',
				'foreign_table_where' => 'AND tx_maritreferences_domain_model_industrialsector.uid=###REC_FIELD_l18n_parent### AND tx_maritreferences_domain_model_industrialsector.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_industrialsector.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_industrialsector.description',
			'config'  => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'softref' => 'typolink_tag,images,email[subst],url',
				'wizards' => Array(
					'_PADDING' => 4,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
            	)
			)
		),
	),
);



?>
