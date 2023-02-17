<?php

defined('TYPO3') or die();

$extkey = 'sypets_example_plugincacheexpiration';
$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($extkey);
$flexformPath = 'FILE:EXT:' . $extkey . '/Configuration/FlexForms';
$plugins = [
    [
        // mandatory
        'name' => 'Cache',
        // mandatory
        'label' => 'Page cache expiration test',

        // flexform: optional
        'flexform' => '',

        // subtypes_excludelist: optional
        'exclude' => 'recursive,select_key,pages',
    ],
];

foreach ($plugins as $plugin) {

    $pluginName = $plugin['name'];
    $label = $plugin['label'];
    $icon = $plugin['icon'] ?? '';
    $flexformFile = $plugin['flexform'] ?? '';
    $subtypesExcludelist = $plugin['exclude'] ?? '';
    $pluginSignature = strtolower($extensionName . '_' . $pluginName);

    if ($icon) {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            $extensionName,
            $pluginName,
            $label,
            $icon
        );
    } else {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            $extensionName,
            $pluginName,
            $label
        );
    }

    // add flexform
    if ($flexformFile) {
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, $flexformFile);
    }

    // do not show "Record storage page" configuration for plugin in form
    // https://stackoverflow.com/questions/39386018/typo3-hide-plugin-mode-and-record-storage-page-in-a-plugin/39387488
    // pages: storage pid
    if ($subtypesExcludelist) {
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature]
            = $subtypesExcludelist;
    }
}
