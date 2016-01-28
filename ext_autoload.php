<?php

$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('jfmulticontent');

return [
    'tx_jfmulticontent_pagerenderer'  => $extensionPath . 'lib/class.tx_jfmulticontent_pagerenderer.php',
    'tx_jfmulticontent_itemsProcFunc' => $extensionPath . 'lib/class.tx_jfmulticontent_itemsProcFunc.php',
    'tx_jfmulticontent_tsparserext'   => $extensionPath . 'lib/class.tx_jfmulticontent_tsparserext.php',
];
