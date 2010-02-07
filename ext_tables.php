<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}


// get extension configuration
$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['jfmulticontent']);


if ($confArr["useStoragePidOnly"]) {
	$tempColumns = array (
		'tx_jfmulticontent_contents' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:jfmulticontent/locallang_db.xml:tt_content.tx_jfmulticontent.contents',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'tt_content',
				'foreign_table_where' => 'AND tt_content.pid=###STORAGE_PID### AND tt_content.hidden=0 AND tt_content.deleted=0 ORDER BY tt_content.uid',
				'size' => 12,
				'minitems' => 0,
				'maxitems' => 1000,
				'wizards' => array(
					'_PADDING'  => 2,
					'_VERTICAL' => 1,
					'add' => array(
						'type'   => 'script',
						'title'  => 'LLL:EXT:jfmulticontent/locallang_db.xml:tt_content.tx_jfmulticontent.contents_add',
						'icon'   => 'add.gif',
						'script' => 'wizard_add.php',
						'params' => array(
							'table'    => 'tt_content',
							'pid'      => '###STORAGE_PID###',
							'setValue' => 'prepend'
						),
					),
					'list' => array(
						'type'   => 'script',
						'title'  => 'List',
						'icon'   => 'list.gif',
						'script' => 'wizard_list.php',
						'params' => array(
							'table' => 'tt_content',
							'pid'   => '###STORAGE_PID###',
						),
					),
					'edit' => array(
						'type'   => 'popup',
						'title'  => 'LLL:EXT:jfmulticontent/locallang_db.xml:tt_content.tx_jfmulticontent.contents_edit',
						'icon'   => 'edit2.gif',
						'script' => 'wizard_edit.php',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=600,width=800,status=0,menubar=0,scrollbars=1',
					),
				),
			)
		),
	);
} else {
	$tempColumns = array (
		'tx_jfmulticontent_contents' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:jfmulticontent/locallang_db.xml:tt_content.tx_jfmulticontent.contents',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tt_content',
				'size' => 12,
				'minitems' => 0,
				'maxitems' => 1000,
				'wizards' => array(
					'_PADDING'  => 2,
					'_VERTICAL' => 1,
					'add' => array(
						'type'   => 'script',
						'title'  => 'LLL:EXT:jfmulticontent/locallang_db.xml:tt_content.tx_jfmulticontent.contents_add',
						'icon'   => 'add.gif',
						'script' => 'wizard_add.php',
						'params' => array(
							'table'    => 'tt_content',
							'pid'      => '###STORAGE_PID###',
							'setValue' => 'prepend'
						),
					),
					'list' => array(
						'type'   => 'script',
						'title'  => 'List',
						'icon'   => 'list.gif',
						'script' => 'wizard_list.php',
						'params' => array(
							'table' => 'tt_content',
							'pid'   => '###STORAGE_PID###',
						),
					),
					'edit' => array(
						'type'   => 'popup',
						'title'  => 'LLL:EXT:jfmulticontent/locallang_db.xml:tt_content.tx_jfmulticontent.contents_edit',
						'icon'   => 'edit2.gif',
						'script' => 'wizard_edit.php',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=600,width=800,status=0,menubar=0,scrollbars=1',
					),
				),
			)
		),
	);
}


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1'] = 'layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1'] = 'tx_jfmulticontent_contents,pi_flexform';


t3lib_extMgm::addPlugin(array(
	'LLL:EXT:jfmulticontent/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');


t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY.'/flexform_ds.xml');


if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_jfmulticontent_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_jfmulticontent_pi1_wizicon.php';
}


t3lib_extMgm::addStaticFile($_EXTKEY,'static/', 'Multi content');

require_once(t3lib_extMgm::extPath($_EXTKEY).'lib/class.tx_jfmulticontent_itemsProcFunc.php');

?>