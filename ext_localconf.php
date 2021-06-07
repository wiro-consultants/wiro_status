<?php
defined('TYPO3_MODE') or die();

call_user_func(function ($extensionKey) {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'WIRO.' . $extensionKey,
        'Status',
        [
            'Status' => 'show'
        ],
        // non-cacheable actions
        [
            'Status' => 'show'
        ]
    );
}, $_EXTKEY);
