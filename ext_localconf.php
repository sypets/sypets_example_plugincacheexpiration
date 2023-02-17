<?php
// all use statements must come first
use Sypets\SypetsExamplePlugincacheexpiration\Controller\CacheController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

// Prevent Script from being called directly
defined('TYPO3') or die();

// encapsulate all locally defined variable (and everything else)
(function () {
    ExtensionUtility::configurePlugin(
        // extension name (CamelCase'd extension key)
        'SypetsExamplePlugincacheexpiration',
        // plugin name
        'Cache',
        // controller action (use FQCN)
        [
            CacheController::class => 'show',

        ]
    );

    // Page TSconfig
    ExtensionManagementUtility::addPageTSConfig("@import 'EXT:sypets_example_plugincacheexpiration/Configuration/TSconfig/Page/Wizards/NewContentElement.tsconfig'");
})();
