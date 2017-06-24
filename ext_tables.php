<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function ($extKey) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Manual domain validation');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_manualdomainvalidation_domain_model_data', 'EXT:manual_domainvalidation/Resources/Private/Language/locallang_csh_tx_manualdomainvalidation_domain_model_data.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_manualdomainvalidation_domain_model_data');
    },
    $_EXTKEY
);
