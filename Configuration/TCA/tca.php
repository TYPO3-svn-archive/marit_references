<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');




$TCA['tx_maritreferences_domain_model_project'] = array(
	'ctrl' => $TCA['tx_maritreferences_domain_model_project']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,subtitle,teaser,description,url,budget,customer_statement,year,files,images,list_image,industrial_sector,contact_person,customer_contact_person,customer,technologies'
	),
	'types' => array(
		'1' => array('showitem' => 'title,subtitle,teaser,description;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3,url,budget,customer_statement;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3,year,files,images,list_image,industrial_sector,contact_person,customer_contact_person,customer,technologies')
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
		'budget' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.budget',
			'config'  => array(
				'type' => 'input',
				'size' => 15,
				'eval' => 'trim,int'
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
			)
		),
		'files' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.files',
			'config'  => array(
				'type' => 'group',
        		'internal_type' => 'db',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 1,
				'allowed' => 'tx_dam',
				'foreign_table' => 'tx_dam',
				'MM' => 'tx_maritreferences_project_files_dam_mm'
			)
		),
		'images' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.images',
			'config'  => array(
				'type' => 'group',
        		'internal_type' => 'db',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 1,
				'allowed' => 'tx_dam',
				'foreign_table' => 'tx_dam',
				'MM' => 'tx_maritreferences_project_images_dam_mm'
			)
		),
		'list_image' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.list_image',
			'config'  => array(
				'type' => 'group',
        		'internal_type' => 'db',
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1,
				'allowed' => 'tx_dam',
				'foreign_table' => 'tx_dam',
		        'wizards' => array(
		            'suggest' => array(
		                'type' => 'suggest',
		                'tx_dam' => array(
		                    'maxItemsInResultList' => 5,
		                    'searchWholePhrase' => 1
		                ),
		            ),
		        ),
			)
		),
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
		'customer_contact_person' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_project.customer_contact_person',
			'config'  => array(				
				'type' => 'group',
        		'internal_type' => 'db',
				'minitems' => 0,
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
				'MM' => 'tx_maritreferences_project_technology_mm',
			),
		),
	),
);


$TCA['tx_maritreferences_domain_model_technology'] = array(
	'ctrl' => $TCA['tx_maritreferences_domain_model_technology']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,description,images,contact_person'
	),
	'types' => array(
		'1' => array('showitem' => 'title,description;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3,images,contact_person')
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
		'images' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_technology.images',
			'config'  => array(
				'type' => 'group',
        		'internal_type' => 'db',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 1,
				'allowed' => 'tx_dam',
				'foreign_table' => 'tx_dam',
				'MM' => 'tx_maritreferences_technology_images_dam_mm'
			)
		),
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
		'showRecordFieldList' => 'title,description,url,size,images'
	),
	'types' => array(
		'1' => array('showitem' => 'title,description;;9;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=ts];3-3-3,url,size,images')
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
		'size' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_customer.size',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'images' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_references/Resources/Private/Language/locallang_db.xml:tx_maritreferences_domain_model_customer.images',
			'config'  => array(
				'type' => 'group',
        		'internal_type' => 'db',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 1,
				'allowed' => 'tx_dam',
				'foreign_table' => 'tx_dam',
				'MM' => 'tx_maritreferences_customer_images_dam_mm'
			)
		),
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