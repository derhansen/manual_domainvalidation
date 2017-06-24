<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:manual_domainvalidation/Resources/Private/Language/locallang_db.xlf:tx_manualdomainvalidation_domain_model_data',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
		'searchFields' => 'title,description,year,amount,paid',
        'iconfile' => 'EXT:manual_domainvalidation/Resources/Public/Icons/tx_manualdomainvalidation_domain_model_data.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, email, description, year, amount, paid',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, email, description, year, amount, paid, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_manualdomainvalidation_domain_model_data',
                'foreign_table_where' => 'AND tx_manualdomainvalidation_domain_model_data.pid=###CURRENT_PID### AND tx_manualdomainvalidation_domain_model_data.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
		't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
		'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
		'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
        ],
        'title' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:manual_domainvalidation/Resources/Private/Language/locallang_db.xlf:tx_manualdomainvalidation_domain_model_data.title',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
        'email' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:manual_domainvalidation/Resources/Private/Language/locallang_db.xlf:tx_manualdomainvalidation_domain_model_data.email',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
	    'description' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:manual_domainvalidation/Resources/Private/Language/locallang_db.xlf:tx_manualdomainvalidation_domain_model_data.description',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
	    'year' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:manual_domainvalidation/Resources/Private/Language/locallang_db.xlf:tx_manualdomainvalidation_domain_model_data.year',
	        'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],
	    'amount' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:manual_domainvalidation/Resources/Private/Language/locallang_db.xlf:tx_manualdomainvalidation_domain_model_data.amount',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2,required'
			]
	    ],
	    'paid' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:manual_domainvalidation/Resources/Private/Language/locallang_db.xlf:tx_manualdomainvalidation_domain_model_data.paid',
	        'config' => [
			    'type' => 'check',
			    'items' => [
			        '1' => [
			            '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
			        ]
			    ],
			    'default' => 0
			]
	    ],
    ],
];
