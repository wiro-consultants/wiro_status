<?php

defined('TYPO3_MODE') or die();

call_user_func(function ($extensionKey) {

    $extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($extensionKey));
    $pluginName = 'Status';

    $pluginSignature = $extensionName . '_' . strtolower($pluginName);

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'WIRO.' . $extensionKey,
        $pluginName,
        'WiRo Status'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extensionKey, 'Configuration/TypoScript/', 'WiRo Status');
}, $_EXTKEY);