<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['jfmulticontent']);

if ($confArr['ttNewsCodes']) {
	// Add the additional CODES to tt_news
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['what_to_display'][] = array(
		0 => "LIST_ACCORDION",
		1 => "LIST_ACCORDION"
	);
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['what_to_display'][] = array(
		0 => "LIST_SLIDER",
		1 => "LIST_SLIDER"
	);
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['extraCodesHook'][] = "EXT:jfmulticontent/lib/class.tx_ttnews_extend.php:tx_ttnews_extend";
}

t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_jfmulticontent_pi1.php', '_pi1', 'list_type', 1);
?>